<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dpdf extends Model
{
    use HasFactory;
    protected $table = 'dpdfs';
    protected $fillable = [
        'application_id',
        'file'
    ];
}
