<?php
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\IndividualController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/com/reg', function () {
//     return view('company.register');
// });
// Route::get('/com/log', function () {
//     return view('company.login');
//});

//Company Urls
Route::get('/company/register', [CompanyController::class, 'register'])->name('company.register');
Route::post('/company/register', [CompanyController::class, 'storeUser']);

Route::get('/company/login',  [CompanyController::class,'login'])->name('company.login');
Route::post('/company/login', [CompanyController::class,'authenticate']);
Route::get('company/logout', [CompanyController::class,'logout'])->name('company.logout');


Route::get('/company/home', [CompanyController::class, 'home'])->name('company.dashboard');

//Indivdual Urls
Route::get('/individual/register', [IndividualController::class, 'register'])->name('individual.register');
Route::post('/individual/register', [IndividualController::class,'storeUser']);
Route::get('/individual/login', [IndividualController::class,'login'])->name('individual.login');
Route::post('/individual/login', [IndividualController::class,'authenticate']);
Route::get('individual/logout', [IndividualController::class,'logout'])->name('individual.logout');

Route::get('/individual/home', [IndividualController::class, 'home'])->name('individual.dashboard');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
