<?php

declare(strict_types=1);

namespace App\Http\Transformers;

use App\Tag;
use Sarala\Transformer\TransformerAbstract;

class TagTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'posts',
    ];

    public function data(Tag $tag): array
    {
        return [
            'id' => (int) $tag->id,
            'name' => $tag->name,
        ];
    }

    public function includePosts(Tag $tag)
    {
        return $this->collection($tag->posts, new PostTransformer(), 'posts');
    }
}
