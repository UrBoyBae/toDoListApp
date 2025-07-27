<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tasks extends Model
{
    use HasFactory;
    
    protected $table = 'tasks';
    protected $primaryKey = 'task_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'task_id',
        'list_id',
        'tag_id',
        'title',
        'detail_task',
        'status',
    ];

    public function lists(): BelongsTo
    {
        return $this->belongsTo(Lists::class, 'list_id', 'list_id');
    }

    public function tags(): BelongsTo
    {
        return $this->belongsTo(Tags::class, 'tag_id', 'tag_id');
    }

    public function reminders(): HasOne
    {
        return $this->hasOne(Reminders::class, 'task_id', 'task_id');
    }
}
