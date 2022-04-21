<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\ImageProduct
 *
 * @property int $id
 * @property string|null $owner_name
 * @property string $local_name
 * @property int $bites
 * @property string|null $alt
 * @property int|null $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProduct whereAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProduct whereBites($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProduct whereLocalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProduct whereOwnerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ImageProduct extends Model
{
  use HasFactory;

  protected $fillable = [
    'owner_name',
    'local_name',
    'bites',
    'alt',
  ];

  protected $appends = [
    'url'
  ];

  public function getUrlAttribute () {
    return url('/public/storage/img-products/' . $this->local_name);
  }

  public function product(): BelongsTo
  {
    return $this->belongsTo(Product::class);
  }
}
