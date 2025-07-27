<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminders extends Model
{
    use HasFactory;

    protected $table = 'reminders';
    protected $primaryKey = 'reminder_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'reminder_id',
        'task_id',
        'remind_at',
        'note',
    ];
}
