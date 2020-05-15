<?php

namespace App\Http\Handlers\Song;

use App\Http\Handlers\Handler;
use App\Http\Transformers\SongTransformer;
use App\Http\Utils\RouteDefiner;
use Illuminate\Routing\Router;
use Spotify\Repository\SongRepository;

class ShowSongHandler extends Handler implements RouteDefiner
{
    public function __invoke(int $id, SongRepository $songRepository)
    {
        $song = $songRepository->find($id);

        return responder()
            ->success($song, SongTransformer::class)
            ->respond();
    }

    public static function defineRoute(Router $router): void
    {
        $router->get('api/songs/{id}', self::class)
            ->name(self::class);
    }
}
