<?php

namespace App\Services\Parse\Product;

use App\DTO\Parse\Post\PostDto;
use App\DTO\Parse\Product\ProductDto;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ProductParseService implements ProductParseServiceInterface
{
    private string $url;
    private string $model;
    public function __construct(string $model)
    {
        $this->url = match ($model) {
            'users' => 'https://dummyjson.com/products',
            'posts' => 'https://dummyjson.com/posts',
            'products' => 'https://dummyjson.com/products',
            'recipes' => 'https://dummyjson.com/recipes'
        };

        $this->model = $model;
    }

    public function build(?string $productName = null): void
    {
        $contents = $this->getContent();

        /** @var array $content */
        foreach ($contents as $content) {
            switch ($this->model) {
                case 'products':
                    $this->productSave($content, $productName);
                    break;
                case 'posts':
                    $this->postSave($content);
                    break;
            }
        }
    }

    private function postSave(array $post): void
    {
        /** @var User $user */
        $user = User::query()->firstOrCreate(['id' => $post['userId']], [
            'password' => Hash::make(Str::random()),
            'name' => Str::random(),
            'email' => 'test.' . Str::random() . '@mail.ru'
        ]);

        $postDTO = new PostDto(
            $post['tags'],
            $post['body'],
            $user,
            $post['reactions'],
            $post['title']
        );

        Post::query()->create([
            Post::TAGS => $postDTO->getTags(),
            Post::USER => $user->id,
            Post::BODY => $postDTO->getBody(),
            Post::TITLE => $postDTO->getTitle(),
            Post::REACTIONS => $postDTO->getReaction()
        ]);
    }

    private function productSave(array $product, ?string $productName = null): void
    {
        /** @var Brand $brand */
        $brand = Brand::query()->firstOrCreate(
            [Brand::NAME => $product['brand']],
            [Brand::NAME => $product['brand']]
        );

        /** @var Category $category */
        $category = Category::query()->firstOrCreate(
            [Category::NAME => $product['category']],
            [Category::NAME => $product['category']]
        );

        if (Str::contains($product['title'], $productName)) {
            $productDto = new ProductDto(
                $product['title'],
                $product['description'],
                $product['stock'],
                $product['images'],
                $brand,
                $category,
                $product['discountPercentage'],
                $product['rating'],
                $product['thumbnail'],
                $product['price']
            );

            Product::query()->create([
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

    public function getContent(): array
    {
        $response = json_decode(Http::get($this->url)->body(), true);

        /** @var int $total */
        $total = $response['total'];
        /** @var int $limit */
        $limit = $response['limit'];
        $result = [];
        $result = array_merge($response[$this->model], $result);

        if ($total > $limit) {
            $total = $total - $limit;
            $iterations = ceil($total / $limit);
            for ($i = 1; $i <= $iterations; $i++) {
                $response = json_decode(Http::get($this->url, ['skip' => $limit * $i, 'limit' => $limit])->body(), true);
                $result = array_merge($response[$this->model], $result);
            }
        }

        return $result;
    }
}
