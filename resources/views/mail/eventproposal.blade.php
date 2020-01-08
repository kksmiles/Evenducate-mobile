@component('mail::message')

# New Event Proposal : {{ $event->title }}

{{ \App\User::find($event->organizer_id)->name }} has submitted an event proposal to make an event at your location.

@component('mail::button', ['url' => "/events/$event->id" ])
Review Proposal
@endcomponent

Thanks,<br>
Evenk - Team
@endcomponent
