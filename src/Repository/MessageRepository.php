<?php

namespace App\Repository;

use App\Entity\Message;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

class MessageRepository extends AbstractRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Message::class);
    }

    public function index(): QueryBuilder
    {
        return  $this->createQueryBuilder('m')
            ->orderBy('m.createdAt', 'DESC');
    }
}