<?php

namespace App\Models;

use App\Models\Job;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'Employee';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'forename',
        'surname',
        'emailAddress',
        'jobId',
        'branchId',
        'phoneNumberExtension',
        'language'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function branch(){
        return $this->belongsTo(Branch::class, 'branchId', 'branchId');
    }

    public function job(){
        return $this->belongsTo(Job::class, 'jobId', 'jobId');
    }

    public function holiday(){
        return $this->hasMany(Holiday::class, 'empId');
    }

    public function login(){
        return $this->hasOne(User::class, 'empId');
    }
}
