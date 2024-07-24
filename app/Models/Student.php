<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;
    protected $fillable = [
        'registration_number',
        'enrollment_number',
        'student_name',
        'dob',
        'gender',
        'course',
        'father_name',
        'mother_name',
        'caste',
        'registration_date',
        'aadhar',
        'mobile',
        'email',
        'whatsapp',
        'current_address',
        'permanent_address',
        'photo'
    ];
    public function classModel()
    {
        return $this->belongsTo(ClassModel::class, 'course', 'id'); // Assuming 'course' column in students table and 'name' column in class_models table
    }
}
