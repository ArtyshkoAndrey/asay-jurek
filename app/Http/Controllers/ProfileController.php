<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Inertia\Inertia;
use App\Models\User;
use Inertia\Response;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\AuthenticationException;

class ProfileController extends Controller
{

  public function index (): Response
  {
    $user = Auth::user();
    return Inertia::render('Users/profile/Index', [
      'user' => $user,
    ]);
  }

  public function uploadPhoto (Request $request): RedirectResponse
  {
    $request->validate([
      'photo'   => 'required',
      'user_id' => 'required|exists:users,id',
    ]);

    $file    = $request->file('photo');
    $user_id = $request->get('user_id');

    $user = User::find($user_id);
    if ($user->photo && File::exists(public_path('/storage/users/') . $user->photo)) {
      \File::delete(public_path('/storage/users/') . $user->photo);
    }
    $name = time() . '.' . $file->getClientOriginalExtension();
    Image::make($file)
      ->save(storage_path(User::PATH_PHOTO . $name));
    $user->photo = $name;
    $user->save();

    return redirect()->route('profile.index');
  }

  /**
   *
   */
  public function updatePassword (Request $request): RedirectResponse
  {
    $request->validate([
      'password'         => 'required|string|min:6',
      'confirm_password' => 'required|string|min:6',
    ]);

    $user = Auth::user();

    if ($user) {
      $user->password = Hash::make($request->get('password'));
      $user->save();

      return redirect()->route('profile.index');
    }

    return redirect()->route('index');
  }

  /**
   *
   */
  public function updateInfo (Request $request): RedirectResponse
  {
    $request->validate([
      'name'       => 'required|string|min:6',
      'email'      => 'required|email:rfc,dns|unique:users,email,' . Auth::id(),
      'phone'      => 'required|string|min:6',
      'country'    => 'required|string',
      'city'       => 'required|string',
      'street'     => 'required|string',
      'post_index' => 'required|string',
    ]);

    $user = Auth::user();
    if ($user) {
      $user->update($request->all());
      $user->save();
      return redirect()->route('profile.index');
    }

    return redirect()->route('index');

  }

  /**
   * @throws AuthenticationException
   */
  public function orders (): Response
  {
    $user = Auth::user();

    if ($user) {
      $orders = $user->orders()
        ->orderByDesc('id')
        ->take(10)
        ->get()
        ->append([
          'count_products',
          'status_translation',
        ]);

      return Inertia::render('Users/profile/Orders', [
        'orders' => $orders,
      ]);
    }

    throw new AuthenticationException();
  }

  public function order (int $id): Response
  {
    $order = Order::findOrFail($id);

    if ($order->user_id !== Auth::id()) {
      return abort(404);
    }

    $order->load([
      'items',
      'items.product',
    ]);
    $order->append([
      'delivery_translation',
      'status_translation',
    ]);

    return Inertia::render('Users/profile/Order', [
      'order' => $order,
    ]);
  }
}