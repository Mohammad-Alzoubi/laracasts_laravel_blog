<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate(); // because don't repeat data in database
        Post::truncate();
        Category::truncate();


         $user_id = User::factory()->create([
             'name' => 'Mohammad',
             'username' => 'mohammad-Alzoubi'
         ]);

         Post::factory(15)->create([
             'user_id' => $user_id
         ]);




//         $work = Category::create.blade.php([
//             'name'=>'Work',
//             'slug'=>'work'
//         ]);
//
//         $personal = Category::create.blade.php([
//             'name'=>'Personal',
//             'slug'=>'personal'
//         ]);
//
//         $hobbies = Category::create.blade.php([
//             'name'=>'Hobbies',
//             'slug'=>'hobbies'
//         ]);
//
//
//         $first_post  = Post::create.blade.php([
//             'user_id' => 1,
//             'category_id' => $hobbies->id,
//             'title' => $title = 'this is the first post',
//             'slug' => Str::slug($title),
//             'excerpt' => '<p>Lorem ipsum dolor sit amet</p>',
//             'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, deserunt.</p>',
//         ]);
//         $second_post = Post::create.blade.php([
//             'user_id' => 1,
//             'category_id' => $hobbies->id,
//             'title' => $title = 'this is the second post',
//             'slug' => Str::slug($title),
//             'excerpt' => '<p>Lorem ipsum dolor sit amet</p>',
//             'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, deserunt.</p>',
//         ]);
//         $third_post  = Post::create.blade.php([
//             'user_id' => 1,
//             'category_id' => $work->id,
//             'title' => $title = 'this is the third post',
//             'slug' => Str::slug($title),
//             'excerpt' => '<p>Lorem ipsum dolor sit amet</p>',
//             'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, deserunt.</p>',
//         ]);

    }
}
