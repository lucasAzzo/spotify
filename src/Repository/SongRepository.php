<?php

namespace Spotify\Repository;

use Doctrine\Common\Persistence\ObjectRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Spotify\Entities\Song;

interface SongRepository extends ObjectRepository
{
    public function list(?string $name, int $page, int $limit): LengthAwarePaginator;

    public const CLASS_NAME = Song::class;
}
