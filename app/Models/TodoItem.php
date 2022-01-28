<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodoItem extends Model
{
    use SoftDeletes;
    
    protected $dates = [
        'done_at',
    ];

    protected $fillable = [
        'title',
    ];

    public function todo()
    {
        return $this->belongsTo(Todo::class);
    }
}
