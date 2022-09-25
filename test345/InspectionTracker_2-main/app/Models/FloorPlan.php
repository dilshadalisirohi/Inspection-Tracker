<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorPlan extends Model
{
    use HasFactory;
    protected $table = 'floor_plans';
    protected $fillable = [
        'name',
        'br_bath',
        'housing_guideline_sqft',
        'front_porch_sqft',
        'back_porch_sqft',
        'total_sqft',
        'attachments'
    ];
}
