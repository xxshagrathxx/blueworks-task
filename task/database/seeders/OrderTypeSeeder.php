<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\OrderType;

class OrderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'type' => 'dine-in',
            ],[
                'type' => 'delivery',
            ],[
                'type' => 'takeaway',
            ]
        ];

        foreach($types as $type){
            OrderType::create($type);
        }
    }
}
