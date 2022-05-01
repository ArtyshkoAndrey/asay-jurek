<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 * App\Models\Status
 *
 * @property int                                 $id
 * @property Carbon|null                         $created_at
 * @property Carbon|null                         $updated_at
 * @property-read array                          $translate
 * @property-read StatusTranslation|null         $translation
 * @property-read Collection|StatusTranslation[] $translations
 * @property-read int|null                       $translations_count
 * @method static Builder|Status listsTranslations(string $translationField)
 * @method static Builder|Status newModelQuery()
 * @method static Builder|Status newQuery()
 * @method static Builder|Status notTranslatedIn(?string $locale = null)
 * @method static Builder|Status orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static Builder|Status orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static Builder|Status orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static Builder|Status query()
 * @method static Builder|Status translated()
 * @method static Builder|Status translatedIn(?string $locale = null)
 * @method static Builder|Status whereCreatedAt($value)
 * @method static Builder|Status whereId($value)
 * @method static Builder|Status whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static Builder|Status whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static Builder|Status whereUpdatedAt($value)
 * @method static Builder|Status withTranslation()
 * @mixin Eloquent
 */
class Status extends Model implements TranslatableContract
{
  use HasFactory;
  use Translatable;

  public array $translatedAttributes = [
    'name',
  ];

  protected $appends = [
    'translate',
  ];


  /********************************************/
  /**                 ATTRIBUTES              */
  /********************************************/
  public function getTranslateAttribute(): array
  {
    return $this->getTranslationsArray();
  }

  /********************************************/
  /**                 RELATION                */
  /********************************************/

  /********************************************/
  /**       Collection Helper Functions       */
  /********************************************/
}
