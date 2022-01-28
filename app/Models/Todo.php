<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function items()
    {
        return $this->hasMany(TodoItem::class);
    }

    public function belongsToUser()
    {
        if (! Auth::user()) {
            return false;
        }
        
        if (Auth::user()->is_admin) {
            return true;
        }
            
        return $this->user_id == Auth::user()->id;
    }
}
