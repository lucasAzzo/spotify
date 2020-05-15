<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spotify\Contracts\SpotifyClientContract;
use Spotify\DTO\AlbumTracksFromArtistDTO;
use Spotify\DTO\ArtistAlbumsDTO;
use Spotify\Services\Songs;

class StoreSongsFromArtists extends Command
{
    protected $signature = 'songs:store';

    protected $description = 'Store all the songs from a list of artist´s ids';

    public function handle(Songs $songs, SpotifyClientContract $client)
    {
        $token = $this->ask('Insert spotify access token: ');
        $ids = $this->ask('Insert ids (separated by comma): ');
        $ids = explode(',', $ids);

        foreach ($ids as $id) {
            $offset = 0;
            $payload = new ArtistAlbumsDTO($id, $token, $offset);
            $albumsResponse = $client->artistAlbums($payload);
            $albums = $albumsResponse['items'];

            while ($offset * 50 < $albumsResponse['total']) {
                $offset++;
                $payload = new ArtistAlbumsDTO($id, $token, $offset);
                $albumsResponse = $client->artistAlbums($payload);
                $albums += $albumsResponse['items'];
            }

            foreach ($albums as $album) {
                $payload = new AlbumTracksFromArtistDTO($album['id'], $token);
                $tracksResponse = $client->albumTracksFromArtist($payload);
                $tracks = $tracksResponse['tracks']['items'];
                $songs->storeMany($tracks);
            }
        }
    }
}
