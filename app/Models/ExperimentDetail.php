<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExperimentDetail extends Model
{
    protected $table = 'experiment_detail';
    protected $fillable = [
      'date', 'experiment_id', 'teacher_id', 'quotas', 'use_quotas'
    ];

    public function students()
    {
        return $this->belongsToMany('APP\Models\Student',
            'student_experiment_detail',
            'experiment_detail_id',
            'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher',
            'teacher_id',
            'id');
    }

    public function experiment()
    {
        return $this->belongsTo('App\Model\Experiment',
            'experiment_id',
            'id');
    }
}
