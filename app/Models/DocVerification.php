<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocVerification extends Model
{
    use HasFactory;
    protected $table = 'doc_verification';

    protected $fillable = [
       'doc_version_id',
        'action',
        'user_id',
     ];
}
