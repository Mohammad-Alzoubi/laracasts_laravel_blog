<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [PostController::class, 'index'])->name('home');
// {post:slug} mean this => Post::where('slug', $post)->first();
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy']);

//Route::get('/categories/{category:slug}',function (Category $category){
//    return view('posts', [
////        'posts' => $category->posts->load(['category', 'author'])
//        'posts' => $category->posts,
////        'currentCategory' => $category,
////        'categories' => Category::all()
//
//    ]);
//});


//Route::get('/authors/{author:username}',function (User $author){
//    return view('posts.index', [
////        'posts' => $author->posts->load(['category', 'author'])
//        'posts' => $author->posts,  // we repeals load to with in model post
//        'categories' => Category::all()
//
//    ]);
//});






