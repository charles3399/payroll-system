<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class Positions extends Model
{
    use HasRelationships;

    protected $fillable = [
        'name',
        'basic_pay'
    ];

    public function employees()
    {
        return $this->hasMany(Employees::class);
    }
}
