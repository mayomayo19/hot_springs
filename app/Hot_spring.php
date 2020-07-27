<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hot_spring extends Model
{
    protected $fillable = ['content'];
    
    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * このユーザがお気にいり登録したのユーザ。（ Hot_springモデルとの関係を定義）
     */
    public function likes_users()
    {
        return $this->belongsToMany(User::class, 'likes', 'hot_springs_id', 'users_id')->withTimestamps();
    }
}
