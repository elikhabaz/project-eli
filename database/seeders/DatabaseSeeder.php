<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cat;
use App\Models\Post;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Cat::truncate();
        Post::truncate();


        $user=User::factory()->create();
        $user=User::factory()->create();

        $personal=Cat::create([
            'name'=>'person',
            'slug'=>'person'

        ]);

        $family=Cat::create([
            'name'=>'family',
            'slug'=>'family'

        ]);

        $work=Cat::create([
            'name'=>'work',
            'slug'=>'work'

        ]);

        Post::create([
            
            'user_id'=>$user->id,
            'cat_id'=>$personal->id,
            'title'=>'first post',
            'slug'=>'first_post',
            'excerpt'=>'Lorem ipsum dolor sit amet consectetur',
            'body'=>'Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Perspiciatis recusandae,
             praesentium cum nostrum illum quasi, id
              cupiditate voluptatem odio aliquam impedit
               molestiae temporibus sit modi suscipit sint 
               atque expedita explicabo',
               'date'=>'2023'

        ]);


        Post::create([
            'user_id'=>$user->id,
            'cat_id'=>$family->id,
            'title'=>'second post',
            'slug'=>'second_post',
            'excerpt'=>'Lorem ipsum dolor sit amet consectetur',
            'body'=>'Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Perspiciatis recusandae,
             praesentium cum nostrum illum quasi, id
              cupiditate voluptatem odio aliquam impedit
               molestiae temporibus sit modi suscipit sint 
               atque expedita explicabo',
               'date'=>'2023'

        ]);

    }
}
