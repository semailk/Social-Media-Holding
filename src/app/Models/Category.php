<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public const NAME = 'name';

    protected $fillable = [
        self::NAME
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
