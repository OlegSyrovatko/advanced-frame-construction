<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\ContactController;

Route::get('/ua', function () {session(['my_locale' => 'ua']);App::setLocale('ua'); return view('index'); });
Route::get('/en', function () {session(['my_locale' => 'en']);App::setLocale('en'); return view('index'); });

Route::get('about/ua', function () {session(['my_locale' => 'ua']);App::setLocale('ua'); return view('about'); });
Route::get('about/en', function () {session(['my_locale' => 'en']);App::setLocale('en'); return view('about'); });

Route::get('contacts/ua', function () {session(['my_locale' => 'ua']);App::setLocale('ua'); return view('contacts'); });
Route::get('contacts/en', function () {session(['my_locale' => 'en']);App::setLocale('en'); return view('contacts'); });

Route::get('advantages/ua', function () {session(['my_locale' => 'ua']);App::setLocale('ua'); return view('advantages'); });
Route::get('advantages/en', function () {session(['my_locale' => 'en']);App::setLocale('en'); return view('advantages'); });

Route::get('projects/{category?}/{page?}', function ($category = 'all', $page = 1) {
    return view('projects')->with(['dir' => $category, 'page' => $page]);
});



Route::get('admafc', function () {return view('adm'); });
Route::get('contact-list', function () {return view('contact-list'); });
Route::get('projects-adm/{category?}/{page?}', function ($category = 'all', $page = 1) {
    return view('projects-adm')->with(['dir' => $category, 'page' => $page]);
});

Route::group(['middleware'=>'language'],function ()
{
    Route::get('/', function () {
        return view('index');
    });
    Route::get('/about', function () {
        return view('about');
    });
    Route::get('/advantages', function () {
        return view('advantages');
    });
    Route::get('/projects', function () {
        return view('projects')->with(['dir' =>  'all', 'page' => 1]);
    });
    Route::get('/contacts', function () {
        return view('contacts');
    });

    Route::post('subscribe', 'App\Http\Controllers\ContactController@subscribe');
    Route::post('delete_contact', 'App\Http\Controllers\ContactController@delete_contact');
    Route::post('projects-adm', 'App\Http\Controllers\ProjectController@create');
    Route::post('projects-adm-delete', 'App\Http\Controllers\ProjectController@delete');
    Route::post('projects-adm-edit', 'App\Http\Controllers\ProjectController@update');
    // Route::post('projects', 'App\Http\Controllers\ProjectController@projects');

});


/*
Route::get('/catalogue', function () {
    return view('catalogue');
});

Route::get('/question', function () {
    return view('question');
});

*/
