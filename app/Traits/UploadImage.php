<?php

namespace App\Traits;

use App\Models\Product;

trait UploadImage
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Product  $product
     * @param  array  $images
     * @return array
     */
    protected function uploadImage(Product $product, array $images)
    {
        $productImages = [];

        foreach ($images as $index => $image) {
            $productImages[] = $product->images()->create([
                'path' => $image->storeAs('images', date('YmdHis') . $index . '.' . $image->extension())
            ]);
        }

        return $productImages;
    }
}
