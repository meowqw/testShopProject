<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductValidator;
use App\Jobs\NewProductJob;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // все тэги продукта телевизора
        $tags = DB::table('tags')
            ->join('tag_product', 'tags.id', '=', 'tag_product.tag_id')
            ->join('products', 'tag_product.product_id', '=', 'products.id')
            ->where('products.title', '=', 'Телевизор')
            ->pluck('tags.title');

        $products = Product::query()->has('tag_product')
            ->where('category_id', 3)
            ->orWhere(function ($query) {
                $query->where('category_id', 2)
                    ->where('price', 100);
            })->get();
        dd($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return CreateProductValidator|\Illuminate\Http\JsonResponse|Request
     */
    public function store(CreateProductValidator $request)
    {
        Log::channel('custom')->alert('message');
        dispatch(new NewProductJob());
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
