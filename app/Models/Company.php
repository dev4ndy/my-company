<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    /**
     * Relationship with employees
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
