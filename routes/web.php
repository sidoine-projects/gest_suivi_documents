<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Select2AutoSearch;
use App\Http\Controllers\TypeaheadController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\EvolutionSexeController;
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



/*Route::get('/', function () {
    return view('home');
});*/





Route::get('/formation', function () {
    return view('formations');
});



Route::get('/training', function () {
    return view('training');
})->name('training');


Route::get('/pack', function () {
    return view('pack');
})->name('pack');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


/*Route::get('/admin/login', function () {
    return view('admin/auth/login');
});*/
Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

Route::get('/profil', [App\Http\Controllers\HomeController::class, 'profil'])->name('profil');

Route::post('/', [App\Http\Controllers\HomeController::class, 'filtre'])->name('filtre');



Route::get('/home', [App\Http\Controllers\TypeaheadController::class, 'index']);




Route::get('/autocomplete', [App\Http\Controllers\TypeaheadController::class, 'autocompleteSearch'])->name('autocomplete');

Route::get('/home', Select2AutoSearch::class);

//Route::get('/listquartier', [App\Http\Livewire\Select2AutoSearch::class, 'listquartier'])->name('listquartier');
Route::get('/single-article/{id}/{titre}', [App\Http\Controllers\HomeController::class, 'showArticle']);
Route::post('single-article', [App\Http\Controllers\HomeController::class, 'commentArticle'])->name('showArticle');


Route::get('user-pagination', function () {
    return view('default');
});




Route::get('user-pagination', function () {
    return view('default');
});





Route::post('store', [App\Http\Controllers\userSignalementController::class, 'save'])->name('store');

Route::post('thematiqueUser', [App\Http\Controllers\userCityController::class, 'save'])->name('thematiqueUser');
Route::post('townUser', [App\Http\Controllers\userCityController::class, 'townUser'])->name('townUser');
Route::post('updateStatus', [App\Http\Controllers\userCityController::class, 'updateStatus'])->name('updateStatus');

Route::get('townUser/delete/{id}', [App\Http\Controllers\userCityController::class, 'delete']);

Route::get('ArrondissementsQuartiersSelect', App\Http\Livewire\ArrondissementsQuartiersSelect::class);


Route::get('geolocalisation', [App\Http\Controllers\GeolocalisationController::class,  'index'])->name('geolocalisation');
Route::get('user-sondage', [App\Http\Controllers\userSondageController::class,  'index'])->name('user-sondage');
Route::get('display-sondage', [App\Http\Controllers\userSondageController::class,  'show'])->name('display-sondage');
Route::get('test/{slu}', [App\Http\Controllers\userSondageController::class,  'test'])->name('test');

Route::get('signalement-user', [App\Http\Controllers\userSignalementController::class,  'index'])->name('signalement-user');
Route::get('user-preference', [App\Http\Controllers\userPreferenceController::class, 'index'])->name('user-preference');
Route::get('user-city', [App\Http\Controllers\userCityController::class, 'index'])->name('user-city');

/*Route::group(['middleware' => ['Auth', 'users'], 'prefix' => 'users'], function () {
    Route::get('actualite-user', [App\Http\Controllers\actualiteUserController::class, 'index'])->name('actualite-user');
});*/

Route::get('/actualite-user', [App\Http\Controllers\actualiteUserController::class, 'index'])->name('actualite-user');



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

// -----------------------------categorie-----------------------------------------

//Route::get('categorie/new', [App\Http\Controllers\categorieController::class, 'create'])->name('categorie/new'); //New departement
Route::get('admin/categories', [App\Http\Controllers\CategorieController::class, 'index'])->name('categories'); // Liste departement
Route::post('admin/categories/save', [App\Http\Controllers\CategorieController::class, 'save'])->name('categories/save'); //Enregistrer departement
//Route::post('departements/edit', [App\Http\Controllers\DepartementController::class, 'edit'])->name('departements/edit'); //Enregistrer departement
Route::get('admin/categorie/update/{id}', [App\Http\Controllers\CategorieController::class, 'update']); //Modifier departement
Route::post('admin/categorie/edit', [App\Http\Controllers\CategorieController::class, 'edit'])->name('categorie/edit'); //Enregistrer departement
Route::get('admin/categorie/delete/{id}', [App\Http\Controllers\CategorieController::class, 'delete']);

//Important -----------------------------profils-----------------------------------------
//Route::get('profils/new', [App\Http\Controllers\ProfilController::class, 'create'])->name('profils/new'); //New departement
Route::get('admin/profils', [App\Http\Controllers\ProfilController::class, 'index'])->name('profils'); // Liste departement
Route::post('admin/profils/save', [App\Http\Controllers\ProfilController::class, 'save'])->name('profils/save'); //Enregistrer departement
//Route::post('departements/edit', [App\Http\Controllers\DepartementController::class, 'edit'])->name('departements/edit'); //Enregistrer departement
Route::get('admin/profils/update/{id}', [App\Http\Controllers\ProfilController::class, 'update']); //Modifier departement
Route::post('admin/profils/edit', [App\Http\Controllers\ProfilController::class, 'edit'])->name('profils/edit'); //Enregistrer departement
Route::get('admin/profils/delete/{id}', [App\Http\Controllers\ProfilController::class, 'delete']);

