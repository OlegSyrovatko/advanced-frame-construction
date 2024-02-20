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

Route::get('projects/ua', function () {session(['my_locale' => 'ua']);App::setLocale('ua'); return view('projects')->with('dir', 'all'); });
Route::get('projects/en', function () {session(['my_locale' => 'en']);App::setLocale('en'); return view('projects')->with('dir', 'all'); });
Route::get('projects/buildings', function () {return view('projects')->with('dir', 'buildings');});
Route::get('projects/relax', function () {return view('projects')->with('dir', 'relax');});
Route::get('projects/furniture', function () {return view('projects')->with('dir', 'furniture');});
Route::get('projects/gardens', function () {return view('projects')->with('dir', 'gardens');});
Route::get('projects/cabins', function () {return view('projects')->with('dir', 'cabins');});
Route::get('projects/playgrounds', function () {return view('projects')->with('dir', 'playgrounds');});

Route::get('admafc', function () {return view('adm'); });
Route::get('contact-list', function () {return view('contact-list'); });
Route::get('projects-adm', function () {return view('projects-adm')->with('dir', 'all'); });
Route::get('projects-adm/buildings', function () {return view('projects-adm')->with('dir', 'buildings');});
Route::get('projects-adm/relax', function () {return view('projects-adm')->with('dir', 'relax');});
Route::get('projects-adm/furniture', function () {return view('projects-adm')->with('dir', 'furniture');});
Route::get('projects-adm/gardens', function () {return view('projects-adm')->with('dir', 'gardens');});
Route::get('projects-adm/cabins', function () {return view('projects-adm')->with('dir', 'cabins');});
Route::get('projects-adm/playgrounds', function () {return view('projects-adm')->with('dir', 'playgrounds');});


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
        return view('projects')->with('dir', 'all');
    });
    Route::get('/contacts', function () {
        return view('contacts');
    });

    Route::post('subscribe', 'App\Http\Controllers\ContactController@subscribe');
    Route::post('delete_contact', 'App\Http\Controllers\ContactController@delete_contact');
    Route::post('projects-adm', 'App\Http\Controllers\ProjectController@create');

});


/*
Route::get('/catalogue', function () {
    return view('catalogue');
});

Route::get('/question', function () {
    return view('question');
});

*/
