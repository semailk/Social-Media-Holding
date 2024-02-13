<?php

namespace App\Repositories\Product\Contract;

use App\DTO\Parse\Product\ProductDto;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ProductRepository implements ProductRepositoryInterface
{

    public function create(ProductDto $productDto): Model
    {
        return Product::query()->create([
            Product::RATING => $productDto->getRating(),
            Product::IMAGES => $productDto->getImages(),
            Product::PRICE => $productDto->getPrice(),
            Product::THUMBNAIL => $productDto->getThumbnail(),
            Product::DISCOUNT_PERCENTAGE => $productDto->getDiscountPercentage(),
            Product::STOCK => $productDto->getStock(),
            Product::CATEGORY => $productDto->getCategory()->id,
            Product::BRAND => $productDto->getBrand()->id,
            Product::DESCRIPTION => $productDto->getDescription(),
            Product::TITLE => $productDto->getTitle()
        ]);
    }
}
