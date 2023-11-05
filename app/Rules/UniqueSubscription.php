<?php

namespace App\Rules;

use App\Models\Subscription;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueSubscription implements ValidationRule
{
    public function __construct(private readonly string $websiteId, private readonly string $userId)
    {
    }

    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (Subscription::where('website_id', $this->websiteId)->where('user_id', $this->userId)->exists()) {
            $fail('The user already has a subscription to this website.');
        }
    }
}
