<?php

namespace App\DTO\Parse\Post;

use App\Models\User;

class PostDto
{
    private string $title;
    private string $body;
    private User $user;
    private int $reaction;
    private array $tags;

    public function __construct(
        array $tags,
        string $body,
        User   $user,
        int    $reaction,
        string $title
    )
    {
        $this->tags = $tags;
        $this->body = $body;
        $this->user = $user;
        $this->reaction = $reaction;
        $this->title = $title;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getReaction(): int
    {
        return $this->reaction;
    }
}
