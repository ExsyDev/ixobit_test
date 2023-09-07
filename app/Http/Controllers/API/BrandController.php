<?php

namespace App\Http\Controllers\API;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BrandController extends Controller
{
    /**
     * Get all brands in collection
     * @return Collection
     */
    public function index(): Collection
    {
        return Brand::all();
    }

    /**
     * Store a newly created resource in storage.
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        try {
            Brand::create(Validator::make($request->all(), [
                'name' => 'required|string'
            ])->validated());

            return response()->json(['message' => 'Brand created successfully']);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        } catch (\Exception) {
            return response()->json(['error' => 'Unable to create this brand'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand): Brand
    {
        return $brand;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand): JsonResponse
    {
        try {
            $brand->update(Validator::make($request->all(), [
                'name' => 'required|string'
            ])->validated());

            return response()->json(['message' => 'Brand updated successfully']);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to update this brand'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand) : JsonResponse
    {
        try {
            $brand->delete();

            return response()->json(['message' => 'Brand deleted successfully']);
        } catch (\Exception) {
            return response()->json(['error' => 'Unable to delete this brand'], 500);
        }
    }
}
