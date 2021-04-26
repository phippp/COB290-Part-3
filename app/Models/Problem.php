<?php

namespace App\Models;

use App\Models\ProblemLog;
use App\Models\SpecialistSkill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Problem extends Model
{
    use HasFactory;

    public $timestamps = false;

    /*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'problem_type',
        'problem_id',
        'enabled'
    ];

    /*
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function problemLogs(){
        return $this->hasMany(ProblemLog::class);
    }

    public function parentProblem(){
        return $this->belongsTo(Problem::class,'problem_id');
    }

    public function children(){
        return $this->hasMany(Problem::class, 'problem_id');
    }

    public function calcAverageTime(){
        $hours = 0;
        foreach($this->problemLogs as $log){
            if($log->solved_at != null){
                $hours += $log->created_at->diffInHours($log->solved_at);
            } else {
                $hours += $log->created_at->diffInHours(\Carbon\Carbon::now());
            }
        }
        return number_format($hours/$this->problemLogs->count(),0);
    }

    public function skills(){
        return $this->hasMany(SpecialistSkill::class);
    }
}
