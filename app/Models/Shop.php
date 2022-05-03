<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 * App\Models\Shop
 *
 * @property int
 *                    $id
 * @property string|null
 *                    $phone
 * @property string
 *                    $city
 * @property string
 *                    $country
 * @property Carbon|null
 *                    $created_at
 * @property Carbon|null
 *                    $updated_at
 * @property-read array
 *                         $translate
 * @property-read ShopTranslation|null
 *                         $translation
 * @property-read Collection|ShopTranslation[]
 *                $translations
 * @property-read int|null
 *                         $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Shop
 *         listsTranslations(string $translationField)
 * @method static Builder|Shop newModelQuery()
 * @method static Builder|Shop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop
 *         notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop
 *         orWhereTranslation(string $translationField, $value, ?string $locale
 *         = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop
 *         orWhereTranslationLike(string $translationField, $value, ?string
 *         $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop
 *         orderByTranslation(string $translationField, string $sortMethod =
 *         'asc')
 * @method static Builder|Shop query()
 * @method static Builder|Shop translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop
 *         translatedIn(?string $locale = null)
 * @method static Builder|Shop whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop
 *         whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop
 *         whereCreatedAt($value)
 * @method static Builder|Shop whereId($value)
 * @method static Builder|Shop wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop
 *         whereTranslation(string $translationField, $value, ?string $locale =
 *         null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Shop
 *         whereTranslationLike(string $translationField, $value, ?string
 *         $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop
 *         whereUpdatedAt($value)
 * @method static Builder|Shop withTranslation()
 * @mixin Eloquent
 */
class Shop extends Model implements TranslatableContract
{
  use HasFactory;
  use Translatable;

  public array $translatedAttributes = [
    'street',
    'time',
  ];
  protected $fillable = [
    'phone',
    'city',
    'country',
  ];

  protected $appends = [
    'translate',
  ];

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

  /********************************************/
  /**                 RELATION                */
  /********************************************/

  /********************************************/
  /**       Collection Helper Functions       */
  /********************************************/

}
