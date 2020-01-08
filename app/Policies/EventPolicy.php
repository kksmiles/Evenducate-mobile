<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Event;
class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function delete(User $user, Event $event)
    {
        return $event->organizer_id == $user->id;

    }
    public function update(User $user, Event $event)
    {
        return $event->organizer_id == $user->id;
    }


}
