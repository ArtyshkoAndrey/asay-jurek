<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use Inertia\Inertia;
use App\Models\Shop;
use App\Models\User;
use Inertia\Response;
use App\Models\Order;
use App\Models\Product;
use App\Jobs\CloseOrder;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Swift_TransportException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\users\UserRegister;
use Illuminate\Database\Eloquent\Collection;
use App\Notifications\users\CancelOrderNotification;
use App\Notifications\users\CreateOrderNotification;

class OrderController extends Controller
{
  public function index (): Response
  {
    $shops = Shop::all();
    return Inertia::render('Users/Order', [
      'shops' => $shops,
    ]);
  }

  public function create (Request $request): RedirectResponse
  {
    // TODO: Чистить корзину юзера
    $request->validate([
      'type_delivery' => 'required|in:' . implode(',', Order::MAP_DELIVERY),
      'items'         => 'required|array',
      'items.*.id'    => 'required|exists:products,id',
      'items.*.count' => 'required|integer|min:1',
    ]);

    $products = new Collection();
    foreach ($request->get('items') as $item) {
      $product = Product::findOrFail($item['id']);
      $products->push($product);
      if ($product->count < $item['count']) {
        return redirect()
          ->back()
          ->withErrors([
            'items' => 'max-value',
          ]);
      }
    }

//    ЕСЛИ ЗАБЕРУТ В МАГАЗИНЕ
    if ($request->get('type_delivery') === 'in_shop') {
      $request->validate([
        'name'           => 'required|string',
        'phone'          => 'required|string',
        'email'          => 'required|email:rfc,dns',
        'shops_id'       => 'required|exists:shops,id',
        'payment_method' => 'required|string|in:' . implode(',', Order::MAP_PAYMENT_METHODS),
      ]);

      $user = $this->createOrFindUser($request->all());

      $order = new Order([
        'user_name'  => $request->get('name'),
        'user_phone' => $request->get('phone'),

        'cost' => 0,

        'status'         => Order::STATUS_PREPARE,
        'type_delivery'  => Order::DELIVERY_IN_SHOP,
        'payment_method' => $request->get('payment_method'),
      ]);

      $order->user()
        ->associate($user);
      $order->shop()
        ->associate($request->get('shops_id'));
      $order->type_delivery = Order::DELIVERY_TRANSFER;
      $order->save();

      $cost = 0;
//      TODO: В обшей когда буду разные типы оплаты
      foreach ($request->get('items') as $item) {

        $product   = $products->where('id', $item['id'])
          ->first();
        $orderItem = $order->items()
          ->make([
            'count' => $item['count'],
            'cost'  => $product->cost,
          ]);

        $cost += $product->cost * $item['count'];


        /** @var OrderItem $orderItem */
        $orderItem->product()
          ->associate($product);
        $orderItem->save();

        $product->count -= $item['count'];
        $product->save();

      }
      $order->cost = $cost;
      $order->save();
      try {
        $user->notify(new CreateOrderNotification($user, $order));
      } catch (Swift_TransportException $e) {
        \Log::critical('Dont send Email');
      }

      $delay = now()->addMinutes(30);
      CloseOrder::dispatch($order, $delay);

      $user->cart()
        ->delete();
    }


    return redirect()->route('index');
  }

  /**
   * @param $data
   *
   * @return User|Model
   */
  private function createOrFindUser ($data)
  {
    $user = User::firstOrNew([
      'email' => $data['email'],
    ]);

    $user->phone = $data['phone'];
    $user->name  = $data['name'];

    if (!$user->created_at) {
      $random         = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
      $password       = substr($random, 0, 10);
      $user->password = Hash::make($password);
      $user->save();

      Auth::login($user);
      try {
        $user->notify(new UserRegister($user, $password));
      } catch (Swift_TransportException $e) {
        \Log::critical('Dont send Email');
      }
    }
    $user->save();

    return $user;
  }
}