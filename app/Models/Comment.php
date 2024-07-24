<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table='comments';
    protected $fillable = ['student_id', 'course', 'image', 'comment'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }
}
