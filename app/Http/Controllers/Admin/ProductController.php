<?php

namespace App\Http\Controllers\Admin;

use File;
use Exception;
use Inertia\Inertia;
use App\Models\Status;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ImageProduct;
use Illuminate\Http\Response;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
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
    $data     = [
      'q' => $request->get('q'),
    ];
    $products = Product::orderByDesc('created_at');

    if ($data['q']) {
      $products = $products->whereTranslationLike('name', 'like', '%' . $data['q'] . '%');
    }

    $products = $products->paginate(20);

    if ($request->has('is_json')) {
      return JsonResponse::success([
        'products' => $products,
      ]);
    }

    return Inertia::render('Admins/Products/Index', [
      'products' => $products,
      'formData' => $data,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Inertia\Response
   */
  public function create ()
  {

    $categories = Category::with([
      'childs',
      'parent',
    ])
      ->get();
    $statuses   = Status::all();

    return Inertia::render('Admins/Products/Create', [
      'categories' => $categories,
      'statuses'   => $statuses,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   *
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store (Request $request)
  {
    $request->validate([
      'ru.name' => 'required|string',
      'ru.description' => 'required|string',
      'ru.history' => 'required|string',

      'en.name' => 'required|string',
      'en.description' => 'required|string',
      'en.history' => 'required|string',

      'category_id' => 'required|exists:categories,id',
      'status_id' => 'required|exists:statuses,id',

      'count' => 'required|integer|min:0',
      'cost' => 'required|integer|min:0',

      'week' => 'required|boolean',
      'new' => 'required|boolean',

      'ids_photos' => 'required|array|min:1',
      "ids_photos.*" => "required|exists:image_products,id"
    ]);
    $product = new Product($request->all());
    $product->category()->associate($request->get('category_id'));
    $product->status()->associate($request->get('status_id'));
    $product->save();

    foreach ($request->get('ids_photos') as $item) {
      $image = ImageProduct::find($item);

      if ($image) {
        $image->product()->associate($product);
        $image->save();
      }
    }

    return redirect()->route('admin.products.index');
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
   * @return \Inertia\Response
   */
  public function edit (int $id): \Inertia\Response
  {
    $product = Product::with([
      'category',
      'status',
      'images',
    ])
      ->findOrFail($id);

    $categories = Category::with([
      'childs',
      'parent',
    ])
      ->get();
    $statuses   = Status::all();

    return Inertia::render('Admins/Products/Edit', [
      'product'    => $product,
      'categories' => $categories,
      'statuses'   => $statuses,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param int     $id
   *
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update (Request $request, int $id)
  {
    $product = Product::findOrFail($id);

    $request->validate([
      'ru.name' => 'required|string',
      'ru.description' => 'required|string',
      'ru.history' => 'required|string',

      'en.name' => 'required|string',
      'en.description' => 'required|string',
      'en.history' => 'required|string',

      'category_id' => 'required|exists:categories,id',
      'status_id' => 'required|exists:statuses,id',

      'count' => 'required|integer|min:0',
      'cost' => 'required|integer|min:0',

      'week' => 'required|boolean',
      'new' => 'required|boolean',

      'ids_photos' => 'required|array|min:1',
      "ids_photos.*" => "required|exists:image_products,id"
    ]);

    $product->update($request->all());


    $product->category()->associate($request->get('category_id'));
    $product->status()->associate($request->get('status_id'));
    $product->save();

    foreach ($request->get('ids_photos') as $item) {
      $image = ImageProduct::find($item);

      if ($image) {
        $image->product()->associate($product);
        $image->save();
      }
    }

    return redirect()->route('admin.products.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   *
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy (int $id)
  {
    $product = Product::findOrFail($id);
//    TODO: delete photo file Observer
    foreach ($product->images as $image) {
      $image->delete();
    }
    $product->delete();

    return redirect()->route('admin.products.index');
  }

  /**
   * @throws Exception
   */
  public function photo (Request $request): \Illuminate\Http\JsonResponse
  {
    $file     = $request->file('file');
    $old_name = $file->getClientOriginalName();
    $name     = time() . random_int(0, 100) . '.' . $file->getClientOriginalExtension();
    Image::make($file)
      ->save(storage_path('app/public/img-products/' . $name));

    $image = new ImageProduct([
      'local_name' => $name,
      'owner_name' => $old_name,
      'bites'      => 0,
      'alt'        => $old_name,
    ]);
    $image->save();

    return JsonResponse::success([
      'image' => $image,
    ]);
  }

  public function photoDelete (int $id): \Illuminate\Http\JsonResponse
  {
    $image = ImageProduct::findOrFail($id);
    File::delete('storage/app/public/img-products/' . $image->local_name);
    $image->delete();

    return JsonResponse::success([
      'id' => $id
    ]);
  }
}
