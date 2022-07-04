<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];

    public function career()
    {
        return $this->belongsTo(Job::class);
    }
}
