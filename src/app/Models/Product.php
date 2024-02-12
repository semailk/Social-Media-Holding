<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    public const TITLE = 'title',
        DESCRIPTION = 'description',
        STOCK = 'stock',
        IMAGES = 'images',
        BRAND = 'brand_id',
        CATEGORY = 'category_id',
        DISCOUNT_PERCENTAGE = 'discountPercentage',
        RATING = 'rating',
        THUMBNAIL = 'thumbnail',
        PRICE = 'price';

    protected $fillable = [
      self::TITLE ,
      self::DESCRIPTION ,
      self::STOCK ,
      self::IMAGES ,
      self::BRAND ,
      self::CATEGORY ,
      self::DISCOUNT_PERCENTAGE ,
      self::RATING ,
      self::THUMBNAIL ,
      self::PRICE
    ];

    protected $casts = [
      self::IMAGES => 'array'
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
