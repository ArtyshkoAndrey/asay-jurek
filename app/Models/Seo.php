<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Seo
 *
 * @property int                             $id
 * @property string                          $url
 * @property string|null                     $title
 * @property string|null                     $description
 * @property string|null                     $meta_description
 * @property string|null                     $meta_keywords
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Seo newModelQuery()
 * @method static Builder|Seo newQuery()
 * @method static Builder|Seo query()
 * @method static Builder|Seo whereCreatedAt($value)
 * @method static Builder|Seo whereDescription($value)
 * @method static Builder|Seo whereId($value)
 * @method static Builder|Seo whereMetaDescription($value)
 * @method static Builder|Seo whereMetaKeywords($value)
 * @method static Builder|Seo whereTitle($value)
 * @method static Builder|Seo whereUpdatedAt($value)
 * @method static Builder|Seo whereUrl($value)
 * @mixin Eloquent
 */
class Seo extends Model
{
  use HasFactory;

  protected $fillable = [
    'url',
    'title',
    'description',
    'meta_description',
    'meta_keywords',
  ];
}
