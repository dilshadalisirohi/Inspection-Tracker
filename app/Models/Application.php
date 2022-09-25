<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $table = 'applications';
    protected $fillable = [
        'previous_application_id',
        'document_1',
        'document_file_1',
        'document_2',
        'document_file_2',
        'document_3',
        'document_file_3',
        'document_4',
        'document_file_4',
        'document_5',
        'document_file_5',
        'document_6',
        'document_file_6',
        'document_7',
        'document_file_7',
        'document_8',
        'document_file_8',
        'hriq_id',
        'submitted_glo',
        'date_glo_submission',
        'application_id',
        'applicant_name',
        'applicant_address',
        'applicant_city',
        'applicant_county',
        'requester_id',
        'requester_name',
        'requester_email',
        'requester_phone',
        'company',
        'requested_date',
        'requested_time',
        'construction_type',
        'floor_plan',
        'inspection_type',
        'region',
        'supervisor_name',
        'supervisor_email',
        'supervisor_phone',
        'inspector_id',
        'inspection_status',
        'scheduled_inspection_date',
        'scheduled_inspection_time',
        'comments',
        'company_id'
    ];
}
