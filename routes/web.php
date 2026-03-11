<?php

use App\Http\Controllers\BundleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HardwareCatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SoftwareSolutionController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::view('/about', 'about')->name('about');
Route::get('/software-solutions', SoftwareSolutionController::class)->name('software.index');
Route::get('/hardware', [HardwareCatalogController::class, 'index'])->name('hardware.index');
Route::get('/hardware/{product:slug}', [HardwareCatalogController::class, 'show'])->name('hardware.show');
Route::get('/bundles', BundleController::class)->name('bundles.index');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
