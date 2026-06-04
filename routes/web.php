<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NavigationController;
use App\Models\Message;
use Illuminate\Routing\RouteAction;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Attribute\Route as AttributeRoute;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[NavigationController::class,'home'])->name('home');

Route::get('/Nos Specialites',[NavigationController::class,'formation'])->name('specialite');

Route::get('/Pre-Inscription', function(){
    return view('inscription');
})->name('inscription');

Route::get('/Contact', function(){
    return view('contact');
})->name('contact');
Route::post('/message', action: [MessageController::class, 'new'])->name('newMessage');
Route::get('/AdminIPP', [AdminController::class, 'home'])->name('homeAdmin');
 Route::post('/login',[AdminController::class,'login'])->name('login');
Route::get('/logout',[AdminController::class,'logout'])->name('logout');
Route::post('/save', action: [InscriptionController::class, 'save'])->name('save');




Route::get('Admin/Candidature', [InscriptionController::class, 'get'])->name('admin-home')->middleware('auth');
Route::get('/Admin/Personaliser',[AdminController::class,'personaliser'])->name('personaliser')->middleware('auth');
Route::get('/Admin/Evenement',[AdminController::class,'evenement'])->name('evenement')->middleware('auth');
Route::get('/Admin/Formation',[AdminController::class,'formation'])->name('formation')->middleware('auth');
Route::get('/Admin/Message', action: [MessageController::class, 'get'])->name('getMessage')->middleware('auth');
Route::get('/Admin/Message/delete/$id', action: [MessageController::class, 'delete'])->name('deleteMessage')->middleware('auth');

Route::post('/Admin/save1',[AdminController::class,'save1'])->name('save1')->middleware('auth');
Route::post( '/Admin/save2',action: [AdminController::class,'save2'])->name('save2')->middleware('auth');
Route::get('/Admin/delete/$id',[AdminController::class,'delete'])->name('delete')->middleware('auth');
Route::post( '/Admin/UpdateName',action: [AdminController::class,'updateName'])->name('updateName')->middleware('auth');
Route::post( '/Admin/UpdateImage',action: [AdminController::class,'updateImage'])->name('updateImage')->middleware('auth');



 

