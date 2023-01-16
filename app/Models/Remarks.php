<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remarks extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =[
        'user_id',
        'rem_1',
        'rem_2',
        'rem_3',
        
    ];
}
