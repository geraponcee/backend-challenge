<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\BoardingPortType;
use App\Models\Service;
use App\Models\Image;
use App\Models\Boarding;

class Port extends Model
{
    use HasFactory;

    protected $table = 'ports';
    protected $fillable = ['city', 'province', 'country', 'latitude', 'longitude'];

    public function boardings(){
        return $this->belongsToMany(Boarding::class, 'boardings_ports', 'boarding_id', 'port_id')->withTimestamps();
    }

    public function services(){
        return $this->belongsToMany(Service::class, 'port_services', 'port_id', 'service_id')->withTimestamps();
    }

    public function boardings_types(){
        return $this->hasMany(BoardingPortType::class, 'id');
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

}
