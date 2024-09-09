<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

// => ini merupakan persingkat dari return function
Route::get('/about', function () {
    return view('about', ['title' => 'About Page', 'name' => 'Revo Rahmat']);
});

Route::get('/posts', [PostController::class, 'index']);

// post singular
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// Route::get('/authors/{user:username}', function (User $user){
     // $posts = $user->posts->load('category', 'author');
//     return view('posts', ['title' => count($user->posts) . ' Article by ' . $user->name, 'posts' => $user->posts]);
// });

 // ! jangan lupa kalo misalnya makae implicit binding kita harus mengikuti nama field yang ada di modelnya kalo gak kita pake Id
 // ! Kalo kita pakai category aja maka dia akan mencari berdasarkan id kalo kita pakai category:slug maka dia akan mencari berdasarkan slug
// Route::get('/categories/{category:slug}', function(Category $category){
     // $posts = $category->posts->load('category', 'author');
//     return view('posts', ['title' => 'Post In Category : '.$category->nama_kategori, 'posts' => $category->posts]);
// });

Route::get('/contact', function () {
    $posts = new Post();
    $tlpn = $posts->nomertlpn();
    return view('contact', ['nomors' => $tlpn, 'title' => 'Contact Page']);
});

