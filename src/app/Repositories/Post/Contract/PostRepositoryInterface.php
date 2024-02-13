<?php

namespace App\Repositories\Post\Contract;

use App\DTO\Parse\Post\PostDto;
use Illuminate\Database\Eloquent\Model;

interface PostRepositoryInterface
{
public function create(PostDto $postDto): Model;
}
