<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function user() {
        return $this->belongTo('App\User');
    }
    public static function fetchTodoBaseOnUser($id){
    	 $user_id =  \Auth::user()->id;
        return  $todo = Todo::where('id', $id)->where('user_id', $user_id)->first();
    }
}
