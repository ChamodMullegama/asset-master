<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'status',
    ];

    const STATUS = [
        'unavailable' => 0,
        'available' => 1,
    ];

    public function scopeAvailable()
    {
        return $this->where('status', self::STATUS['available']);
      
    }

    public function scopeUnavailable()
    {
        return $this->where('status', self::STATUS['unavailable']);
    }
}
