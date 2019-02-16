<?php

declare(strict_types=1);

namespace App\Queries;

use App\Post;
use Sarala\Query\QueryParamBag;
use Sarala\Query\QueryBuilderAbstract;
use Illuminate\Database\Eloquent\Builder;

class PostShowQuery extends QueryBuilderAbstract
{
    use PostQuery;

    protected function init(): Builder
    {
        return Post::where('id', $this->request->route('post')->id);
    }

    protected function include(QueryParamBag $includes)
    {
        $this->mergeCommonInclude($includes);
    }
}
