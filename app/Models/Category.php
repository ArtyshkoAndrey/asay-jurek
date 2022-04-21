<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 * App\Models\Category
 *
 * @property int                                   $id
 * @property int|null                              $parent_id
 * @property Carbon|null                           $created_at
 * @property Carbon|null                           $updated_at
 * @property-read Collection|Category[]            $childs
 * @property-read int|null                         $childs_count
 * @property-read array                            $translate
 * @property-read Category|null                    $parent
 * @property-read CategoryTranslation|null         $translation
 * @property-read Collection|CategoryTranslation[] $translations
 * @property-read int|null                         $translations_count
 * @method static Builder|Category listsTranslations(string $translationField)
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category notTranslatedIn(?string $locale = null)
 * @method static Builder|Category orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static Builder|Category orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static Builder|Category orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static Builder|Category query()
 * @method static Builder|Category translated()
 * @method static Builder|Category translatedIn(?string $locale = null)
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereParentId($value)
 * @method static Builder|Category whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static Builder|Category whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static Builder|Category whereUpdatedAt($value)
 * @method static Builder|Category withTranslation()
 * @mixin Eloquent
 */
class Category extends Model implements TranslatableContract
{
  use HasFactory;
  use Translatable;

  public array $translatedAttributes = [
    'name',
  ];

  protected $appends = [
    'translate',
  ];

  public function getTranslateAttribute(): array
  {
    return $this->getTranslationsArray();
  }

  public function parent(): HasOne
  {
    return $this->hasOne(self::class, 'id', 'parent_id');
  }

  public function childs(): HasMany
  {
    return $this->hasMany(self::class, 'parent_id', 'id');
  }
}
