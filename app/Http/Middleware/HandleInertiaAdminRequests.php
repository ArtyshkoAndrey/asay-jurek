<?php

namespace App\Http\Middleware;

use Auth;
use App\Models\Seo;
use Inertia\Middleware;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HandleInertiaAdminRequests extends Middleware
{
  /**
   * The root template that's loaded on the first page visit.
   *
   * @see https://inertiajs.com/server-side-setup#root-template
   * @var string
   */
  protected $rootView = 'admin';

  /**
   * Determines the current asset version.
   *
   * @see https://inertiajs.com/asset-versioning
   *
   * @param Request $request
   *
   * @return string|null
   */
  public function version(Request $request): ?string
  {
    return parent::version($request);
  }

  /**
   * Defines the props that are shared by default.
   *
   * @see https://inertiajs.com/shared-data
   *
   * @param Request $request
   *
   * @return array
   */
  public function share(Request $request): array
  {
    return array_merge(parent::share($request), [
      'auth.user' => function () use ($request) {
        if ($request->user()) {
          return $request->user()->only('id', 'name', 'email');
        }

        return null;
      }
    ]);
  }

}
