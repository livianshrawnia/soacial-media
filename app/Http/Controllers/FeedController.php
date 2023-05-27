<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->withCount(['likes', 'dislikes', 'bookmarks'])->get();

        return view('feed.index', compact('posts'));
    }
}
