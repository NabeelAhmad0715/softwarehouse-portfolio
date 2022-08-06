<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LatestNew extends Model
{
    protected $table = 'latest_news';
    protected $guarded = [];

    protected $casts = [
        'published_date' => 'date',
    ];
}
