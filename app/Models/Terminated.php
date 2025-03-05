<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminated extends Model
{
    use HasFactory;

    protected $table = 'terminated';
    public $timestamps = false;
    protected $guarded = [];
}
