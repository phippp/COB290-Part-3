<?php

namespace App\Models;

use App\Models\Problem;
use App\Models\Employee;
use App\Models\Hardware;
use App\Models\Software;
use App\Models\LogHistory;
use App\Models\ProblemNote;
use App\Models\OperatingSystem;
use App\Models\SpecialistTracker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProblemLog extends Model
{
    use HasFactory;

    /*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hardware_id',
        'software_id',
        'specialist_assigned',
        'operating_system_id',
        'problem_id',
        'title',
        'description',
        'status',
        'importance',
        'solved_at',
        'employee_id'
    ];

    /*
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'solved_at' => 'datetime'
    ];

    public function hardware(){
        return $this->belongsTo(Hardware::class);
    }

    public function software(){
        return $this->belongsTo(Software::class);
    }

    public function operatingSystem(){
        return $this->belongsTo(OperatingSystem::class);
    }

    public function problemType(){
        return $this->belongsTo(Problem::class);
    }

    public function notes(){
        return $this->hasMany(ProblemNote::class);
    }

    public function trackers(){
        return $this->hasMany(SpecialistTracker::class);
    }

    public function history(){
        return $this->hasMany(LogHistory::class);
    }

    public function solvedBy(){
        return $this->belongsTo(Employee::class);
    }
}
