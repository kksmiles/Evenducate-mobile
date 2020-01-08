<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name', 'description', 'open_time', 'close_time', 'days', 'address', 'city', 'state', 'country', 'lat', 'lng', 'img_path', 'owner_id', 'place_name', 'place_address', 'phone'
    ];

    public function locationImage()
    {
        $imagePath = ($this->img_path) ?  $this->img_path : "uploads/locations/location_default.png";
        return '/storage/' . $imagePath;
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
