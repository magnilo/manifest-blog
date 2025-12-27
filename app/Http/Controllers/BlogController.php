<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('is_published', true)
                     ->with(['user', 'category'])
                     ->latest()
                     ->paginate(9);

        return view('blog.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if (! $post->is_published) {
            abort(404);
        }

        return view('blog.show', compact('post'));
    }
}
