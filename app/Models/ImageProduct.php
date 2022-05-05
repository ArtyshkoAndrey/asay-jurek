<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\ImageProduct
 *
 * @property int               $id
 * @property string|null       $owner_name
 * @property string            $local_name
 * @property int               $bites
 * @property string|null       $alt
 * @property int|null          $product_id
 * @property Carbon|null       $created_at
 * @property Carbon|null       $updated_at
 * @property-read Product|null $product
 * @property-read mixed        $url
 * @method static Builder|ImageProduct newModelQuery()
 * @method static Builder|ImageProduct newQuery()
 * @method static Builder|ImageProduct query()
 * @method static Builder|ImageProduct whereAlt($value)
 * @method static Builder|ImageProduct whereBites($value)
 * @method static Builder|ImageProduct whereCreatedAt($value)
 * @method static Builder|ImageProduct whereId($value)
 * @method static Builder|ImageProduct whereLocalName($value)
 * @method static Builder|ImageProduct whereOwnerName($value)
 * @method static Builder|ImageProduct whereProductId($value)
 * @method static Builder|ImageProduct whereUpdatedAt($value)
 * @mixin Eloquent
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
    'url',
  ];


  /********************************************/
  /**                 ATTRIBUTES              */
  /********************************************/
  public function getUrlAttribute ()
  {
    return url('/public/storage/img-products/' . $this->local_name);
  }

  /********************************************/
  /**                 RELATION                */
  /********************************************/
  public function product (): BelongsTo
  {
    return $this->belongsTo(Product::class);
  }

  /********************************************/
  /**       Collection Helper Functions       */
  /********************************************/
}
