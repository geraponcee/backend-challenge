<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Boarding;
use App\Models\OwnerImage;

class Owner extends Model
{
    use HasFactory;

    protected $table = 'owners';
    protected $fillable = ['dni', 'first_name', 'last_name', 'birth', 'mail', 'phone_number'];

    public function boardings(){
        return $this->hasMany(Boarding::class, 'id');
    }

}
