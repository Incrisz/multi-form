<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;
    protected $fillable = ['id','c_name','c_address','c_email','c_phone','p_name','p_phone','p_email','p_position','username','password'];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'c_email_verified_at' => 'datetime',
        'p_email_verified_at' => 'datetime',
    ];
}
