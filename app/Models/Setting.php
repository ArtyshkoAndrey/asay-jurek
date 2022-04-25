<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translate
 * @property-read \App\Models\SettingTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SettingTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Setting listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting withTranslation()
 * @mixin \Eloquent
 */
class Setting extends Model implements TranslatableContract
{
  use HasFactory;
  use Translatable;

  public array $translatedAttributes = [
    'value'
  ];

  protected $fillable = [
    'name'
  ];

  protected $appends = [
    'translate'
  ];

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

  public static function deliverySetting (): ?self
  {
    return self::whereName('delivery')->first();
  }

  public static function statusProductSetting (): ?self
  {
    return self::whereName('status_product')->first();
  }

}
