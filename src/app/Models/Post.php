<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    public const USER = 'user_id',
        TITLE = 'title',
        BODY = 'body',
        TAGS = 'tags',
        REACTIONS = 'reactions';

    protected $fillable = [
        self::TITLE,
        self::BODY,
        self::TAGS,
        self::REACTIONS,
        self::USER
    ];

    protected $casts = [
        self::TAGS => 'array'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
