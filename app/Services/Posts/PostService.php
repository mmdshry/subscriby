<?php

namespace App\Services\Posts;

use App\Models\Post;

class PostService implements PostServiceInterface
{
    /**
     * Create a new post.
     *
     * @param array $data The post-data.
     * @return Post The created post instance.
     */
    public function createPost(array $data): Post
    {
        return Post::create($data);
    }
}
