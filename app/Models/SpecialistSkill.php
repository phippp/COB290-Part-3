<?php

namespace App\Models;

use App\Models\Problem;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpecialistSkill extends Model
{
    use HasFactory;

    /*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'problem_id',
        'employee_id'
    ];

    /*
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function problem(){
        return $this->belongsTo(Problem::class);
    }

    public function specialist(){
        return $this->belongsTo(Employee::class);
    }
}
