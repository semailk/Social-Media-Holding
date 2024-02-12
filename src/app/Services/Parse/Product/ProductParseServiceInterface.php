<?php

namespace App\Services\Parse\Product;

interface ProductParseServiceInterface
{
public function build(string $productName): void;
}
