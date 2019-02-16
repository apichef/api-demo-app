<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Queries\PostCollectionQuery;
use Sarala\Query\QueryBuilderAbstract;
use Sarala\Http\Requests\ApiRequestAbstract;

class PostCollectionRequest extends ApiRequestAbstract
{
    public function authorize(): bool
    {
        return true;
    }

    public function allowedIncludes(): array
    {
        return [
            'tags',
            'comments.author',
            'tags_count',
            'comments_count',
            'author',
        ];
    }

    public function builder(): QueryBuilderAbstract
    {
        return new PostCollectionQuery($this);
    }
}
