<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->profile()->create([
                'title' => $user->name,
            ]);
        });
    }

    public function locations()
    {
        return $this->hasMany(Location::class, 'owner_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'user_tag');
    }
    public function events()
    {
        return $this->belongsToMany(Event::class, 'user_event', 'user_id', 'event_id');
    }
    public function interestedEvents()
    {
        return $this->belongsToMany(Event::class, 'interests', 'user_id', 'interested_event_id');
    }
    public function speakingEvents()
    {
        return $this->belongsToMany(Event::class, 'event_speaker', 'speaker_id', 'event_id');
    }
    public function organizingEvents()
    {
        return $this->hasMany(Event::class, 'organizer_id');
    }
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function follows()
    {
        return $this->hasMany('App\Follow');
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

}
