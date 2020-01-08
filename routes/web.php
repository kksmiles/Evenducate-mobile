<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'EventsController@feed')->name('home');
Route::get('/test', function() {
    return view('test');
});

Route::get('/locations', 'LocationsController@index');
Route::get('/locations/create', 'LocationsController@create');
Route::get('/locations/{location}', 'LocationsController@show');
Route::post('locations', 'LocationsController@store');
Route::get('/locations/{location}/edit', 'LocationsController@edit');
Route::patch('/locations/{location}', 'LocationsController@update');
Route::delete('/locations/{location}', 'LocationsController@destroy');

Route::get('/tags', 'TagsController@index');
Route::get('/tags/create', 'TagsController@create');
Route::get('/tags/{tag}', 'TagsController@show');
Route::post('/tags', 'TagsController@store');
Route::get('/tags/{tag}/edit', 'TagsController@edit');
Route::patch('/tags/{tag}', 'TagsController@update');
Route::delete('/tags/{tag}', 'TagsController@destroy');

Route::get('/locations/{location}/events/create', 'EventsController@create');
Route::get('/events', 'EventsController@index');
Route::get('/events/{event}', 'EventsController@show');
Route::get('/events/{event}/getTicket', 'EventsController@getTicket');
Route::get('/events/{event}/upload', 'EventsController@uploadForm');
Route::post('/events/{event}/upload', 'EventsController@storeUpload');
Route::get('/events/{event}/upload/video', 'EventsController@getVideo');
Route::get('/events/{event}/upload/powerpoint', 'EventsController@getPowerpoint');
Route::post('/events', 'EventsController@store');
Route::get('/events/{event}/edit', 'EventsController@edit');
Route::patch('/events/{event}', 'EventsController@update');
Route::delete('/events/{event}', 'EventsController@destroy');
Route::get('/feed', 'EventsController@feed');
Route::get('/browse', 'EventsController@browse');

Route::get('/events/{event}/posts', 'PostsController@index');
Route::get('/events/{event}/posts/create', 'PostsController@create');
Route::get('/events/{event}/posts/{post}', 'PostsController@show');
Route::post('/events/{event}/posts', 'PostsController@store');
Route::get('/events/{event}/posts/{post}/edit', 'PostsController@edit');
Route::patch('/events/{event}/posts/{post}', 'PostsController@update');
Route::delete('/events/{event}/posts/{post}', 'PostsController@destroy');

Route::get('/posts/{post}/comments', 'CommentsController@index');
Route::get('/posts/{post}/comments/create', 'CommentsController@create');
Route::get('/posts/{post}/comments/{comment}', 'CommentsController@show');
Route::post('/posts/{post}/comments', 'CommentsController@store');
Route::get('/posts/{post}/comments/{comment}/edit', 'CommentsController@edit');
Route::patch('/posts/{post}/comments/{comment}', 'CommentsController@update');
Route::delete('/posts/{post}/comments/{comment}', 'CommentsController@destroy');


Route::post('/autocomplete/fetch/tags', 'AutocompleteController@fetchTags')->name('autocomplete.fetch.tags');
Route::post('/autocomplete/fetch/speakers', 'AutocompleteController@fetchSpeakers')->name('autocomplete.fetch.speakers');
Route::post('/autocomplete/fetch/locations', 'AutocompleteController@fetchLocations')->name('autocomplete.fetch.locations');
Route::post('/autocomplete/fetch/events', 'AutocompleteController@fetchEvents')->name('autocomplete.fetch.events');
Route::post('/autocomplete/fetch/sevents', 'AutocompleteController@fetchsEvents')->name('autocomplete.fetch.sevents');


Route::get('/profiles', 'ProfilesController@index');
Route::get('/profiles/create', 'ProfilesController@create');
Route::get('/profiles/{profile}', 'ProfilesController@show');
Route::get('/profiles/{profile}/interested_events', 'ProfilesController@userInterests');
Route::get('/profiles/{profile}/locations', 'ProfilesController@userLocations');
Route::get('/profiles/{profile}/events', 'ProfilesController@userEvents');
Route::get('/profiles/{profile}/goingEvents', 'ProfilesController@userGoingEvents');
Route::get('/profiles/{profile}/tags/create', 'ProfilesController@createTags');
Route::post('/profiles/{profile}/tags', 'ProfilesController@storeTags');
Route::post('profiles', 'ProfilesController@store');
Route::get('/profiles/{profile}/edit', 'ProfilesController@edit');
Route::patch('/profiles/{profile}', 'ProfilesController@update');
Route::delete('/profiles/{profile}', 'ProfilesController@destroy');

Route::get('/notifications', function(){
    return view('notification');
});

Route::post('/profile/fetch/followers', 'FollowsController@fetchFollowers')->name('follow.fetch.followers');
Route::post('/event/fetch/interest', 'EventsController@fetchInterests')->name('event.fetch.interest');
Route::post('/post/fetch/likes', 'LikesController@fetchLikes')->name('post.fetch.likes');
Route::post('/post/fetch/comments', 'CommentsController@fetchComments')->name('post.fetch.comments');

Route::get('/admins', function(){
    return view('admins.index');
});

Route::get('/events/{event}/manageupload', 'EventsController@manageUpload');
Route::post('/events/{event}/storeManageUpload', 'EventsController@storeManageUpload');
