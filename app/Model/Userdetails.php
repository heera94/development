<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Userdetails extends Model
{
    use SoftDeletes;
    protected $table='user_details';
    protected $fillable = ['user_id','city','dob','otp','image'];
}
