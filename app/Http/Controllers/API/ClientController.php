<?php

namespace App\Http\Controllers\API;

use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ClientController extends Controller
{
    /**
     * Get all clients in collection
     * @return Collection
     */
    public function index(): Collection
    {
        return Client::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            Client::create(Validator::make($request->all(), [
                'name' => 'required|string',
                'last_name' => 'required|string'
            ])->validated());

            return response()->json(['message' => 'Client created successfully']);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        } catch (\Exception) {
            return response()->json(['error' => 'Unable to create this client'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client): Client
    {
        return $client;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client): JsonResponse
    {
        try {
            $client->update(Validator::make($request->all(), [
                'name' => 'sometimes|string',
                'last_name' => 'sometimes|string'
            ])->validated());

            return response()->json(['message' => 'Client updated successfully']);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to update this client'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client): JsonResponse
    {
        try {
            $client->delete();

            return response()->json(['message' => 'Brand deleted successfully']);
        } catch (\Exception) {
            return response()->json(['error' => 'Unable to delete this brand'], 500);
        }
    }
}
