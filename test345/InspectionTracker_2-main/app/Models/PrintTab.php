<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintTab extends Model
{
    use HasFactory;
    protected $table = 'print_tabs';
    protected $fillable = [
        'application_id',
        'inspector_id',
        'cancellation_request',
        'date_inspected',
        'inspector',
        'inspector_email',
        'superintendent',
        'superintendent_email',
        'requester_email',
        'superintendent_phone',
        'document_spawn',
        'document_creation_date',
        'inspection_sign_off_date',
        'homeowner_sign_off_date',
        'superintendent_sign_off_date',
        'document_name',
        'inspector_formula_sign',
        'superintendent_formula_sign'
    ];
}
