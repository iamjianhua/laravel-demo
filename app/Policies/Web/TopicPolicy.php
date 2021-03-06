<?php

namespace App\Policies\Web;

use App\Models\Topic;
use App\Models\User;

class TopicPolicy extends Policy
{
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param \App\Models\User  $user
     * @param \App\Models\Topic $topic
     *
     * @return bool
     */
    public function update(User $user, Topic $topic)
    {
        return $user->isAuthor($topic);
    }

    /**
     * @param \App\Models\User  $user
     * @param \App\Models\Topic $topic
     *
     * @return bool
     */
    public function destroy(User $user, Topic $topic)
    {
        return $user->isAuthor($topic);
    }
}
