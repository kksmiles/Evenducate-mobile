<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = ['id'];
    public function profileImage()
    {
        $imagePath = ($this->img_url) ?  $this->img_url : "uploads/profiles/user_default.png";
        return '/storage/' . $imagePath;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function followers()
    {
        return $this->hasMany('App\Follow');
    }
}
