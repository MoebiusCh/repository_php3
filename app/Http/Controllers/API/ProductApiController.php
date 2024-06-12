<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = Product::all();
            return response()->json([
                'status' => 'success',
                'message' => 'Dữ liệu được lấy thành công',
                'data' => ProductResource::collection($products),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage(),
                'data' => null,
            ], Response::HTTP_INTERNAL_SERVER_ERROR ); // code 500
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'nullable|string',
                'price' => 'required|numeric',
                'sale' => 'integer|between:0,1',
                'description' => 'nullable|string',
                'detail' => 'nullable|string',
                'status' => 'integer|between:0,1',
                'is_hot' => 'integer|between:0,1',
                'sale_rate' => 'integer',
                'category_id' => 'required|exists:categories,id',
            ]);
            $product = Product::create($validated);
            return response()->json([
                'status' => 'success',
                'message' => 'Thêm thành công',
                'data' => new ProductResource($product),
            ], Response::HTTP_CREATED); // code 201
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage(),
                'data' => null,
            ], Response::HTTP_BAD_REQUEST); // code 400
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        try {
            return response()->json([
                'status' => 'success',
                'message' => 'Lấy dữ liệu thành công',
                'data' => new ProductResource($product),
            ], Response::HTTP_OK); // code 200
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage(),
                'data' => null,
            ], Response::HTTP_BAD_REQUEST); // code 400
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                // 'image' => 'nullable|string',
                // 'price' => 'required|numeric',
                // 'sale' => 'integer|between:0,1',
                // 'description' => 'nullable|string',
                // 'detail' => 'nullable|string',
                // 'status' => 'integer|between:0,1',
                // 'is_hot' => 'integer|between:0,1',
                // 'sale_rate' => 'integer',
                // 'category_id' => 'required|exists:categories,id',
            ]);
            $product->update($validated);
            return response()->json([
                'status' => 'success',
                'message' => 'Cập nhật thành công',
                'data' => new ProductResource($product),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage(),
                'data' => null,
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Xóa thành công',
                'data' => null,
            ], Response::HTTP_NO_CONTENT); // 204
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage(),
                'data' => null,
            ], 500);
        }
    }
}
