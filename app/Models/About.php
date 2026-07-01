<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'name', 'title', 'bio', 'email', 'phone', 'address',
        'avatar', 'cv_file', 'facebook', 'linkedin', 'github', 'twitter',
    ];
}
