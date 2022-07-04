<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
