<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'sender_user_id',
        'receiver_user_id',
        'description',
        'remark',
        'level',
    ];


    /**
     * Get the user that owns the transactions.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_user_id');
    }    
}
