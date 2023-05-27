<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use App\Models\Dislike;
use App\Models\Bookmark;
use Illuminate\Http\Request;

class PostInteractionController extends Controller
{
    public function like(Request $request, Post $post)
    {
        $post->likes()->create([
            'user_id' => auth()->user()->id,
        ]);

        $post->increment('likes');

        return redirect()->back();
    }

    public function dislike(Request $request, Post $post)
    {
        $post->dislikes()->create([
            'user_id' => auth()->user()->id,
        ]);

        $post->increment('dislikes');

        return redirect()->back();
    }

    public function bookmark(Request $request, Post $post)
    {
        $post->bookmarks()->create([
            'user_id' => auth()->user()->id,
        ]);

        $post->increment('bookmarks');

        return redirect()->back();
    }
}

