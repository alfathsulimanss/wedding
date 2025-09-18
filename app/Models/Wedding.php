<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Wedding extends Model
{
    use HasFactory;
    protected $table = 'wedding';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    // Add this line to append the accessors to JSON output
    protected $appends = ['catin_image_1_url', 'catin_image_2_url'];
    
    protected $fillable = [
        'slug',
        'email', 
        'catin_1',
        'catin_2',
        'bio_catin_1',
        'bio_catin_2',
        'image_catin_1',
        'image_catin_2',
        'ayah_catin1',
        'ibu_catin1',
        'ayah_catin2',
        'ibu_catin2',
        'reception',
        'reception_address',
        'ceremony',
        'ceremony_address',
        'party',
        'party_address',
        'google_maps_url',
        'waze_url',
        'bank_account',
        'bank_name',
        'account_holder',
        'present_counter',
        'not_present_counter'
    ];
    public function banners()
    {
        return $this->hasMany(WeddingBanner::class, 'wedding_id')->orderBy('sort_order');
    }
    public function activeBanners()
    {
        return $this->hasMany(WeddingBanner::class, 'wedding_id')
                    ->orderBy('sort_order');
    }
    
    public function loveStories()
    {
        return $this->hasMany(WeddingLoveStory::class, 'wedding_id')->orderBy('order');
    }

    public function galleries()
    {
        return $this->hasMany(WeddingGallery::class, 'wedding_id')->orderBy('order');
    }
    
    public function getCatinImage1UrlAttribute()
    {
        if ($this->image_catin_1) {
            return Storage::url($this->image_catin_1);
        }
        return null;
    }

    public function getCatinImage2UrlAttribute()
    {
        if ($this->image_catin_2) {
            return Storage::url($this->image_catin_2);
        }
        return null;
    }
}
