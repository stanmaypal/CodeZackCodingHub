<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    protected $table='enquiries';
    protected $fillable = [
        'name',
        'father_name',
        'phone_no',
        'email',
        'interest_course',
        'address',
        'current_date' // Add issue_date to fillable properties
    ];
}
