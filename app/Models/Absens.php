<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absens extends Model
{
    use HasFactory;

    protected $guarded = ['name'];

    public function students()
    {
        return $this->hasMany('App\Models\Students');
    }
}
