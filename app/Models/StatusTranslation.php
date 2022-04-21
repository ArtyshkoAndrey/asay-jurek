<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\StatusTranslation
 *
 * @property int    $id
 * @property int    $status_id
 * @property string $locale
 * @property string $name
 * @method static Builder|StatusTranslation newModelQuery()
 * @method static Builder|StatusTranslation newQuery()
 * @method static Builder|StatusTranslation query()
 * @method static Builder|StatusTranslation whereId($value)
 * @method static Builder|StatusTranslation whereLocale($value)
 * @method static Builder|StatusTranslation whereName($value)
 * @method static Builder|StatusTranslation whereStatusId($value)
 * @mixin Eloquent
 */
class StatusTranslation extends Model
{
  use HasFactory;

  public $timestamps = false;

  protected $fillable = [
    'name',
  ];
}
