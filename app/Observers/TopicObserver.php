<?php

namespace App\Observers;

use App\Handlers\TranslateHandler;
use App\Jobs\TranslateJob;
use App\Models\Topic;
use Illuminate\Support\Facades\DB;

class TopicObserver
{
    public function saving(Topic $topic)
    {
        // XSS 过滤。
        $topic->body = clean($topic->body, 'user_topic_body');

        // 生成摘要。
        $topic->excerpt = make_excerpt($topic->body);

        //if (! $topic->slug) {
            //$topic->slug = app(TranslateHandler::class)->translateText($topic->title);
            // 将翻译的任务推送到队列。
            //dispatch(new TranslateJob($topic));
        //}
    }

    public function saved(Topic $topic)
    {
        if (! $topic->slug) {
            // 将翻译的任务推送到队列。
            dispatch(new TranslateJob($topic));
        }
    }

    public function deleted(Topic $topic)
    {
        // 删除话题时，将话题相关的回复一并删除掉。
        DB::table('replies')->where('topic_id', $topic->id)->delete();
    }
}
