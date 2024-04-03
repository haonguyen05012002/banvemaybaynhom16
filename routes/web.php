    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\FlightController;

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

    Route::get('/', 'App\Http\Controllers\HomeController@index');
    Route::get('/Home', 'App\Http\Controllers\HomeController@index');
    Route::get('/Login', 'App\Http\Controllers\HomeController@login');
    Route::get('/Home/Contact', 'App\Http\Controllers\HomeController@contact');
    Route::resource('/Home/Flight', 'App\Http\Controllers\FlightController');
    Route::post('/Home/Search', 'App\Http\Controllers\HomeController@search');
    Route::get('/Home/Flight/Detail', 'App\Http\Controllers\HomeController@detail');
    Route::get('/TTchuyenbay', 'App\Http\Controllers\HomeController@TTchuyenbay');
    Route::get('/Datchuyenbay', 'App\Http\Controllers\HomeController@Datchuyenbay');
      Route::get('/TTkhach', 'App\Http\Controllers\HomeController@TTkhach');
    //Route::get('/submit-form', [flightController::class, 'searchFlights'])->name('submit.form');
    //Route::post('/search-flights', [FlightController::class, 'searchFlights']);





