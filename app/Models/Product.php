<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'category',
        'type',
        'price',
        'quantity',
        'description',
        'status',
    ];

    const STATUS = [
        'unavailable' => 0,
        'available' => 1,
    ];
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    
    public function scopeAvailable()
    {
        return $this->where('status', self::STATUS['available']);
      
    }

    public function scopeUnavailable()
    {
        return $this->where('status', self::STATUS['unavailable']);
    }
}
