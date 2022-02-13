<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;  
    //Eloquent automatically does Post::factory()

    protected $guarded = [];
    //protected $fillable = ['title', 'excerpt', 'body', 'category_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category(){
        //Eloquent relationships
        //hasOne, hasMany, belongsTo, belongsToMany

        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
