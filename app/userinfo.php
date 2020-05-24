<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userinfo extends Model
{
    //
    protected $fillable = [
          'name', 'user_id','dob','phone','mobile','citizen_no','tward_id'
      ];
}
