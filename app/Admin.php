<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'is_master', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'admin_users');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function levels(){
        return $this->hasMany(Level::class);
    }

    public function accidentInvestigationReport(){
        return $this->hasMany(AccidentInvestigationReport::class);
    }

    public function workerSite(){
        return $this->hasMany(WorkerSiteForm::class, 'auth_admin_id');
    }

    public function accidentReportForm(){
        return $this->hasMany(AccidentReportForm::class, 'auth_admin_id');
    }
}
