<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\SubscriptionRequest;
use App\Services\Subscriptions\SubscriptionService;
use Exception;

class SubscriptionController extends Controller
{
    public function __construct(protected SubscriptionService $subscriptionService)
    {
    }

    public function createSubscription(SubscriptionRequest $request)
    {
        try {
            $this->subscriptionService->createSubscribe($request->validated());

            return response()->json(['message' => 'Subscription created successfully'], 201);
        } catch (Exception) {
            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
    }
}
