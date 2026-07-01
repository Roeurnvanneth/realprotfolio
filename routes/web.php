<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/home', fn() => redirect()->route('home'));
Route::get('/about',    [SiteController::class, 'about'])->name('about');
Route::get('/skills',   [SiteController::class, 'skills'])->name('skills');
Route::get('/projects', [SiteController::class, 'projects'])->name('projects');
Route::get('/services', [SiteController::class, 'services'])->name('services');
Route::get('/contact',  [SiteController::class, 'contact'])->name('contact');
Route::post('/contact', [SiteController::class, 'contactStore'])->name('contact.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login',  [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('logout',[AuthController::class, 'logout'])->name('logout');
    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('about', [AboutController::class, 'edit'])->name('about.edit');
        Route::put('about', [AboutController::class, 'update'])->name('about.update');
        Route::resource('skills',       SkillController::class)->except(['show'])->names('skills');
        Route::resource('experiences',  ExperienceController::class)->except(['show'])->names('experiences');
        Route::resource('education',    EducationController::class)->except(['show'])->names('education');
        Route::resource('services',     ServiceController::class)->except(['show'])->names('services');
        Route::resource('categories',   CategoryController::class)->except(['show'])->names('categories');
        Route::resource('projects',     ProjectController::class)->except(['show'])->names('projects');
        Route::resource('testimonials', TestimonialController::class)->except(['show'])->names('testimonials');
        Route::get('contact-messages', [ContactMessageController::class, 'index'])->name('contact_messages.index');
        Route::get('contact-messages/{contact_message}', [ContactMessageController::class, 'show'])->name('contact_messages.show');
        Route::delete('contact-messages/{contact_message}', [ContactMessageController::class, 'destroy'])->name('contact_messages.destroy');
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    }); 
});
