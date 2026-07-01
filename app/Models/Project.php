<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'category_id', 'title', 'slug', 'description', 'image',
        'project_url', 'github_url', 'technologies', 'featured',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
