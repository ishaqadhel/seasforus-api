<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    private $city_name = [
        "Jakarta", "Bali", "Bandung", "Surabaya", "Aceh", "Lombok", "Malang", "Ponorogo", "Anyer", "Yogyakarta", "Jimbaran", "Canggu"
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [];
        $i = 1;
        foreach($this->city_name as $city) {
            $rows[] = [
                "name" => $city,
                "created_at" => Carbon::now(),            
            ];
            echo 'Create city data: ' . $i . PHP_EOL;
            $i++;
        }

        $chunks = array_chunk($rows, 5);
        foreach($chunks as $chunk) {
            echo 'inserting chunk' . PHP_EOL;
            DB::table("cities")->insertOrIgnore($chunk);
        }
    }
}
