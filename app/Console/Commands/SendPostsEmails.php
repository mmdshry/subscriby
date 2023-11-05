<?php

namespace App\Console\Commands;

use App\Jobs\SendMail;
use App\Models\Post;
use Illuminate\Console\Command;

class SendPostsEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-posts-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to subscribers for each post.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Post::with('website')->chunk(100, static function ($posts) {
            foreach ($posts as $post) {
                $post->website->subscriptions()->with('user')->chunk(100, static function ($subscribers) use ($post) {
                    $subscribers->each(static function ($subscriber) use ($post) {
                        SendMail::dispatch($subscriber, $post);
                    });
                });
            }
        });
    }
}
