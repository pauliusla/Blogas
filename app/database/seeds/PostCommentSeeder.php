<?php

class PostCommentSeeder extends Seeder {

    public function run()
    {
        Post::truncate();

        $faker = \Faker\Factory::create();

        foreach(range(0, 100) as $i) {
            Post::create([
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
            ]);
        }
    }
}