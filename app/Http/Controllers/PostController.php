<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostItemRequest;
use App\Http\Transformers\PostTransformer;
use Sarala\Http\Controllers\BaseController;
use App\Http\Requests\PostCollectionRequest;

class PostController extends BaseController
{
    public function index(PostCollectionRequest $request)
    {
        $data = $request->builder()->fetch();

        return $this->responseCollection($data, new PostTransformer(), 'posts');
    }

    public function show(Post $post, PostItemRequest $request)
    {
        $data = $request->builder()->fetchFirst();

        return $this->responseItem($data, new PostTransformer(), 'posts');
    }
}
