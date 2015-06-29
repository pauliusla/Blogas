<?php

class DatabaseSeeder extends Seeder
{
    /** @var  \Faker\Factory */
    protected $faker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

       $this->truncate();

        $this->faker = \Faker\Factory::create();

        User::create([
            'first_name' => 'Paulius',
            'last_name' => 'Lapinskas',
            'email' => 'pauldarkas@gmail.com',
            'password' => 'savas',
            'role' => 'admin'
        ]);


        foreach (range(0, 15) as $i) {
            $this->createUser();
        }


    }

    protected function truncate()
    {
        DB::statement('SET foreign_key_checks = 0');

        Comment::truncate();

        Post::truncate();

        User::truncate();

        DB::statement('SET foreign_key_checks = 1');
    }

    protected function createUser()
    {
        $user = User::create([
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'savas'
        ]);

        foreach(range(0, 10) as $i) {
            $this->createPost($user->id);
        }
    }

    protected function createPost($user_id)
    {
        $post = Post::create([
            'user_id' => $user_id,
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
        ]);

        foreach (range(0, 10) as $j) {
            $this->createComment($user_id, $post->id);
        }
    }

    protected function createComment($user_id, $post_id)
    {
        $comment = Comment::create(
            [
                'user_id' => $user_id,
                'post_id' => $post_id,
                'commenter' => $this->faker->email,
                'comment' => $this->faker->paragraph,
            ]
        );
    }
}
