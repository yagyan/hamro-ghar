<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;


class userinfo extends Model
{
    //
    use  HasApiTokens ;

    protected $fillable = [
          'name', 'user_id','dob','phone','mobile','citizen_no','tward_id'
      ];
}
