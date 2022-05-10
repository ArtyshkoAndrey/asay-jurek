<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seo;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class SeoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\JsonResponse|\Inertia\Response
   */
  public function index (Request $request)
  {
    $data = [
      'q' => $request->get('q'),
    ];
    $seos = Seo::orderByDesc('created_at');

    if ($data['q']) {
      $seos = $seos->where('url', 'like', '%' . $data['q'] . '%')
        ->orWhere('title', 'like', '%' . $data['q'] . '%');
    }

    $seos = $seos->paginate(20);

    if ($request->has('is_json')) {
      return JsonResponse::success([
        'seos' => $seos,
      ]);
    }

    return Inertia::render('Admins/Seos/Index', [
      'seos'     => $seos,
      'formData' => $data,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return void
   */
  public function create (): void
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
      'url'              => 'required|unique:seos,id',
      'title'            => 'required|string',
      'description'      => 'required|string',
      'meta_description' => 'required|string',
      'meta_keywords'    => 'required|string',
    ]);

    $seo = new Seo($request->all());

    $seo->save();

    return redirect()->route('admin.seos.index');
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   *
   * @return Response
   */
  public function show (int $id): Response
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
  public function edit (int $id)
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
    $seo = Seo::findOrFail($id);
    $request->validate([
      'url'              => 'required|unique:seos,id,' . $id,
      'title'            => 'required|string',
      'description'      => 'required|string',
      'meta_description' => 'required|string',
      'meta_keywords'    => 'required|string',
    ]);

    $seo->update($request->all());
    $seo->save();

    return redirect()->route('admin.seos.index');
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
    $seo = Seo::findOrFail($id);
    $seo->delete();
    return redirect()->route('admin.seos.index');
  }
}
