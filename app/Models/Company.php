<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function jobs()
    {


        // relationship between company and job
        return $this->hasMany(Job::class);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [

        'company_name',
        'user_id',
        'slug',
        'address',
        'phone',
        'website',
        'logo',
        'cover_photo',
        'slogan',
        'description',

    ];
}
