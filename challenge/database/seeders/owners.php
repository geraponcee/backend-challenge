<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Owner;

class owners extends Seeder
{

    public function run()
    {

        $owners = [
            [
                'dni' => '36222444',
                'first_name' => 'Cosme',
                'last_name' => 'Fulanito',
                'birth' => '1990-01-01',
                'mail' => 'cosme@gmail.com',
                'phone_number' => '55515478'
            ],
            [
                'dni' => '33444111',
                'first_name' => 'Homero',
                'last_name' => 'Simpson',
                'birth' => '1990-01-01',
                'mail' => 'homero@gmail.com',
                'phone_number' => '55515781'
            ],
            [
                'dni' => '34123321',
                'first_name' => 'Barney',
                'last_name' => 'Gómez',
                'birth' => '1990-01-01',
                'mail' => 'marney@gmail.com',
                'phone_number' => '55515331'
            ],
            [
                'dni' => '30874454',
                'first_name' => 'Montgomery',
                'last_name' => 'Burns',
                'birth' => '1990-01-01',
                'mail' => 'montgomery@gmail.com',
                'phone_number' => '55515666'
            ]
        ];
    
        foreach($owners as $owner){
            Owner::create($owner);
        }
        
        $this->command->info('Seed owners succesfully!');

    }
}
