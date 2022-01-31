<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disabled_day extends Model
{
    use HasFactory;
    protected $fillable = [
        'calendar_id',
        'day',
        'title',
        'enable',
    ];
}
