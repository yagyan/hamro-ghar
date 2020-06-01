<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
class post extends Model
{
    //
    use  HasApiTokens ;
    
    protected $fillable = [
        'title','propertytype_id','characteristics','area','price','negotiation','user_id','status','sold','longitude','latitude','description'
    ];
}
