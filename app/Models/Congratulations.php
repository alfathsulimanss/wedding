<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Congratulations extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedding_id',
        'invited_id',
        'name',
        'message'
    ];

    public function wedding()
    {
        return $this->belongsTo(Wedding::class);
    }

    public function invitation()
    {
        return $this->belongsTo(InvitationList::class, 'invited_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d M Y, H:i');
    }
}