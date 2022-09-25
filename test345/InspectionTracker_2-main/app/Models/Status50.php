<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status50 extends Model
{
    use HasFactory;
    protected $table = '50_statuses';
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
        'inspection_sign',
        'inspection_sign_off_date',
        'homeowner_sign',
        'homeowner_sign_off_date',
        'superintendent_sign',
        'superintendent_sign_off_date',
        'document_name',
        'inspector_formula_sign',
        'superintendent_formula_sign',
        'general_inspection',
        'exterior_inspection',
        'interior_inspection',
        'window_door_inspection',
        'roof_attic_inspection',
        'additional_information_1',
        'additional_information_2',
        'additional_information_3',
        'additional_information_4',
        'additional_notes',
        'address_text',
        'attachment_1',
        'ical_text',
        'contractor_builder_name',
        'thumb_1',
        'notify_glo',
    ];

}
