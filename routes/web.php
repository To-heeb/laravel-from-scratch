<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    

    $files = File::files(resource_path("posts"));

    // $posts = [];

    // foreach ($files as $file) {
        
    //     $document = YamlFrontMatter::parseFile($file);

    //     $posts[] = new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->slug);
    // }

    //<###############----This is a better way of doing what is above using array_map---#################>
    // $posts = array_map(function($file){
    //     $document = YamlFrontMatter::parseFile($file);
    //     return new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->slug);

    // }, $files);

     //<###############----This is a simila way of doing what is above using laravel collection with map---#################>
    //  $posts = collect($files)
    //  ->map(fn($file) =>  YamlFrontMatter::parseFile($file))
    //  ->map(function($document){
       
    //     return new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->slug);
    //  });

    //  ddd($posts);

    // $document = YamlFrontMatter::parseFile(
    //     resource_path('posts/myfourthpost.html')
    // );

    // ddd($document->date);

    //ddd((string)$posts[0]);
    //ddd($posts[0]->getContents);
    //ddd($posts);
    
    //return view('post', ['posts' => $posts]);

    return view('post', ['posts'=> Post::all()]);
});

Route::get('posts/{post}', function($slug){
//Find a post by its slug and pass it to a view called "post"
$post = Post::find($slug);

return view('posts',['post'=>$post]);


//     $path = __DIR__ ."/../resources/posts/{$slug}.html";

//     if (!file_exists($path)) {

//         //ddd('File does not exist');
//         //dd('File does not exist');
//         //abort(404);
//         //return $path;
//        return redirect('/');
//     }

// //    $post =  cache()->remember("posts.{$slug}", now()->addMinutes(20), function() use ($path){
// //        var_dump('file-get_contents');
// //         return file_get_contents($path);
// //     });

//     //php arrow function
//     $post =  cache()->remember("posts.{$slug}", now()->addMinutes(20), fn() => file_get_contents($path));

//     //$post = file_get_contents($path);

//     return view('posts', ['post' => $post] );
})->where('post', '[A-z_/-]+');
