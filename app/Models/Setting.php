<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

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
