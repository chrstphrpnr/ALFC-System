<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InsuranceController;

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
    return view('landing-page');
});


Route::get('/login', function () {
    return view('Auth/login');
});

Route::get('/Sales-Associate', function () {
    return view('Users/Sales_Associate/Home/homepage');
})->name('sales-associate.home');

Route::get('/Sales-Associate/Marketing-Arms/', function () {
    return view('Users/Sales_Associate/ApplicationForms/marketing-arm');
})->name('sales-associate.marketing-arms');



Route::get('/providers', [InsuranceController::class, 'getProviders'])->name('insurance.providers.index');
Route::get('/products/{providerId}', [InsuranceController::class, 'providersProduct'])->name('insurance.products');
Route::get('/computation-rates/{providerId}/{productId}', [InsuranceController::class, 'getComputationRates'])->name('insurance.computation_rates');
