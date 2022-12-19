<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class DocText extends Model
{
    use HasFactory;
    protected $table = 'doc_text';
    protected $fillable = [
        'doc_version_id',
        'type',
        'dependence',
        'prioritete',
        'text',
        'draft',
     ];


}
