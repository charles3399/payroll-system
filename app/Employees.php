<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class Employees extends Model
{
    use HasRelationships;
    
    protected $fillable = [
        'fname',
        'lname',
        'gender',
        'address',
        'positions_id'
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
