<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habits extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'habits';

    protected $fillable = [
        'title',
        'start_time',
        'end_time',
        'date',
    ];
}