// -----------------------------thematique-----------------------------------------

//Route::get('categorie/new', [App\Http\Controllers\categorieController::class, 'create'])->name('categorie/new'); //New departement
Route::get('admin/thematiques', [App\Http\Controllers\ThematiqueController::class, 'index'])->name('thematiques'); // Liste departement
Route::post('admin/thematiques/save', [App\Http\Controllers\ThematiqueController::class, 'save'])->name('thematiques/save'); //Enregistrer departement
//Route::post('departements/edit', [App\Http\Controllers\DepartementController::class, 'edit'])->name('departements/edit'); //Enregistrer departement
Route::get('admin/thematique/update/{id}', [App\Http\Controllers\ThematiqueController::class, 'update']); //Modifier departement
Route::post('admin/thematique/edit', [App\Http\Controllers\ThematiqueController::class, 'edit'])->name('thematique/edit'); //Enregistrer departement
Route::get('admin/thematique/delete/{id}', [App\Http\Controllers\ThematiqueController::class, 'delete']);

// -----------------------------Actualite Admin-----------------------------------------

//Route::get('categorie/new', [App\Http\Controllers\categorieController::class, 'create'])->name('categorie/new'); //New departement
Route::get('admin/actualites/new', [App\Http\Controllers\Admin\ActualiteController::class, 'create'])->name('admin/actualites/new'); // Liste departement
Route::get('admin/actualites', [App\Http\Controllers\Admin\ActualiteController::class, 'index'])->name('admin/actualites'); // Liste departement
Route::post('admin/actualites/save', [App\Http\Controllers\Admin\ActualiteController::class, 'save'])->name('actualites/save'); //Enregistrer departement
//Route::post('departements/edit', [App\Http\Controllers\DepartementController::class, 'edit'])->name('departements/edit'); //Enregistrer departement
Route::get('admin/actualite/update/{id}', [App\Http\Controllers\Admin\ActualiteController::class, 'update']); //Modifier departement
Route::post('admin/actualites/edit', [App\Http\Controllers\Admin\ActualiteController::class, 'edit'])->name('actualite/edit'); //Enregistrer departement
Route::get('admin/actualite/delete/{id}', [App\Http\Controllers\Admin\ActualiteController::class, 'delete']);


// -----------------------------Admin signalisaion-----------------------------------------
Route::get('admin/signalisations', [App\Http\Controllers\userSignalementController::class, 'signalisationAdmin'])->name('admin/signalisations'); // Liste departement

Route::get('detail-signalisations/{id}', [App\Http\Controllers\userSignalementController::class, 'signalisationDetail']); // Liste departement

Route::get('detail-admin-signalisations/{id}', [App\Http\Controllers\userSignalementController::class, 'signalisationAdminDetail']); // Liste departement
Route::post('admin/updaterp', [App\Http\Controllers\userSignalementController::class, 'updaterp'])->name('admin/updaterp'); //Enregistrer departement

// -----------------------------departement-----------------------------------------

/*Route::get('departement/new', [App\Http\Controllers\DepartementController::class, 'create'])->name('departement/new'); //New departement
Route::get('departements', [App\Http\Controllers\DepartementController::class, 'index'])->name('departements'); // Liste departement
Route::post('departements/save', [App\Http\Controllers\DepartementController::class, 'save'])->name('departements/save'); //Enregistrer departement
//Route::post('departements/edit', [App\Http\Controllers\DepartementController::class, 'edit'])->name('departements/edit'); //Enregistrer departement
Route::get('departement/update/{id}', [App\Http\Controllers\DepartementController::class, 'update']); //Modifier departement
Route::post('departements/edit', [App\Http\Controllers\DepartementController::class, 'edit'])->name('departements/edit'); //Enregistrer departement
Route::get('departement/delete/{id}', [App\Http\Controllers\DepartementController::class, 'delete']);
*/

// -----------------------------sexe-----------------------------------------
/*
Route::get('sexe/new', [App\Http\Controllers\SexeController::class, 'create'])->name('sexe/new'); //New departement
Route::get('sexes', [App\Http\Controllers\SexeController::class, 'index'])->name('sexes'); // Liste departement
Route::post('sexes/save', [App\Http\Controllers\SexeController::class, 'save'])->name('sexes/save'); //Enregistrer departement
//Route::post('departements/edit', [App\Http\Controllers\DepartementController::class, 'edit'])->name('departements/edit'); //Enregistrer departement
Route::get('sexe/update/{id}', [App\Http\Controllers\SexeController::class, 'update']); //Modifier departement
Route::post('sexes/edit', [App\Http\Controllers\SexeController::class, 'edit'])->name('sexes/edit'); //Enregistrer departement
Route::get('sexe/delete/{id}', [App\Http\Controllers\SexeController::class, 'delete']);
*/
// -----------------------------Annee-----------------------------------------

