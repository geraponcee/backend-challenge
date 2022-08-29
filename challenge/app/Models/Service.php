<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Port;

class Service extends Model
{

    use HasFactory;
    protected $table = 'services';
    public $timestamps = false;
    protected $fillable = ['name'];

    public function ports(){
        return $this->belongsToMany(Port::class, 'port_services', 'port_id', 'service_id')->withTimestamps();
    }

}
