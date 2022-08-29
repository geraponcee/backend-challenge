<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Boarding;
use App\Models\Port;

class BoardingPort extends Model
{

    use HasFactory;
    protected $table = 'boardings_ports';
    protected $fillable = ['entry_time', 'expiry_time'];

}