<?php

use Faker\Generator as Faker;
use App\Train;

use Illuminate\Database\Seeder;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $companies = [
            'FrecciaRossa',
            'FrecciaArgento',
            'Italo',
            'Trenitalia',
            'BooleanTrain'
        ];

        for ($i = 0; $i < 10; $i++) {
            $train = new Train();
            $train -> company = $companies[rand(0, count($companies) - 1)];
            $train -> departure_station = $faker -> city();
            $train -> arrival_station = $faker -> city();
            $train -> departure_hour = $faker -> time('H:i');
            $train -> arrival_hour = $faker -> time('H:i');
            $train -> departure_day = $faker -> dateTimeInInterval('-10 day', '+10 days');
            $train -> train_code = $faker -> regexify('[A-Z]{4}[0-9]{4}');
            $train -> wagons_number = $faker -> numberBetween(2, 20);
            $train -> on_time = $faker -> boolean();
            $train -> cancelled = $faker -> boolean();
            $train -> save();
        }
    }
}
