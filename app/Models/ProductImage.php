<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'image_id','is_primary'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->image->name ?? 'N/A';
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
    }
}
