<?php

namespace App\Http\Controllers\Api;

use App\Enumerations\ApiEnumeration;
use App\Http\Resources\Product\ProductResource;
use App\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     * @OA\Get(
     *     path="/api/products",
     *     tags={"products"},
     *     summary="List all products",
     *     @OA\Parameter (
     *          name="limit",
     *          in="query",
     *          description="How many items to return to one time",
     *          required=false
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="A paged array of products",
     *     )
     * )
     */
    public function index(Request $request)
    {
//        return Product::all();
//        return response()->json(Product::all(),200);
//        return response(Product::all(), 200);
//        return response(Product::paginate(3), 200);

        $offset = $request->has('offset') ? $request->query('offset') : 0;
        $limit = $request->has('limit') ? $request->query('limit') : 10;

        $products = Product::query()->with('categories');

        if ($request->has('q')) {
            $products->where('name', 'like', '%' . $request->query('q') . '%');
        }

        if ($request->has('sortBy')) {
            $products->orderBy($request->query('sortBy'), $request->query('sort', 'DESC'));
        }

        $data = $products->offset($offset)->limit($limit)->get();

        return $this->apiResponse($data, 'Products fetched successfully', JsonResponse::HTTP_OK);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $inputs = $request->all();

        $product = Product::create($inputs);

        return $this->apiResponse($product, 'Product added successfully', JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            return $this->apiResponse($product, 'Product fetched successfully', JsonResponse::HTTP_OK);
        }

        return $this->apiResponse($product, 'No such as product', JsonResponse::HTTP_NOT_FOUND, ApiEnumeration::ERROR);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return JsonResponse
     */
    public function update(Request $request, Product $product)
    {
        $inputs = $request->all();

        $product->update($inputs);

        return $this->apiResponse($product, 'Product edited successfully', JsonResponse::HTTP_OK);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return $this->apiResponse($product, 'Product deleted successfully', JsonResponse::HTTP_OK);

    }

    public function custom1()
    {
        return Product::selectRaw('id as product_id, name as product_name')
            ->orderBy('created_at', 'DESC')
            ->take(10)
            ->get();
    }

    public function custom2()
    {
        $products = Product::orderBy('created_at', 'DESC')
            ->take(10)
            ->get();

        $mapped = $products->map(function ($product) {

            return [
                '_id' => $product['id'],
                'product_name' => $product['name'],
                'product_price' => $product['price'] * 1.05
            ];

        });

        return $mapped->all();
    }

    public function custom3()
    {
        $products = Product::paginate(10);

        return ProductResource::collection($products);
    }

    public function custom4()
    {
        $products = Product::all();

        return ProductResource::collection($products);
    }

    public function listWithCategories()
    {
        $products = Product::with('categories')->get();

        return ProductResource::collection($products);
    }
}
