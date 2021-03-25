<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantAmenity extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'has_parking',
        'has_outdoor_dining',
        'has_event_accommodation',
        'has_wifi',
        'accepts_credit_card',
        'has_food_delivery',
    ];
}
