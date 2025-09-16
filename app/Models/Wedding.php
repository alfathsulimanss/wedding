<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    use HasFactory;
    protected $table = 'wedding';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'catin_1', 'catin_2', 'bio_catin_1', 'bio_catin_2', 'ayah_catin1', 'ibu_catin1', 'ayah_catin2', 'ibu_catin2',
        'reception', 'reception_address', 'ceremony', 'ceremony_address', 'party', 'party_address',
    ];
}
