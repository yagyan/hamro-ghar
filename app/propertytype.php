<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class propertytype extends Model
{

  use  HasApiTokens ;
  protected $fillable = [
      'name',
  ];
}
