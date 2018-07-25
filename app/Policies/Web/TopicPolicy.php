<?php

namespace App\Policies\Web;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;
    
    /**
     * TopicPolicy constructor.
     */
    public function __construct()
    {
        //
    }
}
