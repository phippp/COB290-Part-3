<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

// This represents the Login table
class User extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $table = 'Login';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'empId',
        'username',
        'passwordHash'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'passwordHash',
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

}
