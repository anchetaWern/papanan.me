<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RestaurantAmenity;

class Business extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'opening_hours' => 'json'
    ];

    public function amenities() {
        return $this->hasOne(RestaurantAmenity::class, 'business_id');
    }
}