/*

Route::get('annee/new', [App\Http\Controllers\AnneeController::class, 'create'])->name('annee/new'); //New departement
Route::get('annees', [App\Http\Controllers\AnneeController::class, 'index'])->name('annees'); // Liste departement
Route::post('annees/save', [App\Http\Controllers\AnneeController::class, 'save'])->name('annees/save'); //Enregistrer departement
//Route::post('departements/edit', [App\Http\Controllers\DepartementController::class, 'edit'])->name('departements/edit'); //Enregistrer departement
Route::get('annee/update/{id}', [App\Http\Controllers\AnneeController::class, 'update']); //Modifier departement
Route::post('annees/edit', [App\Http\Controllers\AnneeController::class, 'edit'])->name('annees/edit'); //Enregistrer departement
Route::get('annee/delete/{id}', [App\Http\Controllers\AnneeController::class, 'delete']);


// -----------------------------commune-----------------------------------------
Route::get('commune/new', [App\Http\Controllers\CommuneController::class, 'create'])->name('commune/new'); //New departement
Route::get('communes', [App\Http\Controllers\CommuneController::class, 'index'])->name('communes'); // Liste departement
Route::post('communes/save', [App\Http\Controllers\CommuneController::class, 'save'])->name('communes/save'); //Enregistrer departement
//Route::post('departements/edit', [App\Http\Controllers\DepartementController::class, 'edit'])->name('departements/edit'); //Enregistrer departement
Route::get('commune/update/{id}', [App\Http\Controllers\CommuneController::class, 'update']); //Modifier departement
Route::post('communes/edit', [App\Http\Controllers\CommuneController::class, 'edit'])->name('communes/edit'); //Enregistrer departement
Route::get('commune/delete/{id}', [App\Http\Controllers\CommuneController::class, 'delete']);

// -----------------------------Evolution par annee-----------------------------------------
Route::get('evolution_annee/new', [App\Http\Controllers\EvolutionAnneeController::class, 'create'])->name('evolution_annee/new');
Route::get('evolution_annee', [App\Http\Controllers\EvolutionAnneeController::class, 'index'])->name('evolution_annee');
Route::post('evolution_annee/save', [App\Http\Controllers\EvolutionAnneeController::class, 'store'])->name('evolution_annee/save');
Route::get('evolution_annee/update/{id}', [App\Http\Controllers\EvolutionAnneeController::class, 'update']);
Route::post('evolution_annee/edit', [App\Http\Controllers\EvolutionAnneeController::class, 'edit'])->name('evolution_annee/edit');
Route::get('evolution_annee/delete/{id}', [App\Http\Controllers\EvolutionAnneeController::class, 'delete']);
Route::get('evolution_annee/downloadPDF', [App\Http\Controllers\EvolutionAnneeController::class, 'downloadPDF'])->name('evolution_annee/downloadPDF');
Route::get('evolution_annee/downloadExcel', [App\Http\Controllers\EvolutionAnneeController::class, 'get_evolution_annee_data'])->name('evolution_annee/downloadExcel');
Route::post('evolution_annee', [App\Http\Controllers\EvolutionAnneeController::class, 'update_table'])->name('evolution_annee/update_table');
// -----------------------------Evolution par Sexe-----------------------------------------
Route::get('evolution_sexe/new', [App\Http\Controllers\EvolutionSexeController:: class, 'create'])->name('evolution_sexe/new');
Route::get('evolution_sexe', [App\Http\Controllers\EvolutionSexeController::class, 'index'])->name('evolution_sexe');
Route::post('evolution_sexe/save', [App\Http\Controllers\EvolutionSexeController::class, 'store'])->name('evolution_sexe/save');
Route::get('evolution_sexe/update/{id}', [App\Http\Controllers\EvolutionSexeController::class, 'update']);
Route::post('evolution_sexe/edit', [App\Http\Controllers\EvolutionSexeController::class, 'edit'])->name('evolution_sexe/edit');
Route::get('evolution_sexe/delete/{id}', [App\Http\Controllers\EvolutionSexeController::class, 'delete']);
Route::get('evolution_sexe/downloadPDF', [App\Http\Controllers\EvolutionSexeController::class, 'downloadPDF'])->name('evolution_sexe/downloadPDF');
Route::get('evolution_sexe/downloadExcel', [App\Http\Controllers\EvolutionSexeController::class, 'get_evolution_sexe_data'])->name('evolution_sexe/downloadExcel');
Route::post('evolution_sexe', [App\Http\Controllers\EvolutionSexeController::class, 'update_table'])->name('evolution_sexe/update_table');


Route::get('datatable', [App\Http\Controllers\DatatableContoller:: class, 'index'])->name('datatable'); */

