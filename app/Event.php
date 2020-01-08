<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];
    public function eventImage()
    {
        $imagePath = ($this->img_path) ?  $this->img_path : "uploads/events/event_default.png";
        return '/storage/' . $imagePath;
    }
    public function video()
    {
        $videoPath = ($this->video_upload) ?  $this->video_upload : "uploads/videos/video_default.png";
        return '/storage/' . $videoPath;
    }
    public function powerpoint()
    {
        $powerpointPath = ($this->powerpoint_upload) ?  $this->powerpoint_upload : "uploads/powerpoints/powerpoint_default.ppt";
        return '/storage/' . $powerpointPath;
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'event_tag');
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_event', 'event_id', 'user_id');
    }
    public function interestedUsers()
    {
        return $this->belongsToMany(User::class, 'interests', 'interested_event_id', 'user_id');
    }
    public function speakers()
    {
        return $this->belongsToMany(User::class, 'event_speaker', 'event_id', 'speaker_id');
    }
    public function organizer()
    {
        return $this->belongsTo(User::class);

    }
}
