<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habits extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'habits';
    protected $primaryKey = 'activity_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'activity_id',
        'title',
        'photo',
        'start_time',
        'end_time',
        'date',
    ];
}
