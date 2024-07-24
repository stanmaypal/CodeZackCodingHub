<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassIssue extends Model
{
    use HasFactory;

    protected $table='classissues';
    protected $fillable = [
        'student_id',
        'teacher_id',
        'class_id',
        'subject_id',
        'issue_date', // Add issue_date to fillable properties
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
