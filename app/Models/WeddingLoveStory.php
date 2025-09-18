<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class WeddingLoveStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedding_id',
        'title',
        'date',
        'description',
        'image_path',
        'order'
    ];

    protected $casts = [
        'date' => 'date',
        'order' => 'integer'
    ];

    public function wedding()
    {
        return $this->belongsTo(Wedding::class);
    }

    public function getImageUrlAttribute()
    {
        if ($this->image_path) {
            return Storage::url($this->image_path);
        }
        return null;
    }

    protected static function boot()
    {
        parent::boot();
        
        static::deleting(function ($loveStory) {
            if ($loveStory->image_path && Storage::exists($loveStory->image_path)) {
                Storage::delete($loveStory->image_path);
            }
        });
    }
}