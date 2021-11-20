<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $rows = [];

        for($i=0; $i<50; $i++) {
            $rows[] = [
                "name" => $faker->city(),
                "created_at" => Carbon::now(),
            ];
            echo 'Create hospital data: ' . $i + 1 . PHP_EOL;
        }

        $chunks = array_chunk($rows, 5);
        foreach($chunks as $chunk) {
            echo 'inserting chunk' . PHP_EOL;
            DB::table("cities")->insertOrIgnore($chunk);
        }
    }
}
