<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Get all products in collection
     * @return Collection
     */
    public function index(): Collection
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        try {
            Product::create($this->validateProduct($request->all()));

            return response()->json(['message' => 'Product created successfully']);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to update the product'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): Product
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): JsonResponse
    {
        try {
            $product->update($this->validateProduct($request->all()));

            return response()->json(['message' => 'Product updated successfully']);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        } catch (\Exception) {
            return response()->json(['error' => 'Unable to update the product'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): JsonResponse
    {
        try {
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully']);
        } catch (\Exception) {
            return response()->json(['error' => 'Unable to delete the product'], 500);
        }
    }

    /**
     * @param array $data
     * @return array
     * @throws ValidationException
     */
    private function validateProduct(array $data): array
    {
        return Validator::make($data, [
            'brand_id' => 'sometimes|integer|exists:brands,id',
            'param_id' => 'sometimes|integer|exists:params,id',
            'name' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'barcode' => 'nullable|string',
            'image' => 'nullable|string'
        ])->validated();
    }
}
