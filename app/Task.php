<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];

    // 관계: Task 하나는 한 명의 유저에 속해있다.
    public function user(){
        return $this->belongsTo(User::class);
    }

}


