<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentUpload extends Model
{
    use HasFactory;


    protected $table = 'document_upload';
    protected $primaryKey = 'doc_id';


    protected $fillable = [
        'userid',
        'doc_id',
        'doc_name',
        'doc_file',
        'doc_format',
    ];
    
}