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

    const status = [
        'unavailable' => 0,
        'available' => 1,
    ];
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getStatusStringAttribute()
    {
        return array_search($this->status, self::status);
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', self::status['available']);
    }

    public function scopeUnavailable($query)
    {
        return $query->where('status', self::status['unavailable']);
    }

}
