<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 * App\Models\Setting
 *
 * @property int                                  $id
 * @property string                               $name
 * @property Carbon|null                          $created_at
 * @property Carbon|null                          $updated_at
 * @property-read array                           $translate
 * @property-read SettingTranslation|null         $translation
 * @property-read Collection|SettingTranslation[] $translations
 * @property-read int|null                        $translations_count
 * @method static Builder|Setting listsTranslations(string $translationField)
 * @method static Builder|Setting newModelQuery()
 * @method static Builder|Setting newQuery()
 * @method static Builder|Setting notTranslatedIn(?string $locale = null)
 * @method static Builder|Setting orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static Builder|Setting orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static Builder|Setting orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static Builder|Setting query()
 * @method static Builder|Setting translated()
 * @method static Builder|Setting translatedIn(?string $locale = null)
 * @method static Builder|Setting whereCreatedAt($value)
 * @method static Builder|Setting whereId($value)
 * @method static Builder|Setting whereName($value)
 * @method static Builder|Setting whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static Builder|Setting whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static Builder|Setting whereUpdatedAt($value)
 * @method static Builder|Setting withTranslation()
 * @mixin Eloquent
 */
class Setting extends Model implements TranslatableContract
{
  use HasFactory;
  use Translatable;

  public array $translatedAttributes = [
    'value',
  ];

  protected $fillable = [
    'name',
  ];

  protected $appends = [
    'translate',
  ];


  /********************************************/
  /**                 ATTRIBUTES              */
  /********************************************/


  public static function deliverySetting (): ?self
  {
    return self::whereName('delivery')
      ->first();
  }

  /********************************************/
  /**                 RELATION                */
  /********************************************/

  /********************************************/
  /**       Collection Helper Functions       */
  /********************************************/
  public static function statusProductSetting (): ?self
  {
    return self::whereName('status_product')
      ->first();
  }

  /**
   * @return HigherOrderBuilderProxy|mixed|null
   */
  public static function getYandexMetrics ()
  {
    $setting = self::where('name', 'yandex_metrics')
      ->first();
    return $setting->translate('ru')->value ?? null;
  }

  /**
   * Translate info. Getter for API
   * [ru => [], en => []]
   *
   * @return array
   */
  public function getTranslateAttribute (): array
  {
    return $this->getTranslationsArray();
  }

}
