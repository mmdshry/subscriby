<?php

namespace App\Http\Requests;

use App\Rules\UniqueSubscription;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'website_id' => ['required', 'uuid', Rule::exists('websites', 'id')],
            'user_id' => ['required', 'uuid', Rule::exists('users', 'id'),
                new UniqueSubscription($this->website_id, $this->user_id),
            ],

        ];
    }
}
