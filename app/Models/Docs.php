<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docs extends Model
{
    use HasFactory;
    protected $table = 'docs';

    protected $fillable = [
        'str_id',
     ];
}
