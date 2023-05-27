<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
	{
	    return view('posts.create');
	}

	public function store(Request $request)
	{
	    $request->validate([
	        'description' => 'required|max:255',
	    ]);

	    $post = new Post();
	    $post->description = $request->input('description');
	    $post->user_id = auth()->user()->id;
	    $post->save();

	    return redirect()->route('feed')->with('success', 'Post created successfully.');
	}
}
