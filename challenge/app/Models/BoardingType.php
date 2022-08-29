<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Boarding;
use App\Models\BoardingPortType;

class BoardingType extends Model
{
    use HasFactory;
    protected $table = 'boardings_types';
    public $timestamps = false;
    
    public function boardings() {
        return $this->belongsTo(Boarding::class, 'type_id');
    }

    public function ports(){
        return $this->hasMany(BoardingPortType::class, 'id');
    }

}
