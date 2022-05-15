<?php

namespace App\Services;

use App\Events\PostCreated;
use App\Models\Post;

class PostService
{
    public function store($website, $data)
    {
        $post = Post::create($data);

        PostCreated::dispatch($post);

        return $post;
    }

    public function update($website, $post, $data)
    {
        return $post->update($data);
    }
}
