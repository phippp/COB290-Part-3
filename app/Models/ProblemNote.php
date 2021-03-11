<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\ProblemLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProblemNote extends Model
{
    use HasFactory;

    /*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'call_recieved_by',
        'caller_id',
        'problem_log_id'
    ];

    /*
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function problemLog(){
        return $this->belongsTo(ProblemLog::class);
    }

    public function recievedBy(){
        return $this->belongsTo(Employee::class,'call_recieved_by');
    }

    public function caller(){
        return $this->belongsTo(Employee::class,'caller_id');
    }
}
