<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TetsQr extends Model
{
    use HasFactory;

    // Tell Laravel the correct table name
    protected $table = 'records';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'purpose',
    ];
}
