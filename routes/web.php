<?php
use App\Admin\AdminAuthController;
use App\Admin\DashboardController;
use App\Admin\UserController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//auth
Route::get('/login', function () {
    return view('auth.login');
})->name('user.login');

Route::group(['prefix'=>'user','middleware'=>'auth:user'],function () {
    //logout
    Route::get('/logout', function () {
        return 'logout';
    })->name('user.logout');
});

//register
Route::get('/register', [RegisterController::class,'index'])->name('register');


// group admin
Route::get('/admin/login', [AdminAuthController::class,'login'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class,'postLogin'])->name('admin.postLogin');

Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function () {
    //logout
    Route::get('/logout', [AdminAuthController::class,'logout'])->name('admin.logout');

    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

    //group user
    Route::prefix('user')->group(function () {
        Route::get('/list', [UserController::class,'index'])->name('admin.user.list');
        Route::get('/add', [UserController::class,'add'])->name('admin.user.add');
        Route::post('/add', [UserController::class,'store'])->name('admin.user.store');
        Route::get('/{user}/edit', [UserController::class,'edit'])->name('admin.user.edit');
        Route::put('/{user}/edit', [UserController::class,'update'])->name('admin.user.update');
        Route::delete('/{user}/delete', [UserController::class,'destroy'])->name('admin.user.delete');
    });
});

