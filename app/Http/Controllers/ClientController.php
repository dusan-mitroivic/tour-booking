<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    /**
     * Display a listing of the clients.
     */
    public function index(): JsonResponse
    {
        $clients = Client::with('bookings')->paginate(10);

        return response()->json([
            'data' => $clients,
        ]);
    }

    /**
     * Create a new client.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:clients',
            'passport_num' => 'required',
            'gender' => 'required',
        ]);

        $client = Client::create($request->all());

        return response()->json([
            'message' => 'Client created successfully.',
            'data' => $client,
        ], 201);
    }
}
