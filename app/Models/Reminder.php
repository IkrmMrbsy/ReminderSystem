<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    protected $table = 'reminders';

    protected $fillable = [
        'title',
        'description',
        'reminder_time',
    ];

    protected $dates = [
        'reminder_time',
    ];

    public function getReminderTimeAttribute($value){
        return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
