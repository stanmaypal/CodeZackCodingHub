<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
class Teacher extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'designation',
        'subject_expertise',
        'dob',
        'phone',
        'email',
        'address',
        'gender',
        'instagram_link',
        'twitter_link',
        'facebook_link',
        'photo',
    ];
    

     // Define the relationship with ClassModel
     public function classes()
     {
         return $this->hasMany(ClassModel::class);
     }
 
     // Define the relationship with ClassIssue
     public function classIssues()
     {
         return $this->hasMany(ClassIssue::class);
     }
}
