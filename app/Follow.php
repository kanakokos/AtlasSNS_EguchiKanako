<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [  //$fillable=変更していいよ
        'following_user_id', 'followed_user_id',
    ];

    protected $table = 'follow_users';


    public function getFollowCount($user_id)
    {
        return $this->where('following_id', $user_id)->count();
    }

    public function getFollowerCount($user_id)
    {
        return $this->where('followed_id', $user_id)->count();
    }

}
