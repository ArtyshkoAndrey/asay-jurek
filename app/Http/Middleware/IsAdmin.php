<?php

namespace App\Http\Middleware;

use App;
use Auth;
use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class IsAdmin
{
  /**
   * Handle an incoming request.
   *
   * @param Request $request
   * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   *
   * @return Response|RedirectResponse
   */
  public function handle (Request $request, Closure $next)
  {
    if (Auth::check()) {
//    If logged in
      $user = User::find(auth()->id());
      if ($user->is_admin) {
        App::setLocale('ru');
        return $next($request);
      }
    }
    return redirect()->route('index');
  }
}
