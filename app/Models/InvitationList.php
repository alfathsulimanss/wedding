<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitationList extends Model
{
    use HasFactory;
    protected $table = 'invitation_list';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'wedding_id', 'name', 'whatsapp_number',
    ];

    public function wedding()
    {
        return $this->hasOne(Wedding::class, 'id', 'wedding_id');
    }
}
