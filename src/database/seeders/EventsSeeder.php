<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $arr = $this->dataEvents();

        $i = 1;
        foreach($arr as $event) {
            if($i > 5) {
                $date = $faker->dateTimeBetween('-2 week', '-1 week');
            } else {
                $date = $faker->dateTimeBetween('+3 week', '+6 week');
            }

            Event::create([
                "id_city" => $event["id_city"],
                "name" => $event["name"],
                "description" => $event["description"],
                "link_image" => $event["link_image"],
                "date" => $date,
            ]);

            $i++;
        }
    }

    private function dataEvents() {
        $data = '[
            {"id_city":9,"name":"Anyer Beach","description":"Come join us to clean Anyer Beach","link_image": "https://res.cloudinary.com/theodorusclarence/image/upload/f_auto,c_fill,ar_5:3,w_1200/v1637384611/seasforus/rowan-heuvel-U6t80TWJ1DM-unsplash_oiwlnq.jpg"},
            {"id_city":2,"name":"Kuta Beach","description":"Kuta is a tourist area, southern Bali, Indonesia. Kuta beach is also known as Sunset Beach","link_image": "https://res.cloudinary.com/theodorusclarence/image/upload/f_auto,c_fill,ar_5:3,w_1200/v1637384615/seasforus/max-PqoCWV93yps-unsplash_asxwzj.jpg"},
            {"id_city":4,"name":"Kenjeran Beach","description":"Come join us to clean Kenjeran Beach","link_image": "https://res.cloudinary.com/theodorusclarence/image/upload/f_auto,c_fill,ar_5:3,w_1200/v1637384611/seasforus/rowan-heuvel-U6t80TWJ1DM-unsplash_oiwlnq.jpg"},
            {"id_city":11,"name":"Watu Kodok Beach","description":"Come join us to clean Watu Kodok Beach","link_image": "https://res.cloudinary.com/theodorusclarence/image/upload/f_auto,c_fill,ar_5:3,w_1200/v1637384611/seasforus/sean-oulashin-KMn4VEeEPR8-unsplash_a3l3sn"},
            {"id_city":5,"name":"Sabang Beach","description":"Come join us to clean Sabang Beach","link_image": "https://res.cloudinary.com/theodorusclarence/image/upload/f_auto,c_fill,ar_5:3,w_1200/v1637384611/seasforus/vojtech-bruzek-Efaye2ISGyw-unsplash_fdu2ts.jpg"},
            {"id_city":6,"name":"Kuta Lombok Beach","description":"Come join us to clean Kuta Lombok Beach","link_image": "https://res.cloudinary.com/theodorusclarence/image/upload/f_auto,c_fill,ar_5:3,w_1200/v1637384611/seasforus/chris-galbraith-7XAM0J3dNQM-unsplash_t5kqwe.jpg"},
            {"id_city":7,"name":"Balekambang Beach","description":"Come join us to clean Balekambang Beach","link_image": "https://res.cloudinary.com/theodorusclarence/image/upload/f_auto,c_fill,ar_5:3,w_1200/v1637384611/seasforus/lalo-hernandez-Amo081zdJsI-unsplash_uaxco7.jpg"},
            {"id_city":2,"name":"Nusa Penida Beach","description":"Come join us to clean Nusa Penida Beach","link_image": "https://res.cloudinary.com/theodorusclarence/image/upload/f_auto,c_fill,ar_5:3,w_1200/v1637384611/seasforus/rachel-cook-mOcdke2ZQoE-unsplash_hggztl.jpg"},
            {"id_city":9,"name":"Sambolo Beach","description":"Come join us to clean Sambolo Beach","link_image": "https://res.cloudinary.com/theodorusclarence/image/upload/f_auto,c_fill,ar_5:3,w_1200/v1637384611/seasforus/derek-thomson-TWoL-QCZubY-unsplash_dfwcmk.jpg"},
            {"id_city":10,"name":"Karang Bolong Beach","description":"Come join us to clean Karang Bolong Beach","link_image": "https://res.cloudinary.com/theodorusclarence/image/upload/f_auto,c_fill,ar_5:3,w_1200/v1637384611/seasforus/elizeu-dias-RN6ts8IZ4_0-unsplash_jjc1kx.jpg"}
        ]';

        return json_decode($data, true);
    }
}
