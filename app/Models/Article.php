<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // public function getRouteKeyName(){
    //     return 'title'; // Article::where('title', $article)
    // }

    protected $fillable = ['title', 'excerpt', 'body'];

    // below makes all properties fillable by not guarding anything
    //protected $guarded = [];

    public function path(){
        return route('articles.show', $this);
    }

    public function author(){
        return $this->belongsto(User::class, 'user_id'); //Would use 'author_id' by default because of the method name, but you can override this in the second argument as well
    }

    // An article has many tags and a tag can have many articles
    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    
}
