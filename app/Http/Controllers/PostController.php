<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug)
    {
        // Fetch the post by slug, ensuring it is published
        $post = Post::with('category')
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Fetch 5 recent published posts for the sidebar, excluding the current one
        $recentPosts = Post::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        // ✅ Corrected View Path: 'frontend.home.post' instead of 'frontend.post.show'
        return view('frontend.home.post', compact('post', 'recentPosts'));
    }
}