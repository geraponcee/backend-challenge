<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BoardingType;
use App\Models\BoardingFeature;
use App\Models\Owner;

class Boarding extends Model
{
    use HasFactory;

    protected $table = 'boardings';
    protected $fillable = ['registration', 'name', 'image'];

    public function type(){
        return  $this->hasOne(BoardingType::class, 'id', 'type_id');
    }

    public function ports(){
        return $this->belongsToMany(Port::class, 'boardings_ports', 'boarding_id', 'port_id')->withTimestamps();
    }

    public function feature(){
        return $this->hasOne(BoardingFeature::class, 'id', 'feature_id');
    }

    public function owner(){
        return $this->hasOne(Owner::class, 'id', 'owner_id');
    }
}
