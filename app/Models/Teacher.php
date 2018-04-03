<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Teacher extends Model implements JWTSubject, AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, CanResetPassword, Authorizable;

    protected $fillable = [
        'name', 'number', 'password'
    ];

    protected $hidden = [
        'password'
    ];

    public function experimentDetails()
    {
        return $this->hasMany('App\Models\ExperimentDetail',
            'teacher_id',
            'id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
