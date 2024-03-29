<?php

use App\Http\Controllers\SiteEventController;
use App\Http\Controllers\SiteOnlineController;
use App\Http\Controllers\ProtocolController;
use App\Http\Controllers\LiveRezultsController;
use App\Http\Controllers\RezultController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminCmsRegisterUsers;
use App\Http\Controllers\CpController\CPclassController;
use App\Http\Controllers\CpController\CPcompetitionController;
use App\Http\Controllers\CpController\CPpointClassController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\TelegramController2;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\New_EventController;
use App\Http\Controllers\New_TelegramBotController;
use Illuminate\Support\Facades\Route;

//Роути для входуddddd
Route::get('/admin/registerl', function () {
    return view('site.register');
});
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google');
Route::get('/admin/google', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/redirect/', [SiteEventController::class, 'redirect_register'])->name('redirect_register');
//Роути для входу

//Тестові роути
Route::get('/anna', [RezultController::class, 'anna'])->name('anna');
Route::get('/test/{id}', [New_EventController::class, 'people_all_event'])->name('test');
//Тестові роути

//Реєстрація на змагання
Route::get('/autocomplete', [TestController::class, 'autocomplete'])->name('autocomplete');
Route::get('/autocomplete2', [TestController::class, 'autocomplete2'])->name('autocomplete2');
Route::get('/autocomplete3', [TestController::class, 'autocomplete3'])->name('autocomplete3');
Route::get('/admin/register/edit/{id}', 'AdminRegisterController@getAdd')->name('homes');
//Реєстрація на змагання

//Сторніки сайту
Route::get('/', [SiteEventController::class, 'index'])->name('event');
Route::get('/event', [SiteEventController::class, 'index'])->name('event');
Route::post('/event', [SiteEventController::class, 'index'])->name('event');
Route::get('/event/{id}', [SiteEventController::class, 'show'])->name('event_show');
Route::get('/event/register/{registerid}', [SiteEventController::class, 'registerevent'])->name('register');
Route::resource('/protocols', ProtocolController::class);
Route::get('/export/clubs.xml', [ProtocolController::class, 'export'])->name('register_proces');
Route::get('atlet/{name}', [RezultController::class, 'atlet'])->name('atlet');
//Сторніки сайту

// Route::get('/admin/register/add', [AdminRegisterController::class, 'getAdd'])->name('register_proces');

//Телеграм
// Route::get('/admin/telegram/{event_id}/{pass}/{time}/{stat}', [TelegramController::class, 'search2'])->name('telegram_search');
// Route::post('/telegram/telegram', [TelegramController2::class, 'telegram'])->name('telegram');
//Телеграм
// Route::get('/telegram/set-webhook', [New_TelegramBotController::class, 'setWebhook']);

// Route::post('/send-message',  [TelegramController::class, 'telegram'])->name('telegram_send-message');

Route::prefix('livess')->group(function () {
    Route::get('/', [LiveRezultsController::class, 'all_event'])->name('live');
    Route::get('/show/{id}', [LiveRezultsController::class, 'show_event'])->name('live_show');
    Route::get('/online/{id}/{cls}', [LiveRezultsController::class, 'live'])->name('live_online');
    Route::get('/rezult/{id}', [RezultController::class, 'rezult'])->name('rezult');
    // Route::get('/rezult2/{id}', [New_EventController::class, 'rezult'])->name('rezult');
    Route::get('/start/{id}', [RezultController::class, 'start'])->name('start');
    Route::get('/start_cloks/{id}', [RezultController::class, 'start_cloks'])->name('start_cloks');
    Route::get('/split/{id}', [RezultController::class, 'split'])->name('split');
    Route::get('/comand/{id}', [RezultController::class, 'comand'])->name('comand');
    Route::get('/reley/{id}', [RezultController::class, 'reley'])->name('reley');
    Route::get('/erorrs', [RezultController::class, 'erorrs'])->name('erorrs');
    Route::get('atlet/{name}', [RezultController::class, 'atlet'])->name('atlet');
    Route::get('/search_atlet', [RezultController::class, 'search_atlet'])->name('search_atlet');
    Route::post('/search_atlet', [RezultController::class, 'search_atlet'])->name('search_atlet2');

    
    Route::prefix('/rezult')->group(function () {
        Route::get('/protocol_start/{id}', [New_EventController::class, 'protocol_start'])->name('protocol_start');
        Route::get('/protocol_test/{id}', [New_EventController::class, 'protocol_people'])->name('protocol_test');////////////
        Route::get('/protocol_finish/{id}', [New_EventController::class, 'protocol_finish'])->name('protocol_finish');
        Route::get('/protocol_finish_summa/{id}', [New_EventController::class, 'protocol_finish_summa'])->name('protocol_finish_summa');
        Route::get('/protocol_finish_test/{id}', [New_EventController::class, 'protocol_finish_test'])->name('protocol_finish_test');
        Route::get('/protocol_comand/{id}', [New_EventController::class, 'protocol_comand'])->name('protocol_comand');
        Route::get('/protocol_raley/{id}', [New_EventController::class, 'protocol_raley'])->name('protocol_raley');
        Route::get('/protocol_comand_big/{id}', [RezultController::class, 'protocol_comand_big'])->name('protocol_comand_big');
        Route::get('/protocol_summa/{id}', [RezultController::class, 'protocol_summa'])->name('protocol_summa');
    });
    // Route::get('/rezult/{id}', [SiteOnlineController::class, 'showrezult'])->name('online_rezult');
    // Route::get('/rezult_com/{id}', [SiteOnlineController::class, 'comrezult'])->name('online_rezult_com');
    // Route::get('/startlist/{id}', [SiteOnlineController::class, 'showstartlist'])->name('online_showstartlist');
    // Route::get('/split/{id}', [SiteOnlineController::class, 'showsplit'])->name('online_showsplit');   
});

Route::prefix('online')->group(function () {
    Route::get('/', [SiteOnlineController::class, 'indexonline'])->name('online');
    Route::get('/rezult/{id}', [SiteOnlineController::class, 'showrezult'])->name('online_rezult');
    Route::get('/rezult_com/{id}', [SiteOnlineController::class, 'comrezult'])->name('online_rezult_com');
    Route::get('/startlist/{id}', [SiteOnlineController::class, 'showstartlist'])->name('online_showstartlist');
    Route::get('/split/{id}', [SiteOnlineController::class, 'showsplit'])->name('online_showsplit');
});

Route::prefix('cp')->group(function () {
    Route::resource('/c-pcompetitions', CPcompetitionController::class);
    Route::resource('c-ppoint-classes', CPpointClassController::class);
    Route::resource('c-pclasses', CPclassController::class);
    // Route::resource('/', [CPcompetitionsController::class, 'indexonline'])->name('cp_competition');
    // Route::resource('/', CPcompetitionsController::class);
    
});


Route::get('/lives/{cid}/{cls}', [SiteOnlineController::class, 'live'])->name('live');
Route::get('/calendar2', [SiteEventController::class,'calendar'])->name('calendar2'); //Календар




Route::get('/online/showpeople/{name}', [SiteOnlineController::class,'showpeople'])->name('showpeople');
Route::get('/atlets', 'SiteOnlineController@atlets')->name('atlets');




Route::get('/event/registers/pexportmeos/{id}', [AdminRegisterController::class,'exportmeos'])->name('exportmeos');
Route::get('/event/registers/exportmeos/{id}', [AdminRegisterController::class,'pexportmeos'])->name('pexportmeos');
Route::post('/admin/registers', [AdminCmsRegisterUsers::class,'add'])->name('homes');

Route::get('/about', 'AdminPageController@index_page')->name('about');





Route::get('/online/showrezcom/{id}', [SiteOnlineController::class, 'showrezcom'])->name('showrezcom');

Route::get('/rogeining/{id}', 'SiteOnlineController@rogeining')->name('rogeining');
Route::post('someurl', 'CSVController@someMethod');
Route::get('/live/{id}', 'liveRezultsController@show')->name('live');

Route::resource('rezonline', 'RezOnlineControoler');
Route::get('/rezonline/create/{id}', 'RezOnlineControoler@create')->name('create');
Route::get('/rezonline/edit/{cid}/{id}', 'RezOnlineControoler@edit')->name('edit');
Route::get('/rezonline/delet/{cid}/{id}', 'RezOnlineControoler@destroy')->name('delet');


Route::post('/atlets2', 'SiteOnlineController@atlets2')->name('atlets2');





Route::get('/statistic', 'Statistic@add')->name('add');


Route::get('upload', ['as' => 'upload_form', 'uses' => 'CSVController@getForm']);
Route::post('upload', ['as' => 'upload_file', 'uses' => 'CSVController@upload']);
//НЕПОТРІНІ РОУТИ
// Route::view('/about', 'about');
// Route::get('/1', [SiteEventController::class, 'index']);
// Route::get('/event/register/{registerid}', 'SiteEventController@registerevent')->name('register'); // Сторінка яка показує зареєстрованих учасників 
// Route::get('/event', 'SiteEventController@index')->name('home');
// Route::get('/event/{id}', 'SiteEventController@show')->name('homes');
// Route::get('/admin/register/add', 'AdminRegisterController@getAdd')->name('homes');
// Route::get('/event', ['uses' => 'SiteEventController@index', 'as' => 'event']);
// Route::get('/', ['uses' => 'SiteEventController@index', 'as' => 'event']);
// Route::get('/', 'SiteEventController@index')->name('event');
// Route::get('/protocols', [ProtocolController::class, 'index']);
// Route::resource('items', ItemController::class);
// Route::resource('/protocols', [ProtocolController::class])->name('protocols');
// Route::get('/telegram_bot', [TelegramController::class, 'bot'])->name('telegram_bot');
// Route::get('/telegram_create', [TelegramController::class, 'create'])->name('telegram_create');
// Route::get('/atlets', 'SiteOnlineController@atlets')->name('homes');
// Route::post('/atlets2', 'SiteOnlineController@atlets2')->name('homes');lllllllllllllllllllllllllllllllgit
// Route::post('/atlets', 'SiteOnlineController@atlets')->name('atlets');
// Route::post('/atlets2', ['uses' => 'SiteOnlineController@atlets2', 'as' => 'atlets2']);
// Route::get('/rezonline/{id}/{pass}', 'RezOnlineControoler@show')->name('rezonline');
// Route::get('/rezonline/{id}/add', 'RezOnlineControoler@add')->name('rezonlineadd');
// Route::get('/online', 'SiteOnlineController@indexonline')->name('online');
// Route::get('/calendar2', 'SiteEventController@calendar')->name('calendar2'); //Календар
// Route::get('/online/rezult/{id}', 'SiteOnlineController@showrezult')->name('rezult');
// Route::get('/online/rezult_com/{id}', 'SiteOnlineController@comrezult')->name('rezult_com');   //jnnnnnnnnnnnnnnnjjjjjjjjjjjjjj
// Route::get('/online/startlist/{id}', 'SiteOnlineController@showstartlist')->name('startlist');
// Route::get('/online/split/{id}', 'SiteOnlineController@showsplit')->name('split');
// Route::get('/online/showrezcom/{id}', 'SiteOnlineController@showrezcom')->name('showrezcom'); //Результти команди
// Route::get('/autocomplete2', 'TestController@autocomplete2')->name('homes');
// Route::get('/autocomplete3', 'TestController@autocomplete3')->name('homes');
// Route::get('/autocomplete2', 'TestController@index')->name('homes');/
//НЕПОТРІНІ РОУТИ