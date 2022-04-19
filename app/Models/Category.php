<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Category extends Model implements TranslatableContract
{
  use HasFactory;
  use Translatable;

  public array $translatedAttributes = [
    'name',
  ];

  protected $appends = [
    'translate'
  ];

  public function getTranslateAttribute (): array
  {
    return $this->getTranslationsArray();
  }

  public function parent ()
  {
    return $this->hasOne(self::class, 'id', 'parent_id');
  }

  public function childs ()
  {
    return $this->hasMany(self::class, 'parent_id', 'id');
  }
}
