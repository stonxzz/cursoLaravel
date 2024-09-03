<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::truncate();
        
        for ($i=0; $i < 20; $i++) { 
            $c = Category::inRandomOrder()->first();
            $title = Str::random(20);
            Post::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae aliquam rerum molestiae ut. Accusantium quas doloribus placeat natus pariatur? Accusantium quasi vel voluptatibus odio dicta quos sint omnis dolorem necessitatibus?</p>",
                'category_id' => $c->id,
                'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae aliquam rerum molestiae ut. Accusantium quas",
                'posted' => rand(0, 1) ? 'yes' : 'not'
            ]);
        }
    }
}
