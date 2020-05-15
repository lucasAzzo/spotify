<?php

namespace App\Infrastructure\Repositories;

use Doctrine\ORM\EntityManager;
use Spotify\Repository\PersistRepository;

class DoctrinePersistRepository implements PersistRepository
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(object $entity): void
    {
        $this->persist($entity);
        $this->flush($entity);
    }

    public function remove(object $entity): void
    {
        $this->entityManager->remove($entity);
        $this->flush($entity);
    }

    public function persist(object $entity): void
    {
        $this->entityManager->persist($entity);
    }

    public function flush(?object $entity = null): void
    {
        $this->entityManager->flush($entity);
    }

    public function clear(?object $entity = null): void
    {
        $this->entityManager->clear($entity);
    }

    /**
     * @throws \Throwable
     *
     * @return bool|mixed
     */
    public function transactional(callable $function)
    {
        return $this->entityManager->transactional($function);
    }
}
