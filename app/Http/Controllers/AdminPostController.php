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
        $post = new Post();

        /*
        $attributes = $this->validatePost(new Post());
        $attributes['user_id'] = auth()->id();
        $attributes['slug']    = str::slug(request('title'));
        $attributes['thumbnail']    = request()->file('thumbnail')->store('thumbnail');
        */

        // Or
        $attributes = array_merge($this->validatePost($post), [
           'user_id'   => request()->user()->id,
           'slug'      => str::slug(request('title')),
           'thumbnail' => request()->file('thumbnail')->store('thumbnail'),
        ]);

        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {

        $attributes = $this->validatePost($post);

        $attributes['user_id'] = auth()->id();
        $attributes['slug']    = str::slug(request('title'));

        if ($attributes['thumbnail'] ?? false){
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

    protected function validatePost($post)
    {

        return request()->validate([
            'title'       => 'required',
            'thumbnail'   => $post->exists ? ['image'] : ['image', 'required'],
            'excerpt'     => 'required|min:2',
            'body'        => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
    }

}
