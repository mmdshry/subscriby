<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['name', 'email'];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'website_id');
    }
}
