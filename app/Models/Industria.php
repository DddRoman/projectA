<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industria extends Model
{
    use HasFactory;
    protected $table = 'industria';

    protected $fillable = [
        'auth_id',
       'dependence',    
        'name',
        'type',
       'discription',
 
    ];
}
