<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['user_id', 'website_id', 'expired_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function website()
    {
        return $this->belongsTo(Website::class, 'website_id');
    }
}
