<?php

namespace App\Http\Handlers\Song;

use App\Http\Handlers\Handler;
use App\Http\Transformers\SongTransformer;
use App\Http\Utils\RouteDefiner;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Spotify\Repository\SongRepository;

class ListSongHandler extends Handler implements RouteDefiner
{
    public function __invoke(Request $request, SongRepository $songRepository)
    {
        $name = $request->input('name');
        $page = $request->input('page', 1);
        $limit = $request->input('limit', 10);

        $items = $songRepository->list($name, $page, $limit);

        return responder()
            ->success($items, SongTransformer::class)
            ->respond();
    }

    public static function defineRoute(Router $router): void
    {
        $router->get('api/songs', self::class)
            ->name(self::class);
    }
}
