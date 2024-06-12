<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataResource;
use App\Models\Product;
use App\Models\ProductImage;
use domain\Facades\ProductFacade\ProductFacade;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        return Inertia::render('Product/index');
    }

    public function all()
    {
        return ProductFacade::all();
    }

    public function store(Request $request)
    {
        return ProductFacade::store($request->all());

    }

    public function delete($product_id)
    {
        return ProductFacade::delete($product_id);
    }

    public function status($product_id)
    {
        return ProductFacade::status($product_id);
    }

    public function get(Request $request)
    {
        return ProductFacade::get($request->product_id);

    }

    public function update(Request $request, $product_id)
    {
        return ProductFacade::update($request->all(), $product_id);
    }

    public function edit(int $product_id)
    {
        $response['productId'] = $product_id;
        return Inertia::render('Product/edit', $response);
    }

    public function uploadImages(Request $request, $product_id)
    {
        $data['image'] = $request->file('image');
        $data['product_id'] = $product_id;
        return ProductFacade::uploadImages($data);
    }

    public function getImages($product_id)
    {
        $product_images = ProductImage::where('product_id', $product_id)->get();
        return DataResource::collection($product_images);
    }

    public function imageStatus($image_id)
    {
        return ProductFacade::imageStatus($image_id);
    }

    public function imageDelete($image_id)
    {
     
        return  ProductFacade::deleteImage($image_id);
  

    }
    

}
