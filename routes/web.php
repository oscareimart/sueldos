<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\BonusController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\DetailSheetController;
use App\Http\Controllers\CheckSheetController;
use App\Http\Controllers\SalaryRangesController;
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
    return view('auth.login');
});

// Route::get('/test', function () {
//     return view('test');
// });

Auth::routes();

// Route::get('/dashboard', function () {
//     $modules = Role::find(Auth::user()->role_id)->modules;
//         $mods = $this->getModulesRoles($modules);
//     return view('pages.dashboard.index',);
// });

Route::get('/dashboard', [App\Http\Controllers\DashController::class, 'index'])->middleware(['auth','init.config'])->name('dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('companies', CompanyController::class)->middleware(['auth','init.config']);

Route::resource('roles', RoleController::class)->middleware(['auth','init.config']);

Route::resource('modules', ModuleController::class)->middleware(['auth','init.config']);
Route::resource('users', UserController::class)->middleware(['auth','init.config']);
Route::resource('employees', EmployeesController::class)->middleware(['auth','init.config']);
Route::resource('documents', DocumentsController::class)->middleware(['auth','init.config']);
Route::resource('bonus', BonusController::class)->middleware(['auth','init.config']);
Route::resource('discounts', DiscountController::class)->middleware(['auth','init.config']);
Route::resource('parameters', ParameterController::class)->middleware(['auth','init.config']);
Route::resource('detailsheets', DetailSheetController::class)->middleware(['auth','init.config']);
Route::resource('checksheets', CheckSheetController::class)->middleware(['auth','init.config']);
Route::resource('salary_ranges', SalaryRangesController::class)->middleware(['auth','init.config']);

Route::post('/checksheets-loaddata', [App\Http\Controllers\CheckSheetController::class, 'loadData'])->name('loadData')->middleware(['auth','init.config']);

Route::post('/importar-csv', [App\Http\Controllers\CSVController::class, 'importarCSV'])->name('importar-csv');
Route::post('/generatePdf', [App\Http\Controllers\DomPdfController::class, 'generatePDF'])->name('generatePDF');

Route::post('/get-menu', [App\Http\Controllers\RoleController::class, 'getMenu'])->name('get-menu')->middleware(['auth','init.config']);
