<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activitas extends Model
{
    use HasFactory;

    protected $table = 'activitas';
    protected $fillable = [
        'email',
        'username',
        'role',
        'last_login'
    ];
    
}
