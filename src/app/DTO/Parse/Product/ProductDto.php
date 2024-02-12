<?php

namespace App\DTO\Parse\Product;

use App\Models\Brand;
use App\Models\Category;

class ProductDto
{
    private string $title;
    private string $description;
    private int $stock;
    private array $images;
    private Brand $brand;
    private Category $category;
    private float $discountPercentage;
    private float $rating;
    private string $thumbnail;
    private float $price;

    public function __construct(
        string $title,
        string $description,
        int $stock,
        array $images,
        Brand $brand,
        Category $category,
        float $discountPercentage,
        float $rating,
        string $thumbnail,
        float $price
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->stock = $stock;
        $this->images = $images;
        $this->brand = $brand;
        $this->category = $category;
        $this->discountPercentage = $discountPercentage;
        $this->rating = $rating;
        $this->thumbnail = $thumbnail;
        $this->price = $price;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    public function getDiscountPercentage(): float
    {
        return $this->discountPercentage;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function getBrand(): Brand
    {
        return $this->brand;
    }

    public function getImages(): array
    {
        return $this->images;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
