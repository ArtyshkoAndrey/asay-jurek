<?php

namespace App\Http\Middleware;

use Auth;
use App\Models\Seo;
use Inertia\Middleware;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HandleInertiaRequests extends Middleware
{
  /**
   * The root template that's loaded on the first page visit.
   *
   * @see https://inertiajs.com/server-side-setup#root-template
   * @var string
   */
  protected $rootView = 'app';

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
    $url = $request->getPathInfo();
    $seo = $this->getSeo($url);
    return array_merge(parent::share($request), [
      'seo' => $seo,
      'locale' => app()->getLocale(),
      'menu.categories' => $this->getCategories(),
      'auth.user' => function () use ($request) {
        if ($request->user()) {
          return $request
            ->user()
            ->only('id',
              'name',
              'email',
              'city',
              'country',
              'phone',
              'url',
              'street'
            );
        }

        return null;
      }
    ]);
  }

  private function getSeo(string $url): Seo
  {
    $seo = Seo::whereUrl($url)->first();
    if ($seo) {
      return $seo;
    }
    return new Seo([
      'url' => $url,
      'title' => 'Asay Jurek',
      'description' => 'Попросите администратора заполнить сео',
      'meta_description' => 'Попросите администратора заполнить сео',
    ]);
  }

  private function getUser(): ?\App\Models\User
  {
    if (Auth::user()) {
      return Auth::user();
    }

    return null;
  }

  private function getCategories ()
  {
    return Cache::remember(config('custom-cache.categories_menu'), 60*60*12, static function() {
      $categories = Category::with('childs')->where('parent_id', null)->get();
      return $categories;
    });
  }
}
