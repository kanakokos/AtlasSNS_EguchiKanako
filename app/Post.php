<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [  //$fillable=変更していいよ
    'post', 'user_id',
    ];
    //
// belongsTo結合(主テーブル <- 従テーブル)
//postsテーブルは従テーブルなので「belongsTo」を設定
    public function user() {
        return $this->belongsTo('App\User');
    }
}
