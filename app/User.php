<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'logo', 'phone', 'address', 'contact_person', 'about'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'admin_users');
    }

    public function accidentInvestigationReport()
    {
        return $this->hasMany(AccidentInvestigationReport::class, 'auth_client_id');
    }

    public function workerSite()
    {
        return $this->hasMany(WorkerSiteForm::class, 'auth_client_id');
    }

    public function accidentReportForm()
    {
        return $this->hasMany(AccidentReportForm::class, 'auth_client_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function assignLevels()
    {
        return $this->hasMany(AssignLevel::class);
    }
}
