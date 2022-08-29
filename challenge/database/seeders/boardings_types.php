<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BoardingType;

class boardings_types extends Seeder
{

    public function run()
    {

        $types = [
            ['description' => 'Velero'],
            ['description' => 'Yate'],
            ['description' => 'Moto de agua'],
            ['description' => 'Barco mercante'],
            ['description' => 'Crucero'],
            ['description' => 'Submarino'],
        ];
    
        foreach($types as $type){
            BoardingType::create($type);
        }
        $this->command->info('Seed boardings_types succesfully!');

    }

}
