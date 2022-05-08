<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Order;
use Inertia\Response;
use App\Models\Product;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

  protected array $month = [
    1  => 'Январь',
    2  => 'Февраль',
    3  => 'Март',
    4  => 'Апрель',
    5  => 'Май',
    6  => 'Июнь',
    7  => 'Июль',
    8  => 'Август',
    9  => 'Сентябрь',
    10 => 'Октябрь',
    11 => 'Ноябрь',
    12 => 'Декабрь',
  ];

  public function index (): Response
  {
    $data   = new Collection();
    $month  = new Collection();
    $orders = Order::orderBy('created_at')
      ->get()
      ->groupBy(function ($val) {
        return Carbon::parse($val->created_at)
          ->format('m');
      });

    foreach ($orders as $key => $order) {
      $month->push($this->month[(int) $key]);
      $data->push(count($order));
    }

    $countOrdersPrepare = Order::whereStatus(Order::STATUS_PREPARE)
      ->count();

    $toDayOrders = Order::where('created_at', '<=', Carbon::now())
      ->where('created_at', '>=', Carbon::now()
        ->subDays(1))
      ->get();

    $countOrdersToDay = count($toDayOrders);

    $countZeroCountProducts = Product::where('count', 0)
      ->count();

    return Inertia::render('Admins/Index', [
      'orderCheckouts'         => [
        'count' => $data,
        'month' => $month,
      ],
      'countOrdersPrepare'     => $countOrdersPrepare,
      'countOrdersToDay'       => $countOrdersToDay,
      'countZeroCountProducts' => $countZeroCountProducts,
      'toDayOrders'            => $toDayOrders,
    ]);
  }
}