<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $post->load(['image', 'tipo', 'user']);

        $related = Post::with(['image', 'tipo'])
            ->where('is_active', true)
            ->where('tipo_id', $post->tipo_id)
            ->where('id', '!=', $post->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('post.show', compact('post', 'related'));
    }
}
