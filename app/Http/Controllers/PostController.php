<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function index(Website $website)
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PostService $postService, Website $website)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'website_id' => 'required|numeric|exists:websites,id'
        ]);

        return $postService->store($website, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Website $website, Post $post)
    {
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website  $website
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostService $postService, Website $website, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'website_id' => 'required|numeric|exists:websites,id'
        ]);

        $postService->update($website, $post, $data);

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website  $website
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Website $website, Post $post)
    {
        $post->delete();
    }
}
