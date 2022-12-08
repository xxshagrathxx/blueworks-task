<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Item::factory(20)->create();
        // Item::factory()->count(20)->create();
        $items = [
            [
                'name' => 'Item1',
                'price' => rand(30,200),
            ],[
                'name' => 'Item2',
                'price' => rand(30,200),
            ],[
                'name' => 'Item3',
                'price' => rand(30,200),
            ],[
                'name' => 'Item4',
                'price' => rand(30,200),
            ],[
                'name' => 'Item5',
                'price' => rand(30,200),
            ],[
                'name' => 'Item6',
                'price' => rand(30,200),
            ],[
                'name' => 'Item7',
                'price' => rand(30,200),
            ],[
                'name' => 'Item8',
                'price' => rand(30,200),
            ],[
                'name' => 'Item9',
                'price' => rand(30,200),
            ]
        ];

        foreach($items as $item){
            Item::create($item);
        }
    }
}
