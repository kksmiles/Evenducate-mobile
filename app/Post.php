<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    public function postImage()
    {
        $imagePath = ($this->img_path) ?  $this->img_path : "";
        return '/storage/' . $imagePath;
    }
    public function Event()
    {
        return $this->belongsTo(Event::class);
    }
    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
