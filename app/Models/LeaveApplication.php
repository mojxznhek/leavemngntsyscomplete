<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeaveApplication extends Model
{
        protected $fillable = [
        'leave_from_date',
         'leave_to_date',
        'user_id',
        'reason',

        'remarks',
        'details',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
