<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'fname',
        'lname',
        'gender',
        'address',
        'positions_id',
        'payrolls_id'
    ];

    public function positions()
    {
        return $this->belongsTo(Positions::class);
    }

    public function payrolls()
    {
        return $this->belongsToMany(Payrolls::class);
    }
}
