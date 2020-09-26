<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public $table = 'persons';
    public $fillable = ['name'];
}
