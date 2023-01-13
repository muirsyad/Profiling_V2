<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =[
        'client',
        'email',
        'address',
        'created_at',
        'link_code',
        'is_delete',
    ];
}
