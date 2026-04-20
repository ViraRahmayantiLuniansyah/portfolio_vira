<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'title',
        'description',
        'issuer',
        'issue_date',
        'certificate_url',
        'image_url',
        'display_order',
    ];

    protected $casts = [
        'issue_date' => 'date',
    ];

    public function getFormattedIssueDateAttribute()
    {
        return $this->issue_date ? $this->issue_date->format('F Y') : null;
    }
}