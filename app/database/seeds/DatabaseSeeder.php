<?php

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        Post::truncate();

        User::truncate();

        $faker = \Faker\Factory::create();

        User::create([
            'first_name' => 'Paulius',
            'last_name' => 'Lapinskas',
            'email' => 'pauldarkas@gmail.com',
            'password' => 'savas'
        ]);

        foreach (range(0, 1000) as $i) {
            Post::create([
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
            ]);
        }
        foreach (range(0, 15) as $i) {
            Comment::create(
                [
                    'commenter' => $faker->word,
                    'comment' => $faker->paragraph,
                ]
            );
        }


    }

}
