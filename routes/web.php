<?php

use App\Http\Controllers\formcontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use Illuminate\Support\Facades\Route;
use App\Models\category;

// use App\Models\form;
// use App\Models\User;


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
    return view('home', [
        'title' => 'home',
        'active' => 'home'
    ]);
});


Route::get('/about', function () {
    return view('about', [
        'title' => 'about',
        'active' => 'about',
        'nama' => 'nanang',
        'kelas' => 'XII TKJ 2',
        'jurusan' => 'TKJ'

    ]);
});




Route::get('/form', [formcontroller::class, 'index']);



Route::get('/forms/{form:slug}', [formcontroller::class, 'show']);


// Route::get('/categories', function() {

//     return view('categories', [

//         'title' => 'category',
//         'active' => 'categories',
//         'categories' => category::all()
        

//     ]);

// });


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);



Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {

    return view('dashboard.index');

})->middleware('auth');



Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');




// Route::get('/categories/{category:slug}', function(category $category) {
    
//     return view('form', [

//         'title' => "All Post By category : $category->name",
//         'active' => 'categories',
//         'forms' => $category->forms->load(['category', 'author']),
//         'category' => $category->name

//     ]);
// });


// Route::get('/authors/{author:username}', function(User $author) {
    
//     return view('form', [

//         'title' => "All Post By : $author->username",
//         'forms' => $author->forms->load(['category', 'author'])

//     ]);
// });



     
