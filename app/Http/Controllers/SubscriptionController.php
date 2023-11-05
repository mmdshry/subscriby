<?php

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;
use App\Services\Subscriptions\SubscriptionService;
use Illuminate\Http\JsonResponse;

/**
 * The SubscriptionController class.
 */
class SubscriptionController extends Controller
{
    /**
     * The SubscriptionService instance.
     *
     * @var SubscriptionService
     */
    protected SubscriptionService $subscriptionService;

    /**
     * Create a new SubscriptionController instance.
     *
     * @param SubscriptionService $subscriptionService The SubscriptionService instance.
     */
    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    /**
     * Create a new subscription.
     *
     * @param SubscriptionRequest $request The SubscriptionRequest instance.
     * @return JsonResponse The JSON response.
     */
    public function createSubscription(SubscriptionRequest $request): JsonResponse
    {
        try {
            $subscriptionData = $request->validated();
            $this->subscriptionService->createSubscribe($subscriptionData);

            return response()->json(['message' => 'Subscription created successfully'], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
