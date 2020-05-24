<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $fillable = [
        'title','propertytype_id','characteristics','area','price','negotiation','user_id','status','sold','longitude','latitude','description'
    ];
}
