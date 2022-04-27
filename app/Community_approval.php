<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community_approval extends Model
{














    /**
     * この承認を所有するコミュニティ。（Communityモデルとの多対1の関係を定義）
     */
    public function community(){
        return $this->belongsTo(Community::class);
    }
    
    /**
     * この投稿を所有するユーザ。（Userモデルとの多対1の関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}