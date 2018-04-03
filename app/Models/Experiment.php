<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experiment extends Model
{
    protected $table = 'experiments';
    protected $fillable = [
        'name', 'introduction'
    ];

    public function terms()
    {
        return $this->belongsToMany('App\Models\Term',
            'term_experiment',
            'experiment_id',
            'term_id');
    }

    public function experimentDetails()
    {
        return $this->hasMany('App\Models\ExperimentDetail',
            'experiment_id',
            'id');
    }
}
