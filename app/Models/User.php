<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

/**
 * @property \Illuminate\Database\Eloquent\Relations\HasMany topics
 * @property \Illuminate\Database\Eloquent\Relations\HasMany replies
 */
class User extends Authenticatable
{
    use Notifiable {
        notify as protected inform;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'introduction',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @param mixed $instance
     */
    public function notify($instance)
    {
        if ($this->id === Auth::id()) {
            return;
        }
        $this->increment('notification_count');
        $this->inform($instance);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * 标记通知已读。
     */
    public function markAsRead()
    {
        $this->notification_count = 0;
        $this->save();
        $this->unreadNotifications()->update(['read_at' => now()]);
    }

    /**
     * 判断是否为原作者。
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return bool
     */
    public function isAuthor(\Illuminate\Database\Eloquent\Model $model)
    {
        return $this->id === $model->user_id;
    }
}
