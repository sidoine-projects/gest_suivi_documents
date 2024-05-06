<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserManagementController;
//use App\Http\Controllers\GeolocalisationController;

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


Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

Route::get('/profil', [App\Http\Controllers\HomeController::class, 'profil'])->name('profil');

Route::post('/', [App\Http\Controllers\HomeController::class, 'filtre'])->name('filtre');



Route::get('/home', [App\Http\Controllers\TypeaheadController::class, 'index']);


Route::get('user-pagination', function () {
    return view('default');
});




Route::get('user-pagination', function () {
    return view('default');
});

Route::get('admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin/home');
Route::post('admin', [App\Http\Controllers\Admin\HomeController::class, 'update'])->name('admin/home');


// -----------------------------login Admin-----------------------------------------
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// -----------------------------login user-----------------------------------------

// ------------------------------register---------------------------------------
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser'])->name('register');

// ------------------------------register---------------------------------------
Route::get('admin/register', [App\Http\Controllers\Auth\RegisterController::class, 'registerAdmin'])->name('admin/register');
Route::post('admin/register', [App\Http\Controllers\Auth\RegisterController::class, 'storeAdmin'])->name('admin/register');
Route::get('admin/user/update/{id}', [App\Http\Controllers\Auth\RegisterController::class, 'update']);
Route::post('admin/user/edit', [App\Http\Controllers\Auth\RegisterController::class, 'edit'])->name('admin/user/edit'); //Enregistrer departement

Route::get('admin/user/delete/{id}', [App\Http\Controllers\Auth\RegisterController::class, 'delete']);

// ----

Route::get('list-admin', [App\Http\Controllers\Auth\RegisterController::class, 'listAdmin'])->name('list-admin');


// -----------------------------forget password ------------------------------
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postEmail'])->name('forget-password');

// -----------------------------reset password ------------------------------
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword']);

// // -----------------------------form-----------------------------------------
Route::get('admin/form/new', [App\Http\Controllers\FormController::class, 'index'])->name('admin/form/new');
Route::post('admin/form/save', [App\Http\Controllers\FormController::class, 'save'])->name('admin/form/save');
Route::get('admin/form/view/report', [App\Http\Controllers\FormController::class, 'viewReport'])->name('admin/form/view/report');
Route::get('admin/form/view/update/{id}', [App\Http\Controllers\FormController::class, 'viewUpdate']);
Route::get('admin/form/delete/{id}', [App\Http\Controllers\FormController::class, 'delete']);

// -----------------------------user management-----------------------------------------
Route::get('role/user/view', [App\Http\Controllers\UserManagementController::class, 'index'])->name('role/user/view');
Route::post('role/user/save', [App\Http\Controllers\UserManagementController::class, 'save'])->name('role/user/save');
Route::post('role/user/update', [App\Http\Controllers\UserManagementController::class, 'update'])->name('role/user/update');
Route::get('role/user/view/report', [App\Http\Controllers\UserManagementController::class, 'viewReport'])->name('role/user/view/report');
Route::get('role/delete/{id}', [App\Http\Controllers\UserManagementController::class, 'delete']);


//Important -----------------------------profils-----------------------------------------
//Route::get('profils/new', [App\Http\Controllers\ProfilController::class, 'create'])->name('profils/new'); //New departement
Route::get('admin/profil/new', [App\Http\Controllers\ProfilController::class, 'create'])->name('profil/new'); // Liste departement
Route::get('admin/profils', [App\Http\Controllers\ProfilController::class, 'index'])->name('profils'); // Liste departement
Route::post('admin/profils/save', [App\Http\Controllers\ProfilController::class, 'save'])->name('profils/save'); //Enregistrer departement
//Route::post('departements/edit', [App\Http\Controllers\DepartementController::class, 'edit'])->name('departements/edit'); //Enregistrer departement
Route::get('admin/profils/update/{id}', [App\Http\Controllers\ProfilController::class, 'update']); //Modifier departement
Route::post('admin/profils/edit', [App\Http\Controllers\ProfilController::class, 'edit'])->name('profils/edit'); //Enregistrer departement
Route::get('admin/profils/delete/{id}', [App\Http\Controllers\ProfilController::class, 'delete']);



