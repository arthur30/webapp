<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guide extends Authenticatable
{
    use Notifiable;

    /**
     * Specifies the guard name in auth.php
     */
    protected $guard = 'guide';

    /**
     * The key that prevents SQLSTATE[42703]: Undefined column: 7 ERROR: column "id" does not exist
     * @var string
     */
    protected $primaryKey = 'guide_id';

    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
        'full_name', 'nationality', 'home_town', 'phone_number', 'education', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
