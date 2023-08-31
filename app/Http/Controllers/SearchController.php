<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Meilisearch\Endpoints\Indexes;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $posts = Post::search(
            query: $request->get('search'),
            callback: function (Indexes $meilisearch, string $query, array $options) {
                $searchParams['limit'] = 1000;

                return $meilisearch->search(
                    query: $query,
                    searchParams: $searchParams,
                    options: $options,
                );
            },
        )->get();

        return response()->json(data: PostResource::collection($posts), status: 200);
    }
}
