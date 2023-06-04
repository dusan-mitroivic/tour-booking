<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Client;
use App\Models\Product;
use App\Services\BookingService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class BookingController extends Controller
{
    /**
     * Display a list of all the bookings
     */
    public function index(): JsonResponse
    {
        $bookings = Booking::with('client', 'product')->paginate(10);

        // Exclude specific attributes from the response
        $bookings->each(function ($booking) {
            $booking->makeHidden(['client_id', 'product_id']);
        });

        return response()->json([
            'data' => $bookings,
        ]);
    }

    /**
     * Book a product for a client.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services\BookingService  $bookingService
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, BookingService $bookingService): JsonResponse
    {
        try {
            $request->validate([
                'client_id' => 'required|exists:clients,id',
                'product_id' => 'required|exists:products,id',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
        }

        $clientId = $request->input('client_id');
        $productId = $request->input('product_id');

        // Check if the client has already booked the same product
        if ($bookingService->hasClientBookedProduct($clientId, $productId)) {
            return response()->json([
                'message' => 'Booking already exists for this client and product.',
            ], 409);
        }

        // Retrieve the product
        $product = Product::findOrFail($productId);

        // Check if the product is available for booking
        if (!$product->isAvailable()) {
            return response()->json([
                'message' => 'The product is not available for booking.',
            ], 422);
        }

        // Create the booking
        $booking = Booking::create([
            'client_id' => $clientId,
            'product_id' => $productId,
            'booked_on' => now(),
        ]);

        return response()->json([
            'message' => 'Booking created successfully.',
            'data' => $booking,
        ], 201);
    }
}
