<?php

use Illuminate\Database\Seeder;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meals = [
            [
              'id' => '1',
                'name' => 'صبحانه'
            ], [
                'id' => '2',
                'name' => 'ناهار'
            ], [
                'id' => '3',
                'name' => 'عصرانه'
            ], [
                'id' => '4',
                'name' => 'شام'
            ],
        ];
        \Illuminate\Support\Facades\DB::table('meals')->insert($meals);
    }
}
