<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deficiency extends Model
{
    use HasFactory;
    protected $table = 'deficiencies';
    protected $fillable = [
        'application_id',
        'type',
        'deficiency_1',
        'deficiency_photo_1',
        'deficiency_2',
        'deficiency_photo_2',
        'deficiency_3',
        'deficiency_photo_3',
        'deficiency_4',
        'deficiency_photo_4',
        'deficiency_5',
        'deficiency_photo_5',
        'deficiency_6',
        'deficiency_photo_6',
        'deficiency_7',
        'deficiency_photo_7',
        'deficiency_8',
        'deficiency_photo_8',
        'deficiency_9',
        'deficiency_photo_9',
        'deficiency_10',
        'deficiency_photo_10',
        'deficiency_11',
        'deficiency_photo_11',
        'deficiency_12',
        'deficiency_photo_12',
        'deficiency_13',
        'deficiency_photo_13',
    ];
}
