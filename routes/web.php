<?php
namespace App\Http\Controllers;
use App\Livewire\ProgramVote;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\likeController;
use App\Http\Controllers\ProfileController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');





Route::middleware('auth')->group(function () {

    route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('candidat', CandidatController::class);
    Route::resource('programme', ProgrammeController::class);
    Route::resource('secteur', SecteurController::class);
    Route::resource('electeur', ElecteurController::class);

    Route::get('/listeCand', [HomeController::class, 'liste'])->name('listeCand.liste');
    Route::get('/listePro', [HomeController::class, 'listePro'])->name('listePro.liste');
    Route::get('/listeSect', [HomeController::class, 'listeSect'])->name('listeSect.liste');

Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates.index');
Route::get('/program-vote', ProgramVote::class)->name('program-vote');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::post('/candidat/{candidat}/like/{type}', [likeController::class, 'likecandidat'])
    ->name('likecandidat');

// Route pour le dislike d'un secteur
Route::post('/candidat/{candidat}/dislike', [likeController::class, 'dislikecandidat'])->name('dislikecandidat');



    Route::get('/candidat/{id}/programme', 'App\Http\Controllers\CandidatController@showProgramme')->name('candidat.programme');

Route::get('/programme/vote/{programme}', 'ProgrammeController@vote')->name('programme.vote');


});


Route::group(['middleware' => 'IsAdmin'], function () {
    Route::resource('candidat', CandidatController::class);
    Route::resource('programme', ProgrammeController::class);
    Route::resource('secteur', SecteurController::class);
    Route::resource('electeur', ElecteurController::class);
});


require __DIR__.'/auth.php';
