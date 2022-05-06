<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Order;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\JsonResponse|Response
   */
  public function index (Request $request)
  {
    $data = [
      'q' => $request->get('q'),
      'status' => $request->get('status')
    ];
    $orders = Order::orderByDesc('created_at');

    if ($data['status']) {
      $orders = $orders->where('status', $data['status']);
    }

    if ($data['q']) {
      $orders = $orders->where('user_name', 'like', '%' . $data['q'] . '%')
        ->orWhere('user_address', 'like', '%' . $data['q'] . '%')
        ->orWhere('user_phone', 'like', '%' . $data['q'] . '%');
    }

     $orders = $orders->paginate(20);

    if ($request->has('is_json')) {
      return JsonResponse::success([
        'orders' => $orders,
      ]);
    }

    $orderStatuses = new Collection();

    foreach (Order::MAP_STATUS as $MAPSTATUS) {
      $orderStatuses->push([
        'value' => $MAPSTATUS,
        'name' => Order::MAP_STATUS_TRANSLATE[$MAPSTATUS]
      ]);
    }

    return Inertia::render('Admins/Order/Index', [
      'orders' => $orders,
      'formData' => $data,
      'orderStatuses' => $orderStatuses
    ]);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create ()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   *
   * @return Response
   */
  public function store (Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   *
   * @return Response
   */
  public function show ($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   *
   * @return Response
   */
  public function edit ($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param int     $id
   *
   * @return Response
   */
  public function update (Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   *
   * @return Response
   */
  public function destroy ($id)
  {
    //
  }
}
