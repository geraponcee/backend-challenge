<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class services extends Seeder
{
    public function run()
    {

        $services = [
            ['name' => 'Limpieza exterior'],
            ['name' => 'Limpieza interior'],
            ['name' => 'Reparación de motor'],
            ['name' => 'Reparación general'],
        ];
    
        foreach($services as $service){
            Service::create($service);
        }
        
        $this->command->info('Seed services succesfully!');

    }
}
