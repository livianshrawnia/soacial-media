@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Feed</h1>

        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->user->username }}</h5>
                    <p class="card-text">{{ $post->description }}</p>
                    <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>

                    <div>
                        Likes: {{ $post->likes_count }}
                        Dislikes: {{ $post->dislikes_count }}
                        Bookmarks: {{ $post->bookmarks_count }}

                        <form action="{{ route('posts.like', $post) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">Like</button>
                        </form>

                        <form action="{{ route('posts.dislike', $post) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Dislike</button>
                        </form>

                        <form action="{{ route('posts.bookmark', $post) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-info">Bookmark</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
