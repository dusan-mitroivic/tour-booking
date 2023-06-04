<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['client_id', 'product_id', 'booked_on'];

    /**
     * Get client who booked this
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get product which is booked
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
