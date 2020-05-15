<?php

namespace Spotify\Contracts;

use Spotify\Payload\AlbumTracksFromArtistPayload;
use Spotify\Payload\ArtistAlbumsPayload;
use Spotify\Payload\TokenPayload;

interface SpotifyClientContract
{
    public function token(TokenPayload $payload): array;

    public function artistAlbums(ArtistAlbumsPayload $payload): array;

    public function albumTracksFromArtist(AlbumTracksFromArtistPayload $payload): array;
}
