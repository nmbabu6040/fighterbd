<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroSliderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/service', [HomeController::class, 'service'])->name('service');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog_details/{slug}', [HomeController::class, 'blog_details'])
    ->name('blog_details');
Route::get('/team', [HomeController::class, 'team'])->name('team');
Route::get('/team_details/{team}', [HomeController::class, 'team_details'])->name('team_details');
Route::get('/team_details', [HomeController::class, 'team_details'])->name('team_details');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


Route::prefix('admin')->name('admin.')->middleware(['auth', 'log.activity'])->group(function () {

    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('permission:dashboard.view');

    // slider
    Route::get('/slider', [HeroSliderController::class, 'index'])->name('slider')->middleware('permission:slider.view');
    Route::get('/slider/create', [HeroSliderController::class, 'create'])->name('slider.create')->middleware('permission:slider.create');
    Route::post('/slider/store', [HeroSliderController::class, 'store'])->name('slider.store')->middleware('permission:slider.create');
    Route::get('/slider/{slider}/edit', [HeroSliderController::class, 'edit'])->name('slider.edit')->middleware('permission:slider.edit');
    Route::put('/slider/{slider}', [HeroSliderController::class, 'update'])->name('slider.update')->middleware('permission:slider.edit');
    Route::delete('/slider/{slider}', [HeroSliderController::class, 'destroy'])->name('slider.destroy')->middleware('permission:slider.delete');

    //settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings')->middleware('permission:settings.view');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update')->middleware('permission:settings.edit');

    //service
    Route::get('/service', [ServiceController::class, 'index'])->name('service')->middleware('permission:service.view');
    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create')->middleware('permission:service.create');
    Route::post('/service/store', [ServiceController::class, 'store'])->name('service.store')->middleware('permission:service.create');
    Route::get('/service/{service}/edit', [ServiceController::class, 'edit'])->name('service.edit')->middleware('permission:service.edit');
    Route::put('/service/{service}', [ServiceController::class, 'update'])->name('service.update')->middleware('permission:service.edit');
    Route::delete('/service/{service}', [ServiceController::class, 'destroy'])->name('service.destroy')->middleware('permission:service.delete');


    // Gallery
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery')->middleware('permission:gallery.view');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create')->middleware('permission:gallery.create');
    Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store')->middleware('permission:gallery.create');
    Route::get('/gallery/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery.edit')->middleware('permission:gallery.edit');
    Route::put('/gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update')->middleware('permission:gallery.edit');
    Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy')->middleware('permission:gallery.delete');

    //counter
    Route::get('/counter', [CounterController::class, 'index'])->name('counter')->middleware('permission:counter.view');
    Route::get('/counter/create', [CounterController::class, 'create'])->name('counter.create')->middleware('permission:counter.create');
    Route::post('/counter/store', [CounterController::class, 'store'])->name('counter.store')->middleware('permission:counter.create');
    Route::get('/counter/{counter}/edit', [CounterController::class, 'edit'])->name('counter.edit')->middleware('permission:counter.edit');
    Route::put('/counter/{counter}', [CounterController::class, 'update'])->name('counter.update')->middleware('permission:counter.edit');
    Route::delete('/counter/{counter}', [CounterController::class, 'destroy'])->name('counter.destroy')->middleware('permission:counter.delete');

    //team
    Route::get('/team', [TeamController::class, 'index'])->name('team')->middleware('permission:team.view');
    Route::get('/team/create', [TeamController::class, 'create'])->name('team.create')->middleware('permission:team.create');
    Route::post('/team/store', [TeamController::class, 'store'])->name('team.store')->middleware('permission:team.create');
    Route::get('/team/{team}/edit', [TeamController::class, 'edit'])->name('team.edit')->middleware('permission:team.edit');
    Route::put('/team/{team}', [TeamController::class, 'update'])->name('team.update')->middleware('permission:team.edit');
    Route::delete('/team/{team}', [TeamController::class, 'destroy'])->name('team.destroy')->middleware('permission:team.delete');

    //testimonial
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial')->middleware('permission:testimonial.view');
    Route::get('/testimonial/create', [TestimonialController::class, 'create'])->name('testimonial.create')->middleware('permission:testimonial.create');
    Route::post('/testimonial/store', [TestimonialController::class, 'store'])->name('testimonial.store')->middleware('permission:testimonial.create');
    Route::get('/testimonial/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit')->middleware('permission:testimonial.edit');
    Route::put('/testimonial/{testimonial}', [TestimonialController::class, 'update'])->name('testimonial.update')->middleware('permission:testimonial.edit');
    Route::delete('/testimonial/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy')->middleware('permission:testimonial.delete');

    // blog admin routes
    Route::get('/blog', [BlogController::class, 'index'])->name('blog')->middleware('permission:blog.view');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create')->middleware('permission:blog.create');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store')->middleware('permission:blog.create');
    Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit')->middleware('permission:blog.edit');
    Route::put('/blog/{blog}', [BlogController::class, 'update'])->name('blog.update')->middleware('permission:blog.edit');
    Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy')->middleware('permission:blog.delete');

    // contact messages
    Route::get('/contact', [AdminContactController::class, 'index'])->name('contact')->middleware('permission:contact.view');
    Route::get('/contact/{contact}', [AdminContactController::class, 'show'])->name('contact.show')->middleware('permission:contact.view');
    Route::patch('/contact/{contact}/unread', [AdminContactController::class, 'markUnread'])->name('contact.unread')->middleware('permission:contact.view');
    Route::delete('/contact/{contact}', [AdminContactController::class, 'destroy'])->name('contact.destroy')->middleware('permission:contact.delete');

    // users
    Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('permission:users.view');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create')->middleware('permission:users.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store')->middleware('permission:users.create');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('permission:users.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update')->middleware('permission:users.edit');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('permission:users.delete');

    // roles
    Route::get('/role', [RoleController::class, 'index'])->name('role')->middleware('permission:roles.view');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create')->middleware('permission:roles.create');
    Route::post('/role/store', [RoleController::class, 'store'])->name('role.store')->middleware('permission:roles.create');
    Route::get('/role/{role}/edit', [RoleController::class, 'edit'])->name('role.edit')->middleware('permission:roles.edit');
    Route::put('/role/{role}', [RoleController::class, 'update'])->name('role.update')->middleware('permission:roles.edit');
    Route::delete('/role/{role}', [RoleController::class, 'destroy'])->name('role.destroy')->middleware('permission:roles.delete');
});

Route::middleware(['auth', 'log.activity'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
