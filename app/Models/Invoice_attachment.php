<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_attachment extends Model
{
    use HasFactory;

    protected $fillable=[
        'file_name',
        'invoice_number',
        'Created_by',
        'invoice_id',
        'updated_at',
        'created_at'
    ];
}
