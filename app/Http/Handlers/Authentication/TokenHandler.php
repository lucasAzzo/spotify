<?php

namespace App\Http\Handlers\Authentication;

use App\Http\Handlers\Handler;
use App\Http\Handlers\Request\TokenRequest;
use App\Http\Utils\RouteDefiner;
use Illuminate\Routing\Router;
use Spotify\Contracts\SpotifyClientContract;

class TokenHandler extends Handler implements RouteDefiner
{
    public function __invoke(TokenRequest $request, SpotifyClientContract $client)
    {
        $request->validate();

        $response = $client->token($request);

        return responder()
            ->success($response)
            ->respond();
    }

    public static function defineRoute(Router $router): void
    {
        $router->post('api/spotify/token', self::class)
            ->name(self::class);
    }
}
