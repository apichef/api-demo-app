<?php

declare(strict_types=1);

namespace App\Http\Transformers;

use App\Comment;
use Sarala\Transformer\TransformerAbstract;

class CommentTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'author',
    ];

    public function data(Comment $comment): array
    {
        return [
            'id' => (int) $comment->id,
            'body' => $comment->body,
            'created_at' => $comment->created_at->toIso8601String(),
        ];
    }

    public function includeAuthor(Comment $comment)
    {
        return $this->item($comment->user, new UserTransformer(), 'users');
    }
}
