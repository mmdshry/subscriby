<?php

namespace App\Jobs;

use App\Mail\PostEmail;
use App\Models\Post;
use App\Models\Subscription;
use Cache;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @param  mixed  $subscriber
     * @param  mixed  $post
     */
    public function __construct(private readonly Subscription $subscriber, private readonly Post $post)
    {
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle()
    {
        $cacheKey = "post_email_received:{$this->subscriber->id}:{$this->post->id}";
        $hasUserReceived = Cache::get($cacheKey);
        if (!$hasUserReceived) {
            Mail::to($this->subscriber->user->email)->send(new PostEmail($this->post));
            Cache::put($cacheKey, true);
        }
    }
}
