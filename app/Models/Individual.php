<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Individual extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;
    protected $fillable = ['id','name','phone','email','city','username','password'];
}
