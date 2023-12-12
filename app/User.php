<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [  //$fillable=変更していいよ
        'username', 'mail', 'password', 'bio', 'images',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // hasMany結合(主テーブル -> 従テーブル)
    //usersテーブルは主テーブルなので「hasMany」（1対多結合） or 「hasOne」（1対1結合）を設定
    public function posts() {
        return $this->hasMany('App\Post');
    }

    //どのクラス(第一引数)のどのテーブル(第二引数)でどのカラム(第三引数)がどのカラム(第四引数)をどうする(メソッド名)

    // フォロー→フォロワー
    public function followings()
    {
    return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id')->withTimestamps();
    }

    // フォロワー→フォロー （フォローされる）
    public function followers()
    {
    return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id')->withTimestamps();
    }








    //フォローしているか確認
    public function isFollowing(Int $user_id)
    {
        // attach=すべてのデータが中間テーブルに保存
        // sync=重複なしで登録したい場合
        // return $this->followed_id()->attach($user_id);

        //boolean=”true”か”false”のどちらかの真偽値を扱う場合に使用
        return (boolean) $this->followings()->where('followed_id', $user_id)->first(['follows.id']);
    }

    //フォローされているか
    public function isFollowed(Int $user_id)
    {
        // attach=すべてのデータが中間テーブルに保存
        // sync=重複なしで登録したい場合
        // return $this->followed_id()->attach($user_id);
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['id']);
    }



    // フォローする
    public function follow(Int $user_id)
    {
        return $this->followings()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->followings()->detach($user_id);
    }



    // フォローリスト
public function followingPosts()
{
    // フォローしているユーザーのIDを取得
    $followingUserIds = $this->followings->pluck('id');
    // フォローしているユーザーの投稿を取得
    return Post::whereIn('user_id', $followingUserIds)->get();
}


    // フォロワーリスト
public function followerPosts()
{
    // フォローしているユーザーのIDを取得
    $followerUserIds = $this->followers->pluck('id');
    // フォローしているユーザーの投稿を取得
    return Post::whereIn('user_id', $followerUserIds)->get();
}

// $posts = Post::query()->whereIn('user_id', Auth::user()->followings()->pluck('followed_id'))->latest()->get();


}
