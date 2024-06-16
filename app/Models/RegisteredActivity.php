<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisteredActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'categories_activities_id',
        'tags_activities_id',
        'status_activities_id',
        'name',
        'description',
        'image',
        'scheduled_at'
    ];
}
