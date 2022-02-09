<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

use function PHPUnit\Framework\throwException;

class Post{

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug){

        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;

    }

    public static function find($slug){
        
        // if (!file_exists($path =  resource_path("posts/{$slug}.html"))) {

        //     throw new ModelNotFoundException();
        // }

        // return  cache()->remember("posts.{$slug}", now()->addMinutes(20), fn() => file_get_contents($path));
        
        //############# Have been done in a better way #############
        // of all the blog post find the one with a slug that matches the one that was requested
        return static::all()->firstWhere('slug', $slug);

        

    }

    public static function findOrFail($slug){
        $post = static::find($slug);

        if (!$post) {
            throw new ModelNotFoundException();
        };

    }

    public static function all(){
        $files = File::files(resource_path("posts"));

    //    return array_map(function($file){
    //         return $file->getContents();
    //     }, $files);

       // return array_map(fn($file) =>  $file->getContents(), $files);

       //#############Have been done in a better way#############
       return cache()->rememberForever('posts.all', function () {
        return collect(File::files(resource_path("posts")))
        ->map(fn($file) =>  YamlFrontMatter::parseFile($file))
        ->map(function($document){
          
           return new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->slug);
        })
        ->sortByDesc('date');
       });
    }
}