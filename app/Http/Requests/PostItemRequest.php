<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Queries\PostShowQuery;
use Sarala\Query\QueryBuilderAbstract;
use Sarala\Http\Requests\ApiRequestAbstract;

class PostItemRequest extends ApiRequestAbstract
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
        return new PostShowQuery($this);
    }
}
