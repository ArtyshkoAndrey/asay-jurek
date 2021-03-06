<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 * App\Models\Product
 *
 * @property int                                  $id
 * @property int|null                             $category_id
 * @property int                                  $count
 * @property int                                  $cost
 * @property Carbon|null                          $created_at
 * @property Carbon|null                          $updated_at
 * @property int|null                             $status_id
 * @property bool                                 $new
 * @property bool                                 $week
 * @property-read array                           $translate
 * @property-read ProductTranslation|null         $translation
 * @property-read Collection|ProductTranslation[] $translations
 * @property-read int|null                        $translations_count
 * @property-read Category|null                   $category
 * @property-read Collection|ImageProduct[]       $images
 * @property-read int|null                        $images_count
 * @property-read Status|null                     $status
 * @property-read mixed                           $image
 * @method static Builder|Product listsTranslations(string $translationField)
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product notTranslatedIn(?string $locale = null)
 * @method static Builder|Product orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static Builder|Product orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static Builder|Product orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static Builder|Product query()
 * @method static Builder|Product translated()
 * @method static Builder|Product translatedIn(?string $locale = null)
 * @method static Builder|Product whereCategoryId($value)
 * @method static Builder|Product whereCost($value)
 * @method static Builder|Product whereCount($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereStatusId($value)
 * @method static Builder|Product whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static Builder|Product whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static Builder|Product whereUpdatedAt($value)
 * @method static Builder|Product withTranslation()
 * @mixin Eloquent
 * @method static Builder|Product whereNew($value)
 * @method static Builder|Product whereWeek($value)
 */
class Product extends Model implements TranslatableContract
{
  use HasFactory;
  use Translatable;

  public array $translatedAttributes = [
    'name',
    'description',
    'history',
  ];
  protected $fillable = [
    'cost',
    'count',
    'new',
    'week',
  ];
  protected $casts = [
    'new' => 'boolean',
    'week' => 'boolean',
  ];
  protected $appends = [
    'translate',
    'image',
  ];

  /********************************************/
  /**                 Global Scopes           */
  /********************************************/
  protected static function boot()
  {
    parent::boot();

    static::addGlobalScope('existCategory', static function (Builder $builder) {
      if (!\Route::currentRouteNamed('admin.*')) {
        $builder->whereNotNull('category_id');
        $builder->whereNotNull('status_id');
      }
    });
  }

  /********************************************/
  /**                 ATTRIBUTES              */
  /********************************************/

  /**
   * Translate info. Getter for API
   * [ru => [], en => []]
   *
   * @return array
   */
  public function getTranslateAttribute(): array
  {
    return $this->getTranslationsArray();
  }

  public function getImageAttribute()
  {
    return ImageProduct::where('product_id', $this->id)
      ->first();
  }

  /********************************************/
  /**                 RELATION                */
  /********************************************/

  /**
   * Category in Product
   *
   * @return BelongsTo
   */
  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class);
  }

  /**
   * Product have "??????????????????". Status was CRUD in Admin Panel
   *
   * @return BelongsTo
   */
  public function status(): BelongsTo
  {
    return $this->belongsTo(Status::class);
  }

  /**
   * Get Images for Product
   *
   * @return HasMany
   */
  public function images(): HasMany
  {
    return $this->hasMany(ImageProduct::class);
  }

  /********************************************/
  /**       Collection Helper Functions       */
  /********************************************/
}
