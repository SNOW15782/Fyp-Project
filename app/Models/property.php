<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'bedrooms',
        'bathrooms',
        'area_sqft',
        'type',
        'property_status',
        'property_booking',
        'image',
        'price',
        'location',
        'landlord_id',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function landlord()
    {
        return $this->belongsTo(User::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
