<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Services\Posts\PostService;
use Exception;

class PostController extends Controller
{
    public function __construct(protected PostService $postService)
    {
    }

    public function createPost(PostRequest $request)
    {
        try {
            $this->postService->createPost($request->validated());

            return response()->json(['message' => 'Post created successfully'], 201);
        } catch (Exception) {
            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
    }
}
