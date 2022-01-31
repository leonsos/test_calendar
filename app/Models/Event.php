<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // static $rules = [
    //     'title' => 'required',
    //     'description' => 'required',
    //     'start' => 'start',
    //     'end' => 'end',
    // ];

    protected $fillable = ['title','description','start','end'];
}
