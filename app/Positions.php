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
        return $this->belongsToMany(Employees::class);
    }
}
