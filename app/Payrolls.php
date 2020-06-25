<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class Payrolls extends Model
{
    use HasRelationships;

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
        return $this->belongsToMany(Employees::class);
    }

    public function positions()
    {
        return $this->hasManyDeep('App\Positions',
        ['App\Employees'])
        ->withIntermediate('App\Employees');
    }
}
