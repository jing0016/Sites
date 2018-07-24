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

use Illuminate\Http\Request;
use App\Link;

Route::get('/', function () {

    $links = \App\Link::all();

    return view('welcome',['links' => $links]);
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/', 'HomeController@index');

Route::get('/submit',function (){
   return view('submit');
});

Route::post('/submit',function (Request $request){
   $data = $request->validate([
      'title' => 'required|max:255',
      'url' => 'required|url|max:255',
      'description' => 'required|max:255',
   ]);

   $link = tap(new App\Link($data)) ->save();

   return redirect('/');
});

Route::get('/link/{link}',function (Link $link){
    if(Auth::check())
    {
        return view('edit',['link' => $link]);
    }
    else
    {
        return redirect('/');
    }

});

Route::post('/link/{link}',function (Request $request,Link $link){
    if(isset($_POST['delete']))
    {
        $link->delete();
        return redirect('/');
    }
    else
    {
        $link->title = $request->title;
        $link->url = $request->url;
        $link->description = $request->description;
        $link->save();
        return redirect('/');
    }
});


