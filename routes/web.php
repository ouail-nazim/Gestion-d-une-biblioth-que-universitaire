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
Auth::routes();

//simple user
Route::get('/', function () {
    return view('user.index');
});
Route::get('/ho','UserController@home');
Route::get('/gest','UserController@gest');



//Route::get('/register', function () {
//    return view('welcome');
//});

//home
Route::get('/home', 'HomeController@index');

//document
Route::get('/indexdoc', 'DocumentControler@index')->name('index.doc');
Route::get('/create', 'DocumentControler@create');
Route::post('/addlivre', 'DocumentControler@store');
Route::get('/searchdoc','DocumentControler@searchdoc');
Route::get('/detailebook/{code}','DocumentControler@show')->name('detaile.book');
Route::get('/explus/{code}','DocumentControler@explus');
Route::get('/exmoin/{code}','DocumentControler@exmoin');
Route::post('/serchedelet', 'DocumentControler@beforDelete')->name('serche.for.delet');
Route::get('/destroy/{code}','DocumentControler@destroy');
Route::post('/sercheedit', 'DocumentControler@beforEdit')->name('serche.for.edit');
Route::get('/edit/{code}','DocumentControler@edit');
Route::post('/updateLivre/{code}','DocumentControler@updateLivre');
Route::post('/updateMemoire/{code}','DocumentControler@updateMemoire');

//Abonner
Route::get('/See_all', 'AbonnerController@index');
Route::get('/searchAbonner','AbonnerController@searchAbonner');
Route::get('/addAbonner','AbonnerController@create');
Route::post('/addAbonner','AbonnerController@store');
Route::get('/gotoeditAbonner','AbonnerController@gotoeditAbonner');
Route::get('/editAbonner', 'AbonnerController@editAbonner')->name('del');
Route::get('/editAbonner2/{id}', 'AbonnerController@editAbonner2')->name('del');
Route::post('/edit/{id}', 'AbonnerController@update')->name('edting');
Route::get('/gotodeletAbonner','AbonnerController@gotodeletAbonner');
Route::get('/deletAbonner', 'AbonnerController@deletAbonner')->name('del');
Route::get('/delete/{id}', 'AbonnerController@delete')->name('edting');
Route::get('/gotopinaliserAbonner','AbonnerController@gotopinaliserAbonner');
Route::get('/pinaliserAbonner', 'AbonnerController@pinaliserAbonner');
Route::get('/pinaliser/{id}', 'AbonnerController@pinaliser');
Route::get('/Depinaliser/{id}', 'AbonnerController@Depinaliser');
Route::get('/gotoprivligerAbonner','AbonnerController@gotoprivligerAbonner');
Route::get('/privligerAbonner', 'AbonnerController@privligerAbonner');
Route::get('/privliger/{id}', 'AbonnerController@privliger');
Route::get('/more/{id}', 'AbonnerController@more');

//preté
Route::get('/creatadd','PretController@creat_add');
Route::post('/savepret','PretController@savepret');
Route::get('/topdf/{id}','PretController@pdf');
Route::get('/renouvler/{id}','PretController@renouvler');
Route::get('/creatback','PretController@creat_back');
Route::post('/saveback','PretController@save_back');


use Carbon\Carbon;
Route::get('/c', function () {

    //$now = Carbon::now();
    //$now = new Carbon();
    //dd($now);

    //$today = Carbon::today();
    //dd($today);

    //$newYear = new Carbon('first day of January 2016');
    //dd($newYear);

    //$now = Carbon::now();
    //$trialExpires = $now->addDays(7);
    //dd($trialExpires);


//    $dt = Carbon::create(2012, 1, 31, 0);
//    echo $dt->toDateTimeString();


    $current = Carbon::now();
    $dt      = Carbon::now();

    $dt = $dt->subHours(6);
    echo $dt->diffInHours($current);         // -6
    echo $current->diffInHours($dt);         // 6

    $future = $current->addMonth();
    $past   = $current->subMonths(2);
    echo $current->diffInDays($future);      // 31
    echo $current->diffInDays($past);        // -62
});


