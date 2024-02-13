<?php

namespace App\Repositories\Post\Contract;

use App\DTO\Parse\Post\PostDto;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class PostRepository implements PostRepositoryInterface
{

    public function create(PostDto $postDto): Model
    {
       return Post::query()->create([
            Post::TAGS => $postDto->getTags(),
            Post::USER => $postDto->getUser()->id,
            Post::BODY => $postDto->getBody(),
            Post::TITLE => $postDto->getTitle(),
            Post::REACTIONS => $postDto->getReaction()
        ]);
    }
}
