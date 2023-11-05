<?php

namespace App\Services\Subscriptions;

use App\Models\Subscription;

class SubscriptionService implements SubscriptionServiceInterface
{

    /**
     * Create a new post.
     *
     * @param  array  $data  The post-data.
     * @return Subscription
     */
    public function createSubscribe(array $data): Subscription
    {
        return Subscription::create($data);
    }
}
