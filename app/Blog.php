<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];

    protected $casts = [
        'published_date' => 'date',
    ];


    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
