<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payrolls extends Model
{
    protected $fillable = [
        'days_work',
        'overtime_hrs',
        'late',
        'absences',
        'bonuses',
        'employees_id'
    ];

    public function employees()
    {
        return $this->hasMany(Employees::class);
    }

    public function payments()
    {
        //return $this->hasMany(Payments::class);
    }
}
