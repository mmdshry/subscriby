<?php

namespace App\Services\Posts;

use App\Models\Post;

interface PostServiceInterface
{
    /**
     * Create a new post.
     *
     * @param  array  $data  The post-data.
     * @return Post
     */
    public function createPost(array $data): Post;
}
