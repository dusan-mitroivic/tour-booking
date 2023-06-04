<?php

namespace App\Services;

use App\Models\Booking;

class BookingService
{
    /**
     * Check if the client has already booked the product.
     *
     * @param  int  $clientId
     * @param  int  $productId
     * @return bool
     */
    public function hasClientBookedProduct(int $clientId, int $productId): bool
    {
        return Booking::where('client_id', $clientId)
            ->where('product_id', $productId)
            ->exists();
    }
}
