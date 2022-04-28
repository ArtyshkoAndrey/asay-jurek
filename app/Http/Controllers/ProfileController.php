<?php

namespace App\Http\Controllers;

use Auth;
use Inertia\Inertia;
use App\Models\User;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{

  public function index(): Response
  {
    $user = Auth::user();
    return Inertia::render('Users/Profile', [
      'user' => $user,
    ]);
  }

  public function uploadPhoto (Request $request): RedirectResponse
  {
    $request->validate([
      'photo' => 'required',
      'user_id' => 'required|exists:users,id',
    ]);

    $file = $request->file('photo');
    $user_id = $request->get('user_id');

    $user = User::find($user_id);
    if ($user->photo && File::exists(public_path('/storage/users/') . $user->photo)) {
      \File::delete(public_path('/storage/users/') . $user->photo);
    }
    $name = time() . '.' . $file->getClientOriginalExtension();
    Image::make($file)
      ->resize(800, 600)
      ->save(storage_path(User::PATH_PHOTO . $name));
    $user->photo = $name;
    $user->save();

    return redirect()->route('profile.index')->with('success', 'User Created!');
  }

  public function updatePassword (Request $request): RedirectResponse
  {
    $request->validate([
      'password' => 'required|string|min:6',
      'confirm_password' => 'required|string|min:6'
    ]);

    $user = Auth::user();

    $user->password = \Hash::make($request->get('password'));
    $user->save();

    return redirect()->route('profile.index')->with('success', 'User Created!');
  }

  public function updateInfo (Request $request): RedirectResponse
  {
    $request->validate([
      'name' => 'required|string|min:6',
      'email' => 'required|email:rfc,dns',
      'phone' => 'required|string|min:6',
    ]);

    $user = Auth::user();

    $user->password = \Hash::make($request->get('password'));
    $user->save();

    return redirect()->route('profile.index')->with('success', 'User Created!');
  }
}