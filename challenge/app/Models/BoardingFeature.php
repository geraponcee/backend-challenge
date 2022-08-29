<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardingFeature extends Model
{

    use HasFactory;

    protected $table = 'boardings_features';
    protected $fillable = ['color', 'length', 'width', 'max_weight'];
    public $timestamps = false;

}
