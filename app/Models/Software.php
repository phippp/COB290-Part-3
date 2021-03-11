<?php

namespace App\Models;

use App\Models\ProblemLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Software extends Model
{
    use HasFactory;

    /*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'version',
        'license_key'
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
