<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

//    protected $perPage = 1;

    protected $fillable = [
      'name',
      'description',
      'latitude',
      'longitude'
    ];

    protected $guarded = [
      'slug',
      'image_path'
    ];

  public function getRouteKeyName()
  {
    return 'slug';
  }
}
