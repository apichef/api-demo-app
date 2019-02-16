<?php

declare(strict_types=1);

namespace App\Http\Transformers;

use App\User;
use Sarala\Transformer\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'posts',
    ];

    public function data(User $user): array
    {
        return [
            'id' => (int) $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at->toIso8601String(),
        ];
    }

    public function includePosts(User $user)
    {
        return $this->collection($user->posts, new PostTransformer(), 'posts');
    }
}
