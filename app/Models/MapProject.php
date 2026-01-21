<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapProject extends Model
{
    protected $fillable = [
        'name',
        'address',
        'description',
        'sector',
        'condition',
        'investment_opportunity',
        'latitude',
        'longitude',
        'image'
    ];
}
