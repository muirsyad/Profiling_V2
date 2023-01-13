<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer_records extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =[
        'answer_records',
        'created_at',
        'user_id',
        'D',
        'I',
        'S',
        'C',
    ];
}
