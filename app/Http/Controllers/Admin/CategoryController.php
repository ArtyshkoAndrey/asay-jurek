<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Inertia\Response
   */
  public function index (): \Inertia\Response
  {
    $categories = Category::whereNull('parent_id')->get();

    return Inertia::render('Admins/Categories/Index', [
      'categories' => $categories
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Inertia\Response
   */
  public function create (Request $request): \Inertia\Response
  {
    $ownCategory = null;

    if ($id = $request->get('parent_id')) {
      $ownCategory = Category::findOrFail($id);
    }

    return Inertia::render('Admins/Categories/Create', [
      'ownCategory' => $ownCategory
    ]);
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
      'ru.name' => 'required|string',
      'en.name' => 'required|string',
    ]);

    $category = new Category($request->except('parent_id'));
    if ($id = $request->get('parent_id')) {
      $category->parent_id = $id;
    }

    $category->save();

    return redirect()->route('admin.categories.index');
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   *
   * @return \Inertia\Response
   */
  public function show (int $id): \Inertia\Response
  {
    $category = Category::with(['parent', 'childs'])->findOrFail($id);

    return Inertia::render('Admins/Categories/Show', [
      'category' => $category
    ]);
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
    $category = Category::with(['parent', 'childs'])->findOrFail($id);

    return Inertia::render('Admins/Categories/Edit', [
      'category' => $category
    ]);
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
      'ru.name' => 'required|string',
      'en.name' => 'required|string',
    ]);

    $category = Category::findOrFail($id);
    $category->update($request->except('parent_id'));
    $category->save();
    return redirect()->route('admin.categories.index');
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
    $category = Category::findOrFail($id);
    $category->delete();

    return redirect()->route('admin.categories.index');
  }
}
