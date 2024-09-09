<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts',[
            'title' => 'Blog Page', 
            'posts' => Post::Filter(request(['search', 'category', 'author']))->latest()->paginate(6)->withQueryString(), 'categoryAll' => Category::NamakategoridanSlug()->latest()->get()
        ]);
        // $post = Post::all();
        //  ! Kalo butuh nambahin sesuatu di query kita harus pake get
        // * Untuk mengatasi N+1 query kita bisa menggunakan with (Eager Loading)
        // $post = Post::with('author')->latest()->get();
        // * Nambahin dua
        // $post = Post::with(['author', 'category'])->latest()->get();
        
        // ! Kalo pake cara id ini nanti user bisa tebak tebak di url kaya /posts/3 dan akan error
        // * Jadi kita akan menggunakan slug untuk mengatasi hal ini biasanya ngambil dari judul hurufnya jadi kecil semua dan kita tempel dan kita pisahkan menggunakan tanda minus
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // ! Kalo kita pakai cara find dari laravel maka kita harus mencari default menggunakan id makanya nanti akan error 
        // ! Kita bisa menggunakan route model binding untuk mengatasi hal ini
        // * Kita menggunakan Implicit Binding jadi kita akan mengirimkan langsung instance secara penuh ke dalam function sehingga tidak perlu lagi mencari manual tapi laravel yang akan mencari otomatis
        // !Bagian post singularnya kita bisa menggunakan cara ini {instance:field} jadi kita bisa cari berdasarkan field yang kita inginkan 
        return view('post', ['title' => 'single post', 'post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
