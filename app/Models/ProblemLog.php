<?php

namespace App\Models;

use App\Models\Hardware;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProblemLog extends Model
{
    use HasFactory;

    protected $table = 'ProblemLog';

    /*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hardwareSerialNumber',
        'softwareId',
        'specialistAssigned',
        'operatingSystemId',
        'problemTypeId',
        'problemTitle',
        'problemDescription',
        'status',
        'importanceLevel',
        'solvedAt',
        'solvedBy'
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
        'startDate' => 'datetime'
    ];

    public function hardware(){
        return $this->belongsTo(Hardware::class, 'hardwareSerialNumber', 'serialNum');
    }

    public function software(){
        return $this->belongsTo(Software::class, 'softwareId', 'softwareId');
    }

    public function operatingSystem(){
        return $this->belongsTo(OperatingSystem::class, 'operatingSystemId', 'id');
    }
}
