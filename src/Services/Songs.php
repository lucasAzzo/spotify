<?php

namespace Spotify\Services;

use Spotify\DTO\SongDTO;
use Spotify\Entities\Song;
use Spotify\Repository\PersistRepository;

class Songs
{
    private PersistRepository $persistRepository;

    public function __construct(PersistRepository $persistRepository)
    {
        $this->persistRepository = $persistRepository;
    }

    public function storeMany(array $items): void
    {
        foreach ($items as $item) {
            $song = new SongDTO($item);

            $entity = new Song($song);
            $this->persistRepository->save($entity);
        }
    }
}
