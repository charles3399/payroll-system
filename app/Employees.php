<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{

    protected $fillable = [
        'fname',
        'lname',
        'gemder',
        'address'
    ];

    public function positions()
    {
        return $this->belongsTo(Positions::class);
    }
}
