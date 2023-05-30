<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TechnologyController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'verified'])
    ->name('admin.') // nominativo della rotta che sara admin.dashboard
    ->prefix('admin') // risponde alla rotta admin
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('projects', ProjectController::class)->parameters([
            'projects' => 'project:slug'
        ]);

        Route::get('projects/{project}/deleteImage', [ProjectController::class, 'deleteImage'])->name('projects.deleteImage');

        Route::resource('types', TypeController::class)->parameters([
            'types' => 'type:slug'
        ])->except(['show']); // except() per non creare le rotte selezionate, oppure only() per creare solo quelle selezionate

        Route::resource('technologies', TechnologyController::class)->parameters([
            'technologies' => 'technology:slug'
        ])->except(['show']); // except() per non creare le rotte selezionjate, oppure only() per creare solo quelle selezionate
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
