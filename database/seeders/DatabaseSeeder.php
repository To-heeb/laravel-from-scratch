<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

       Category::truncate();
       User::truncate();
       Post::truncate();

       $user = User::factory()->create();

      $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
       ]);

       $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
       ]);

       $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
       ]);
       
       Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-family-post',
            'excerpt' => '<p>Lorem ipsum dolor sit amet</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sollicitudin scelerisque felis id malesuada. Aenean tincidunt et augue vel rhoncus. Ut eget libero in enim gravida accumsan. Phasellus eu lorem eget purus vestibulum eleifend. Phasellus lobortis euismod est et vehicula. Maecenas sem tortor, consectetur nec sem gravida, ultrices gravida erat. Phasellus hendrerit magna non eleifend accumsan. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam consectetur, eros nec scelerisque hendrerit, risus magna commodo sapien, non sagittis tortor nisl vel justo. Nunc vitae justo non nulla sagittis rutrum ac non nunc. Aliquam euismod mauris in tincidunt rhoncus. Sed quis euismod purus. Maecenas sodales lobortis dolor vitae tincidunt. Etiam hendrerit metus a turpis semper rhoncus non id tortor. Vestibulum sollicitudin, purus ut lobortis auctor, lectus dui egestas dui, vitae luctus leo magna quis tellus.</p>'
       ]);

       Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => '<p>Lorem ipsum dolor sit amet</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sollicitudin scelerisque felis id malesuada. Aenean tincidunt et augue vel rhoncus. Ut eget libero in enim gravida accumsan. Phasellus eu lorem eget purus vestibulum eleifend. Phasellus lobortis euismod est et vehicula. Maecenas sem tortor, consectetur nec sem gravida, ultrices gravida erat. Phasellus hendrerit magna non eleifend accumsan. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam consectetur, eros nec scelerisque hendrerit, risus magna commodo sapien, non sagittis tortor nisl vel justo. Nunc vitae justo non nulla sagittis rutrum ac non nunc. Aliquam euismod mauris in tincidunt rhoncus. Sed quis euismod purus. Maecenas sodales lobortis dolor vitae tincidunt. Etiam hendrerit metus a turpis semper rhoncus non id tortor. Vestibulum sollicitudin, purus ut lobortis auctor, lectus dui egestas dui, vitae luctus leo magna quis tellus.</p>'
       ]);

       Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My Personal Post',
            'slug' => 'my-personal-post',
            'excerpt' => '<p>Lorem ipsum dolor sit amet</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sollicitudin scelerisque felis id malesuada. Aenean tincidunt et augue vel rhoncus. Ut eget libero in enim gravida accumsan. Phasellus eu lorem eget purus vestibulum eleifend. Phasellus lobortis euismod est et vehicula. Maecenas sem tortor, consectetur nec sem gravida, ultrices gravida erat. Phasellus hendrerit magna non eleifend accumsan. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam consectetur, eros nec scelerisque hendrerit, risus magna commodo sapien, non sagittis tortor nisl vel justo. Nunc vitae justo non nulla sagittis rutrum ac non nunc. Aliquam euismod mauris in tincidunt rhoncus. Sed quis euismod purus. Maecenas sodales lobortis dolor vitae tincidunt. Etiam hendrerit metus a turpis semper rhoncus non id tortor. Vestibulum sollicitudin, purus ut lobortis auctor, lectus dui egestas dui, vitae luctus leo magna quis tellus.</p>'
       ]);
    }
}
