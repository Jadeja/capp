<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');

    Route::get('/tasks', 'TaskController@index');
    Route::post('/task', 'TaskController@store');
    Route::delete('/task/{task}', 'TaskController@destroy');

    Route::get('/contacts', 'ContactsController@index');
    Route::post('/contact', 'ContactsController@store');
    Route::delete('/contact/{contact}', 'ContactsController@destroy');
    
    Route::resource('post','PostController');

    Route::auth();

});

Use App\Task;
Use App\User;
Use App\Post;
Use App\Photo;
Use App\Tag;
Use App\Country;

/*Route::get('/create',function(){
    $result = Task::create(['user_id' => 2,'name' => 'test']);
    return $result;
});

Route::get('/update',function(){
    $result = Task::where('user_id','0')->update(['user_id' => 1]);
    return $result;
});


Route::get('/delete',function(){
     $rs = Task::find(12);
     $rs->delete();
   
   //return Task::destroy([2]);

});


// tofetch data withTrashed and onlyTrashed
Route::get('/readDeleted',function(){
    //$rs = Task::withTrashed()->where('user_id',2)->get();
    $rs = Task::onlyTrashed()->where('user_id',2)->get();
    return $rs;
});



// TO RESTORE DATA
Route::get('/restore',function(){
    $rs = Task::withTrashed()->where('user_id',2)->restore();
    return $rs;
});



// Delete Permanetly 
Route::get('/deleteParmanetly',function(){
    $rs = Task::onlyTrashed()->where('user_id',2)->forceDelete();
    return $rs;
});


//fetch data using hasOne function
Route::get('/hasOne/{id}/task',function($id){
    return User::find($id)->task;
});

Route::get('task/{id}/user',function($id){
    return Task::find($id)->user->name;
});

//fetch data using hasOne function
Route::get('/hasOne/{id}/tasks',function($id){
    return User::find($id)->task;
});


//polymorphic 
Route::get('polymorphic/{id}',function($id){

    //$rs = User::find($id);
    $rs = Post::find($id);

    foreach ($rs->photos as $photo) {
        return $photo;
    }
});


// get list post through country_id =>  user_id => post
Route::get('manyThrough',function(){
    $rs = Country::find(3);
    return $rs->tasks;
});

//polymorphic inverse
Route::get('testp/{id}',function($id){
    $rs = Photo::findOrFail($id);    
    return $rs->imageable;
});


Route::get('polymany2many/{id}',function($id){
    $rs = Post::find($id);
    return $rs->tags;
});


//poly many 2 many inverse 
Route::get('polymany2manyinverse/{id}',function($id){
    $rs = Tag::find($id);    
    return $rs->videos;
});
*/



use Carbon\Carbon;
Route::get('/dates',function(){

    $date = new DateTime('+1 week');
    echo $date->format('d-m-y');
    
    echo "<br>";
    echo Carbon::now()->addDays(5)->diffForHumans();
    echo "<br>";
    echo Carbon::now()->subMonths(5)->diffForHumans();
    echo "<br>";
    echo Carbon::now()->yesterday();



});


Route::get('/accessors',function(){
    $user = User::find(1);
    echo $user->name;
});


Route::get('/setdata',function(){
    $user = User::find(1);
    $user->name = "mutator test";
    $user->save();
});



