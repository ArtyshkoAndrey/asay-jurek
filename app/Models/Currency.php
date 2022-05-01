<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 * App\Models\Currency
 *
 * @property int                                   $id
 * @property string                                $short_name
 * @property bool                                  $default
 * @property float                                 $value
 * @property string|null                           $description
 * @property Carbon|null                           $created_at
 * @property Carbon|null                           $updated_at
 * @property-read CurrencyTranslation|null         $translation
 * @property-read Collection|CurrencyTranslation[] $translations
 * @property-read int|null                         $translations_count
 * @method static Builder|Currency listsTranslations(string $translationField)
 * @method static Builder|Currency newModelQuery()
 * @method static Builder|Currency newQuery()
 * @method static Builder|Currency notTranslatedIn(?string $locale = null)
 * @method static Builder|Currency orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static Builder|Currency orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static Builder|Currency orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static Builder|Currency query()
 * @method static Builder|Currency translated()
 * @method static Builder|Currency translatedIn(?string $locale = null)
 * @method static Builder|Currency whereCreatedAt($value)
 * @method static Builder|Currency whereDefault($value)
 * @method static Builder|Currency whereDescription($value)
 * @method static Builder|Currency whereId($value)
 * @method static Builder|Currency whereShortName($value)
 * @method static Builder|Currency whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static Builder|Currency whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static Builder|Currency whereUpdatedAt($value)
 * @method static Builder|Currency whereValue($value)
 * @method static Builder|Currency withTranslation()
 * @mixin Eloquent
 * @property-read array                            $translate
 * @property string $symbol
 * @method static Builder|Currency whereSymbol($value)
 */
class Currency extends Model implements TranslatableContract
{
  use HasFactory;
  use Translatable;

  public array $translatedAttributes = [
    'name',
  ];

  protected $fillable = [
    'short_name',
    'value',
    'description',
    'default',
  ];

  protected $casts = [
    'default' => 'boolean',
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
