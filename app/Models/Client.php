<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'passport_num', 'gender'];

    /**
     * Get the bookings made by this client.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Check if the client has already booked the given product.
     *
     * @param  int  $productId
     * @return bool
     */
    public function hasBookedProduct($productId)
    {
        return $this->bookings()
            ->where('product_id', $productId)
            ->exists();
    }

}
