<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $table = 'terms';
    protected $fillable = [
      'term'
    ];

    public function experiments()
    {
        return $this->belongsToMany('App\Models\Experiment',
            'term_experiment',
            'term_id',
            'experiment_id');
    }
}
