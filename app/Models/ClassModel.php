<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    protected $table='classes';
    protected $fillable=['name','description','logo'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
