<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{

    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }


    public function store()
    {
        $attributes = request()->validate([
            'title'       => 'required',
            'thumbnail'   => 'required|image',
            'excerpt'     => 'required',
            'body'        => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['slug']    = str::slug(request('title'));
        $attributes['thumbnail']    = request()->file('thumbnail')->store('thumbnail');

        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title'       => 'required',
            'thumbnail'   => 'image',
            'excerpt'     => 'required',
            'body'        => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['slug']    = str::slug(request('title'));

        if (isset($attributes['thumbnail'])){
            $attributes['thumbnail']    = request()->file('thumbnail')->store('thumbnail');
        }

        Post::where('id' , '=', $post->id)->update($attributes);

        return redirect('admin/posts')->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post Deleted!');
    }

}
