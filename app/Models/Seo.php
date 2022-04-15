<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
  use HasFactory;

  protected $fillable = [
    'url',
    'title',
    'description',
    'meta_description',
    'meta_keywords'
  ];
}
