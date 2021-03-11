<?php

namespace App\Models;

use App\Models\ProblemLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hardware extends Model
{
    use HasFactory;

    public $timestamps = false;

    /*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'serial_num',
        'name',
        'type',
        'make'
    ];

    /*
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function problemlog(){
        return $this->hasMany(ProblemLog::class);
    }

}
