<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\ReplyNotification;

class ReplyObserver
{
    public function creating(Reply $reply)
    {
        $reply->content = clean($reply->content, 'user_topic_body');
    }

    public function created(Reply $reply)
    {
        /** @var \App\Models\Topic $topic */
        $topic = $reply->topic;
        $topic->increment('reply_count', 1);
        $topic->user->notify(new ReplyNotification($reply));
    }

    public function deleted(Reply $reply)
    {
        $reply->topic->decrement('reply_count', 1);
    }
}
