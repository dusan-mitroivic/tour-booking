<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'type', 'description', 'capacity'];

    /**
     * Get the bookings of this product
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Check if the product is available for booking
     *
     * @return bool
     */
    public function isAvailable()
    {
        return $this->bookings_count < $this->capacity;
    }
}
