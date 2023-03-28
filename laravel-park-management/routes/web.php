<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;
use App\Http\Controllers\dashcontroller;
use App\Http\Controllers\userController;
use App\Http\Controllers\fornisseurController;
use App\Http\Controllers\posteController;
use App\Models\materiel;

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
route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');



    Route::controller(dashcontroller::class)->group(function () {

        route::get('/users/{id}', 'users')->name('users');
        route::get('/adduser', 'adduser')->name('adduser');
        route::get('/reset-password', 'resetPassword')->name('reset-password');
        route::get('/user/profile', 'profile')->name('profile');
        route::get('/poste/{id}', 'post')->name('poste');

    });

    Route::controller(userController::class)->group(function () {
        route::get('/profile/{id}', 'profile')->name('profile');
        route::post('/storeuser', 'storeuser')->name('struser');
        route::post('/updateuser/{id}', 'updateuser')->name('updateuser');
        route::delete('/deleteuser/{id}', 'delete')->name('deleteuser');
    });

    Route::controller(MaterielController::class)->group(function () {
        route::get('/materiels', 'index')->name('materiels');
        route::get('/addmateriel', 'create')->name('addmateriel');
        route::post('/storemateriel', 'store')->name('storemateriel');
        route::delete('/deletemateriel/{id}', 'delete')->name('deletemateriel');
        route::post('/updatemateriel/{id}', 'update')->name('updatemateriel');
    });

    Route::controller(serviceController::class)->group(function () {
        route::get('/services', 'showser')->name('showser');
        route::get('/servicesadd', 'addservice')->name('addservice');
        route::post('/servicesstore', 'storeservice')->name('storeservice');
        route::delete('/deleteservice/{id}', 'delete')->name('deleteservice');

    });

    Route::controller(posteController::class)->group(function () {
        route::get('/postes/{id}', 'showpostes')->name('showpostes');
        route::get('/postes', 'showpostesall')->name('showpostesall');
        route::get('/addpostes/{service}', 'create')->name('addposte');
        route::post('/storeposte', 'store')->name('storeposte');
        route::delete('/deleteposte/{id}', 'delete')->name('deleteposte');
    });

    Route::controller(typeController::class)->group(function () {
        route::get('/addtype', 'create')->name('addtype');
        route::get('/storetype', 'store')->name('storetype');
        
    });

    Route::controller(modeleController::class)->group(function () {
        route::get('/modeles', 'index')->name('modeles');
        route::get('/addmodele', 'create')->name('addmodele');
        route::post('/storemodele', 'store')->name('storemodele');
        route::delete('/deletemodele/{id}', 'delete')->name('deletemodele');
        route::post('/updatemodele/{id}', 'update')->name('updatemodele');
      
        
    });

    Route::controller(marqueController::class)->group(function () {
        route::get('/marques', 'index')->name('marques');
        route::get('/addmarque', 'create')->name('addmarque');
        route::post('/storemarque', 'store')->name('storemarque');
        route::delete('/deletemarque/{id}', 'delete')->name('deletemarque');
        route::post('/updatemarque/{id}', 'update')->name('updatemarque');

    });

    Route::controller(fornisseurController::class)->group(function () {
        route::get('/fornisseurs', 'index')->name('fornisseurs');
        route::get('/addfornisseur', 'create')->name('addfornisseur');
        route::post('/storefornisseur', 'store')->name('storefornisseur');
        route::delete('/deletefornisseur/{id}', 'delete')->name('deletefornisseur');
        route::post('/updatefornisseur/{id}', 'update')->name('updatefornisseur');


    Route::controller(panneController::class)->group(function () {

      route::post('/storepanne', 'store')->name('storepanne');   
        });  
        
        Route::controller(reparationController::class)->group(function () {

      route::post('/storereparation', 'store')->name('storereparation');   
        });


    });
    });
  