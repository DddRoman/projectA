<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocVersion extends Model
{
    use HasFactory;
    
  
    protected $table = 'doc_version';

    protected $fillable = [
        'doc_id',
        'name',
        'shifr',
        'version',
        'year',
     ];
}
