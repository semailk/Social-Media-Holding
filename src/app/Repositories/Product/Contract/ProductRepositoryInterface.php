<?php

namespace App\Repositories\Product\Contract;

use App\DTO\Parse\Product\ProductDto;
use Illuminate\Database\Eloquent\Model;

interface ProductRepositoryInterface
{
public function create(ProductDto $productDto): Model;
}
