<?php

namespace App\Services;

use App\Http\Requests\ProductUpdateRequest;
use App\Models\Products;
use Illuminate\Http\Response;

class ProductService
{
    /**
     * delete a product
     *
     * @param Products $product
     * @return Response
     */
    public function delete(Products $product) : Response
    {
        return response($product->delete());
    }

    /**
     * update a product
     *
     * @param Products $product
     * @param ProductUpdateRequest $request
     * @return Response
     */
    public function update(Products $product, ProductUpdateRequest $request) : Response
    {
        $data = $request->get('data');

        $product->product_name = $data['product_name'];
        $product->brand = $data['brand'];
        $product->style = $data['style'];
        return response($product->save());
    }
}
