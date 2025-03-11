<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminated extends Model
{
    use HasFactory;

    protected $table = 'terminated';
    protected $primaryKey = 'trancheNo';
    public $timestamps = false;
    protected $guarded = [];
}
