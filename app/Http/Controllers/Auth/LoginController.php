<?php

namespace App\Http\Controllers\Auth;

use Route;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = RouteServiceProvider::HOME;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function showLoginForm(): Response
  {
    return Inertia::render('Users/Login');
  }

  protected function sendLoginResponse(Request $request)
  {
    $request->session()->regenerate();

    $this->clearLoginAttempts($request);

    Inertia::share('auth.user', static function () use ($request) {
      if ($request->user())
        return $request->user()->only('id', 'name', 'email');
      else
        return null;
    });

    if ($response = $this->authenticated($request, $this->guard()->user())) {
      return $response;
    }

    return $request->wantsJson()
      ? new \Illuminate\Http\JsonResponse([], 204)
      : redirect()->intended($this->redirectPath());
  }

  public function logout(Request $request)
  {
//    dd(123);
    $this->guard()->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    Inertia::share('auth.user', static function () use ($request) {
        return null;
    });

    if ($request->get('is_admin')) {
      return Inertia::location('/');
    }
    if ($response = $this->loggedOut($request)) {
      return $response;
    }

    return $request->wantsJson()
      ? new \Illuminate\Http\JsonResponse([], 204)
      : redirect('/');
  }
}
