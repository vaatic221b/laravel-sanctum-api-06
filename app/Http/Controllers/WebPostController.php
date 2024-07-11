<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class WebPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('home', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = new Post([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        $post->user()->associate(auth()->user());
        $post->save();

        return redirect()->route('home')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        $post->load('user', 'comments.user');
        return view('posts.show', compact('post'));
    }

    public function addComment(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        $comment = new Comment([
            'body' => $request->body,
        ]);
        $comment->user()->associate(auth()->user());
        $comment->post()->associate($post);
        $comment->save();

        return redirect()->route('posts.show', $post)->with('success', 'Comment added successfully.');
    }
}
