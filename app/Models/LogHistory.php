<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\ProblemLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogHistory extends Model
{
    use HasFactory;

    public $timestamps = false;

    /*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'solution',
        'edited_at',
        'problem_log_id'
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
        'edited_at' => 'datetime',
    ];

    public function problemLog(){
        return $this->belongsTo(ProblemLog::class);
    }

}
