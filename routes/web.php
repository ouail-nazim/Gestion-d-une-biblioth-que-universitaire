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
//----------------------------------------------------------------------
Auth::routes();
//Route::get('/register', function () {
//    return view('welcome');
//});
//----------------------------------------------------------------------
//les route sons autantification
Route::get('/', 'userLogin@index');
Route::get('/UserLogin', 'userLogin@UserLogin');
Route::post('/abonner','userLogin@Login');
Route::get('/about', 'userLogin@About');
Route::get('/getlivre', 'userLogin@getlivre');
Route::get('/filtre', 'userLogin@filtre');
//----------------------------------------------------------------------
//user auth
Route::get('/userhome', 'UserController@UserHome');
Route::get('/logoutuser', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('/changepassword','UserController@changepassword');
Route::get('/USERgetlivre', 'UserController@getlivre');
Route::get('/USERfiltre', 'UserController@filtre');
Route::get('/profile/{id}', 'UserController@profile');
Route::get('/reserve_livre/{code}', 'UserController@reserve_livre');
Route::get('/anuller_reserve/{id}', 'UserController@anuller_reserve');
//----------------------------------------------------------------------
//admin routes
//----------------------------------------------------------------------
//homeadmin
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
Route::get('/Catégori','DocumentControler@Catégori');
Route::post('/addcategori','DocumentControler@addcategori');

//Abonner
Route::get('/See_all', 'AbonnerController@index');
Route::get('/searchAbonner','AbonnerController@searchAbonner');
Route::get('/addAbonner','AbonnerController@create');
Route::post('/addAbonner','AbonnerController@store');
Route::get('/gotoeditAbonner','AbonnerController@gotoeditAbonner');
Route::post('/editAbonner', 'AbonnerController@editAbonner')->name('del');
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
Route::get('/getpenliser', 'AbonnerController@getpenliser');
Route::get('/liste_reservation','AbonnerController@liste_reservation');
Route::get('/supprimer_res/{id}','AbonnerController@supprimer_res');
//preté
Route::get('/creatadd','PretController@creat_add');
Route::post('/savepret','PretController@savepret');
Route::get('/topdf/{id}','PretController@pdf');
Route::get('/renouvler/{id}','PretController@renouvler');
Route::get('/creatback','PretController@creat_back');
Route::post('/saveback','PretController@save_back');


