<?php

namespace App\Services\Subscriptions;

use App\Models\Subscription;

class SubscriptionService implements SubscriptionServiceInterface
{
    public function createSubscribe(array $data)
    {
        return Subscription::create($data);
    }
}
