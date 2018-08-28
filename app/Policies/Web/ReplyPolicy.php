<?php

namespace App\Policies\Web;

use App\Models\Reply;
use App\Models\User;

class ReplyPolicy extends Policy
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
     * @param \App\Models\Reply $topic
     *
     * @return bool
     */
    public function destroy(User $user, Reply $topic)
    {
        return $user->isAuthor($topic);
    }
}
