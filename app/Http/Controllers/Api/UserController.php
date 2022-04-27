<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{

  public function uploadPhoto (Request $request): \Illuminate\Http\JsonResponse
  {
    $request->validate([
      'photo' => 'required',
      'user_id' => 'required|exists:users,id'
    ]);

    $file = $request->file('photo');
    $user_id = $request->get('user_id');


    $user = User::find($user_id);
    dd(public_path('/storage/users/'). $user->photo);
    if ($user->photo && File::exists(public_path('/storage/users/') . $user->photo)) {
      \File::delete(public_path('/storage/users/'). $user->photo);
    }
    $name = time() . '.' . $file->getClientOriginalExtension();
    Image::make($file)
      ->resize(800, 600)
      ->save(storage_path(User::PATH_PHOTO . $name));
    $user->photo = $name;
    $user->save();


    return JsonResponse::success([
      'user' => $user
    ]);
  }

}