<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id' => 1 ,
                'name'=> 'سینه'
            ],
            [
                'id' => 2 ,
                'name'=> 'سرشانه'
            ],
            [
                'id' => 3 ,
                'name'=> 'زیربغل (پشت)'
            ],
            [
                'id' => 4 ,
                'name'=> 'بازو'
            ],
            [
                'id' => 5 ,
                'name'=> 'پا'
            ],
            [
                'id' => 6 ,
                'name'=> 'شکم'
            ],
            [
                'id' => 7,
                'name'=> 'تمرینات ترکیبی'
            ],
        ];

        \App\WorkoutCategory::insert($categories);
    }
}
