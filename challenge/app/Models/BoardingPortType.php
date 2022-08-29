<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Port;
use App\Models\BoardingType;

class BoardingPortType extends Model
{
    use HasFactory;

    protected $table = 'boardings_ports_types';

    public function ports(){
        return $this->belongsTo(Port::class, 'port_id');
    }

    public function boardings_types(){
        return $this->belongsTo(BoardingType::class, 'type_id');
    }
}
