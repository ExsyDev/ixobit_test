<?php

namespace App\Http\Controllers\API;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SaleController extends Controller
{
    /**
     * Get all sales in collection
     * @return Collection
     */
    public function index(): Collection
    {
        return Sale::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            Sale::create(Validator::make($request->all(), [
                'client_id' => 'required|integer|exists:clients,id',
                'product_id' => 'required|integer|exists:products,id'
            ])->validated());

            return response()->json(['message' => 'Sale created successfully']);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        } catch (\Exception) {
            return response()->json(['error' => 'Unable to create this sale'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale): Sale
    {
        return $sale;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale): JsonResponse
    {
        try {
            $sale->update(Validator::make($request->all(), [
                'client_id' => 'sometimes|integer|exists:clients,id',
                'product_id' => 'sometimes|integer|exists:products,id'
            ])->validated());

            return response()->json(['message' => 'Sale updated successfully']);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        } catch (\Exception) {
            return response()->json(['error' => 'Unable to update this sale'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale): JsonResponse
    {
        try {
            $sale->delete();

            return response()->json(['message' => 'Sale deleted successfully']);
        } catch (\Exception) {
            return response()->json(['error' => 'Unable to delete this sale'], 500);
        }
    }
}
