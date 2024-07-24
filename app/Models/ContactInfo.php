<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;
protected $table='contact_info';
    protected $fillable = [
        'logo',
        'name',
        'about',
        'phone',
        'email',
        'twitter_link',
        'facebook_link',
        'youtube_link',
        'linkedin_link',
        'instagram_link',
        'map_link',
        'address',
    ];
}
