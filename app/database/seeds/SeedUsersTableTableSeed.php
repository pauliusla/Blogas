<?php

class SeedUsersTableSeed extends Seeder {

    public function run()
    {
        User::truncate();

        $faker = \Faker\Factory::create();

        foreach(range(0, 100) as $i) {
            User::create([
                'first_name' => $faker->word,
                'last_name' => $faker->word,
                'email' => $faker->word,
                'password' => $faker->word,
            ]);
        }
    }
}