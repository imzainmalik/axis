<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'description',
        'start_date',
        'end_date',
        'frequency',
        'days_until_due',
        'repeat_forever',
        'recurring',
        'due_date',
        'status',
        'priority',
        'assignees',
        'notify_assignees',
        'related_to',
        'unit'
    ];

    /**
     * Get the Property associated with the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Property(): HasOne
    {
        return $this->hasOne(Property::class, 'id', 'related_to');
    }
}
