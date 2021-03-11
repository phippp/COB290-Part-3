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

    public function skills(){
        return $this->hasMany(SpecialistSkill::class);
    }
}
