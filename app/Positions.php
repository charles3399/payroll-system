<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    protected $fillable = [
        'name',
        'basic_pay'
    ];

    public function employees()
    {
        return $this->hasMany(Employees::class);
    }

    public function payrolls()
    {
        return $this->hasManyThrough(
            Payrolls::class,
            Employees::class
        );
    }
}
