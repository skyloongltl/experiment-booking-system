<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Student extends Model implements JWTSubject, AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, CanResetPassword, Authorizable;

    protected $fillable = [
        'number', 'class', 'name', 'password'
    ];

    protected $hidden = [
        'password',
    ];

    public function experimentDetails()
    {
        return $this->belongsToMany('App\Models\ExperimentDetail',
            'student_experiment_detail',
            'student_id',
            'experiment_detail_id');
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