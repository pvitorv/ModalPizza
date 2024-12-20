<?php

use App\Http\Controllers\Auth\PizzaController; // Certifique-se de que o caminho está correto
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController; // Adicione a importação
use App\Http\Controllers\ProductController; // Adicione a importação
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/shop', [ProductController::class, 'shop'])->name('shop');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('pizzas', PizzaController::class);
    // Adicione routes para Additionals e Products conforme necessário

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('products', ProductController::class); // Defina as rotas para o ProductController
});

require __DIR__.'/auth.php';


