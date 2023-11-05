<?php

namespace App\Services\Posts;

use App\Models\Post;

class PostService implements PostServiceInterface
{
    public function createPost(array $data)
    {
        return Post::create($data);
    }
}
