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

}
