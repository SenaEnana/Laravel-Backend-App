<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

 class Student extends Model
 {

use HasApiTokens, HasFactory, Notifiable;

public $table = 'students';

  /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
protected $fillable = [
    'name',
    'email',
    'phoneNo',
    'address',
    'password',
];

 /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
protected $hidden = [
    'password',
    'remember_token',
];

public $timestamps = false; 

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
];
}