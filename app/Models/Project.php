<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'project_url',
        'github_url',
        'technologies',
        'status',
        'display_order',
    ];

    public function getTechnologiesArrayAttribute()
    {
        return $this->technologies ? explode(', ', $this->technologies) : [];
    }
}