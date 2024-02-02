<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalAmount extends Model
{
    use HasFactory;

    

    protected $table = 'total_amounts';

    protected $fillable = [
        'userid',
        'date',
        'doc_no',
        'description',
        'account',
        'item',
        'amount',
    ];
}