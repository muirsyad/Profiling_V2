<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =[
        'user_id',
        'remaks_1',
        'remarks_2',
        'remarks_3',
        
    ];
}
