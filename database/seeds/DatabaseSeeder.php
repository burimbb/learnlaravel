<?php

use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User')->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123')
        ]);
        
        // $this->call(UsersTableSeeder::class);
        factory('App\User', 10)->create();
        factory('App\Post', 50)->create();
        factory('App\Tag', 10)->create();

        $posts = Post::all()->pluck('id');
        $tags = Tag::all()->pluck('id');

        foreach(range(1, 50) as $index){
            DB::table('taggables')->insert([
                'tag_id' => $tags[rand(0,9)],
                'taggable_id' => $posts[rand(0,49)],
                'taggable_type' => 'App\Post'
            ]);
        }
    }
}
