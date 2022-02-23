<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'todo_list_id', 'status'];

    public const NOT_STARTED = 'not_started';
    public const PENDING = 'pending';
    public const STARTED = 'started';



    public function todo_list():BelongsTo{
        return $this->belongsTo(TodoList::class);
    }
}
