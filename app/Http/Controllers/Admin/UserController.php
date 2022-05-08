<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @param Request $request
   *
   * @return \Inertia\Response|\Illuminate\Http\JsonResponse
   */
  public function index (Request $request)
  {
    $data  = [
      'q' => $request->get('q'),
      'is_admin' => $request->boolean('is_admin'),
    ];
    $users = User::orderByDesc('created_at');

    if($data['is_admin']) {
      $users = $users->where('is_admin', true);
    }

    if ($data['q']) {
      $users = $users->where('name', 'like', '%' . $data['q'] . '%')
        ->orWhere('email', 'like', '%' . $data['q'] . '%')
        ->orWhere('phone', 'like', '%' . $data['q'] . '%');
    }

    $users = $users->paginate(20);

    if ($request->has('is_json')) {
      return JsonResponse::success([
        'users' => $users,
      ]);
    }

    return Inertia::render('Admins/Users/Index', [
      'users'    => $users,
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