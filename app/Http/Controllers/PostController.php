<?php

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Services\Posts\PostService;
use Illuminate\Http\JsonResponse;

/**
 * The PostController class.
 */
class PostController extends Controller
{
    /**
     * Create a new PostController instance.
     *
     * @param PostService $postService The PostService instance.
     */
    public function __construct(protected PostService $postService)
    {
    }

    /**
     * Create a new post.
     *
     * @param PostRequest $request The PostRequest instance.
     * @return JsonResponse The JSON response.
     */
    public function createPost(PostRequest $request): JsonResponse
    {
        try {
            $postData = $request->validated();
            $this->postService->createPost($postData);

            return response()->json(['message' => 'Post created successfully'], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
