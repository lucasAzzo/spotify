<?php

namespace App\Infrastructure\Repositories;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;
use Spotify\Repository\SongRepository;

class DoctrineSongRepository extends EntityRepository implements SongRepository
{
    use PaginatesFromParams;

    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager, $entityManager->getClassMetadata($this->getEntity()));
    }

    private function getEntity(): string
    {
        return self::CLASS_NAME;
    }

    public function list(?string $name, int $page, int $limit): LengthAwarePaginator
    {
        $alias = 'song';
        $queryBuilder = $this->createQueryBuilder($alias);
        $expr = $queryBuilder->expr();

        if ($name) {
            $queryBuilder->where($expr->like("LOWER($alias.name)", 'LOWER(:name)'));
            $queryBuilder->setParameter('name', '%' . str_replace(' ', '%', $name . '%'));
        }

        return $this->paginate(
            $queryBuilder->getQuery(),
            $limit,
            $page
        );
    }
}
