<?php

namespace App\Models;

use App\Models\Job;
use App\Models\User;
use App\Models\Branch;
use App\Models\Holiday;
use App\Models\LogHistory;
use App\Models\ProblemLog;
use App\Models\Specialist;
use App\Models\ProblemNote;
use App\Models\SpecialistSkill;
use App\Models\SpecialistTracker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'forename',
        'surname',
        'email_address',
        'job_id',
        'branch_id',
        'phone_number_extension',
        'language'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function holiday(){
        return $this->hasMany(Holiday::class);
    }

    public function notesCreated(){
        return $this->hasMany(ProblemNote::class,'call_received_by');
    }

    public function notesCreator(){
        return $this->hasMany(ProblemNote::class, 'caller_id');
    }

    public function specialistSkills(){
        return $this->hasMany(SpecialistSkill::class);
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function job(){
        return $this->belongsTo(Job::class);
    }

    public function specialist(){
        return $this->hasOne(Specialist::class);
    }

    public function problemLogs(){
        return $this->hasMany(ProblemLog::class);
    }

    public function logHistories(){
        return $this->hasMany(LogHistory::class);
    }

    public function trackers(){
        return $this->hasMany(SpecialistTracker::class);
    }
}
