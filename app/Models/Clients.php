<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    public $timestamps = false;
    // protected $fillable =[
    //     'user_id',
    //     'remaks_1',
    //     'remarks_2',
    //     'remarks_3',
        
    // ];
    protected $fillable =[
        'client',
        'address',
        'email',
        'status',
        'created_at',
        'link_code',
        'is_admin',
        'is_delete',
        
    ];
}
