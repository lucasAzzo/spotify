<?php

namespace App\Http\Integrations;

use Illuminate\Support\Facades\Http;
use Spotify\Contracts\SpotifyClientContract;
use Spotify\Payload\AlbumTracksFromArtistPayload;
use Spotify\Payload\ArtistAlbumsPayload;
use Spotify\Payload\TokenPayload;

class SpotifyClient implements SpotifyClientContract
{
    public function token(TokenPayload $payload): array
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        $request = Http::withHeaders($headers)->baseUrl('https://accounts.spotify.com/api/');

        $response = $request->send('POST', 'token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => $payload->clientId(),
                'client_secret' => $payload->clientSecret(),
            ],
        ]);

        return $response->json();
    }

    public function artistAlbums(ArtistAlbumsPayload $payload): array
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Bearer '. $payload->token(),
        ];

        $request = Http::withHeaders($headers)->baseUrl('https://api.spotify.com/v1/artists/');

        $response = $request->send('GET', $payload->artistId() . '/albums', [
            'query' => [
                'limit' => 50,
                'offset' => 1,
            ],
        ]);

        return $response->json();
    }

    public function albumTracksFromArtist(AlbumTracksFromArtistPayload $payload): array
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Bearer '. $payload->token(),
        ];

        $request = Http::withHeaders($headers)->baseUrl('https://api.spotify.com/v1/albums/');

        $response = $request->send('GET', $payload->albumId(), [
            'query' => [
                'limit' => 50,
                'offset' => 1,
            ],
        ]);

        return $response->json();
    }
}
