<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use  HasFactory, Notifiable,SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'type',
        'status',
        'start_date',
        'due_date',
        'estimate',
        'actual'
    ];
    
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee');
    }
}
