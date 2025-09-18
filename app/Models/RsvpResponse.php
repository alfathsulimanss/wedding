<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RsvpResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedding_id',
        'invited_id',
        'name',
        'attendance',
        'guest_count',
        'attending_event'
    ];

    public function wedding()
    {
        return $this->belongsTo(Wedding::class);
    }

    public function invitation()
    {
        return $this->belongsTo(InvitationList::class, 'invited_id');
    }
}
