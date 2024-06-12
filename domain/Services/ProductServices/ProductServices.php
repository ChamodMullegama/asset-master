<?php
namespace domain\Services\ProductServices;

use App\Models\Product;
use App\Models\ProductImage;
use domain\Facades\ImageFacade\ImageFacade;

class ProductServices
{
    protected $product, $product_image;

    public function __construct()
    {
        $this->product = new Product();
        $this->product_image = new ProductImage();

    }

    public function get($product_id)
    {
        return $this->product->find($product_id);
    }

    public function all()
    {
        return $this->product->all();

    }

    public function store($data)
    {

        $this->product->create($data);

    }

    public function delete($product_id)
    {
        $product = $this->product->find($product_id);
        $product->delete();

    }

    public function status($product_id)
    {
        $product = $this->product->find($product_id);
        if ($product->status == 1) {
            $product->status = 0;
        } else {
            $product->status = 1;
        }
        $product->save();
    }

    public function update($data, $product_id)
    {
        $product = $this->product->find($product_id);
        // $product->update($this->edit($product, $data));
        return $product->update($this->edit($product, $data));
    }

    protected function edit(Product $product, array $data)
    {

        return array_merge($product->toArray(), $data);
    }

    public function uploadImages($data)
    {
        if (isset($data['image'])) {
            $image = ImageFacade::store($data['image']);
            $data['image_id'] = $image->id;
        }
        $this->product_image->create($data);
    }

    public function imageStatus($image_id)
    {
        $product_image = $this->product_image->find($image_id);

        if ($product_image->is_primary == 0) {
            $product_id = $product_image->product_id;
            $this->product_image->where('product_id', $product_id)->where('is_primary', 1)->update(['is_primary' => 0]);
            $product_image->is_primary = 1;
        } else {
            $product_image->is_primary = 0;
        }

        $product_image->save();
    }

    public function deleteImage($image_id)
    {
        $product_image = $this->product_image->find($image_id);
    
        if ($product_image && $product_image->is_primary != 1) {
            $product_image->delete();
        }
    }
    

}
