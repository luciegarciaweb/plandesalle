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
/**
 * Authentification
 */
Auth::routes();

//landing page
Route::get('/', 'HomeController@index')->name('home');

//EDITOR
Route::group(['namespace' => 'Editor'], function() {

    Route::get('/dessiner/api/trad', 'ApiController@trad');
    Route::get('/dessiner/api/userToken', 'ApiController@userToken');
    Route::get('/dessiner/api/getUser', 'ApiController@getUser');
    Route::get('/dessiner/api/getPlans', 'ApiController@getPlans');
    Route::get('/dessiner/api/loadPlan', 'ApiController@loadPlan');
    Route::get('/dessiner/api/savePlan', 'ApiController@savePlan');
    Route::get('/dessiner/api/loadObjet', 'ApiController@loadObjet');
    Route::get('/dessiner/api/loadObjets', 'ApiController@loadObjets');
    Route::get('/dessiner/api/majBDD', 'ApiController@majBDD');
    Route::get('/dessiner/api/plandesalle.aflib', 'ApiController@aflib');
    Route::get('/dessiner/api/getEvents', 'ApiController@getEvents');
    Route::get('/dessiner/api/placeSearch/{place}', 'ApiController@placeSearch')
        ->where('place','^([0-9A-Za-z\ ]+)?');

    // http://plandesalle.fr.loc/dessiner/objets/nm0wVl5lCgfRzB9y.png
    Route::get('/dessiner/objets/{cle}.png', 'ObjetController@image');

    // http://plandesalle.fr.loc/dessiner/salle-des-fetes-toulouse/salle
    Route::get('/dessiner/{place}/{room}', 'EditorController@editor')
        ->where('place','^([0-9A-Za-z\-]+)?')
        ->where('room','^([0-9A-Za-z\-]+)?');
});


//autocomplete
Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'SearchController@index'));
Route::get('searchajax',array('as'=>'searchajax','uses'=>'SearchController@autocomplete'));

//favorites
Route::get('/lieu/{place}/favorite', 'PlacesController@favorite')->where('place','^([0-9A-Za-z\-]+)?');

//show all places
Route::get('/places', 'PlacesController@index')->name('places');

//show users results from home>search engine
Route::get('/recherche/{query}', 'PlacesController@search')->name('recherche.resultats');

//city
Route::get('/{cityslug}-{cityzip}', 'PlacesController@showCity')
    ->where('cityslug','^([0-9a-z\-\ ]+)?') /* TODO VIRER ESPACE QD SLUG SERA OK EN BDD */
    ->where('cityzip','^([0-9A-B]+)?');
// department
Route::get('/{departmentslug}-D{departmentcode}', 'PlacesController@showDepartment')
    ->where('departmentslug','^([0-9a-z\-\ ]+)?') /* TODO VIRER ESPACE QD SLUG SERA OK EN BDD */
    ->where('departmentcode','^([0-9A-B]+)?');
Route::get('/lieu/{place}', 'PlacesController@show')->name('lieu.show');
Route::get('/lieu/{place}/{room}', 'PlacesController@showRoom')->name('lieu.show.room');
Route::get('/lieu/modifier/{place}', 'PlacesController@editAsWiki')->name('lieu.edit');
/*Route::post('/lieu/store', 'PlacesController@storeAsWiki')->name('lieu.store');*/

//show users results from home>regions links
Route::get('/region-{regionslug}', 'PlacesController@showRegion')->name('recherche.region');


//users can ask for quote
Route::get('/demande', 'QuotesController@createQuote')->name('demande.create');
Route::post('/demande/store', 'QuotesController@storeQuote')->name('demande.store');

//users can reference their places
Route::get('/referencement', 'ReferenceController@create')->name('referencement.create');
Route::post('/referencement/store', 'ReferenceController@store')->name('referencement.store');

//users can send message to admin
Route::get('/contact', 'ContactsController@create')->name('contacts.create');
Route::post('/contact/store', 'ContactsController@store')->name('contacts.store');

//upload pictures of places
Route::get('/multiuploads', 'UploadController@uploadForm');
Route::post('/multiuploads', 'UploadController@uploadSubmit');

//users can access to their profile
Route::prefix('parameters')->name('parameters.')->group(function () {
    Route::get('/', 'ParametersController@dashboard')->name('dashboard');
    Route::get('/compte', 'ParametersController@edit')->name('edit');
    Route::post('/compte', 'ParametersController@update')->name('update');
    Route::get('/mot-de-passe', 'ParametersController@passwordsEdit')->name('passwords.edit');
    Route::put('/mot-de-passe', 'ParametersController@passwordsUpdate')->name('passwords.update');
    Route::get('/favoris', 'ParametersController@favoris')->name('favoris');
});


/**
 * Routes pour l'administration.
 * Requier le rôle "admin" pour accéder à ces routes.
 * Prefix: /admin
 * Namespace: App\Http\Controllers\Admin;
 * Middleware: IsAdmin
 * Name:: admin
 */
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('IsAdmin')
    ->name('admin.')
    ->group(function () {

Route::get('/', 'DashboardController@index')->name('dashboard');

Route::get('/users/{user}/active', 'UsersController@setActive')->name('users.active');
Route::get('/users/{user}/admin', 'UsersController@setAdmin')->name('users.admin');

Route::get('/places/edit', 'PlacesController@edit')->name('places.edit');
Route::get('/places/create', 'PlacesController@create')->name('places.create');
Route::get('/places/store', 'PlacesController@store')->name('places.store');
Route::get('/places/{place}/active', 'PlacesController@setStatus')->name('places.active');

Route::post('/contacts/{contact}/answer', 'ContactsController@answer')->name('contacts.answer');


Route::resources([
        'users' => 'UsersController',
        'places' => 'PlacesController',
        'contacts' => 'ContactsController',
        'references' => 'ReferencesController',
    ]);
});