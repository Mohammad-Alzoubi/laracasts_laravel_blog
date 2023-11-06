<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {

//    check logger:
//    DB::listen(function ($query) {
//        logger($query->sql, $query->bindings);
//    });

        return view('posts.index', [
//        'posts' => Post::latest()->with(['category', 'author'])->get()
            'posts'           => $this->getPosts(), // the 'with' inside model Post
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post'   => $post // Or
//        'post' => Post::findOrFail($post)
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }


//    Start getPost
    protected function getPosts()
    {

//        $posts = Post::latest();
//        if (request('search'))
//        {
//            $posts->where('title', 'like', '%'. request('search') .'%')
//                ->OrWhere('body', 'like', '%'. request('search') .'%');
//        }
//        return $posts->get();

//    ==== OR ====

       return Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(); // that is mean when you search for something and go to page to the search applied.


    }
//    End getPost
}
