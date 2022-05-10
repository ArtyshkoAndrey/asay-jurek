<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class ShopController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @param Request $request
   *
   * @return \Illuminate\Http\JsonResponse|\Inertia\Response
   */
  public function index (Request $request)
  {
    $data  = [
      'q' => $request->get('q'),
    ];
    $shops = Shop::orderByDesc('created_at');

    if ($data['q']) {
      $shops = $shops->where('country', 'like', '%' . $data['q'] . '%')
        ->orWhere('city', 'like', '%' . $data['q'] . '%')
        ->orWhere('phone', 'like', '%' . $data['q'] . '%')
        ->orWhereTranslationLike('street', '%' . $data['q'] . '%')
        ->orWhereTranslationLike('time', '%' . $data['q'] . '%');
    }

    $shops = $shops->paginate(20);

    if ($request->has('is_json')) {
      return JsonResponse::success([
        'shops' => $shops,
      ]);
    }

    return Inertia::render('Admins/Shops/Index', [
      'shops'    => $shops,
      'formData' => $data,
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
   * @return RedirectResponse
   */
  public function store (Request $request): RedirectResponse
  {
    $request->validate([
      'country'   => 'required|string',
      'city'      => 'required|string',
      'phone'     => 'required|string',
      'ru'        => 'required',
      'ru.street' => 'required|string',
      'ru.time'   => 'required|string',
      'en'        => 'required',
      'en.street' => 'required|string',
      'en.time'  => 'required|string',
    ]);

    $shop = new Shop($request->all());
    $shop->save();

    return redirect()->route('admin.shops.index');
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
   * @return RedirectResponse
   */
  public function update (Request $request, int $id): RedirectResponse
  {
    $request->validate([
      'country'   => 'required|string',
      'city'      => 'required|string',
      'phone'     => 'required|string',
      'ru'        => 'required',
      'ru.street' => 'required|string',
      'ru.time'   => 'required|string',
      'en'        => 'required',
      'en.street' => 'required|string',
      'en.time'  => 'required|string',
    ]);

    $shop = Shop::findOrFail($id);
    $shop->update($request->all());

    return redirect()->route('admin.shops.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   *
   * @return RedirectResponse
   */
  public function destroy (int $id): RedirectResponse
  {
    $shop = Shop::findOrFail($id);

    $shop->delete();
    return redirect()->route('admin.shops.index');
  }
}
