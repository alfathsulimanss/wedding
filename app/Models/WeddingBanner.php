<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingBanner extends Model
{
    use HasFactory;
    
    protected $table = 'banners';
    protected $fillable = [
        'wedding_id', 'image_path', 'sort_order'
    ];
    
    protected $casts = [
        'sort_order' => 'integer'
    ];
    
    public function wedding()
    {
        return $this->belongsTo(Wedding::class, 'wedding_id');
    }
    
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }
}