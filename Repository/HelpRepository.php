<?php

namespace Lle\HelpBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Lle\HelpBundle\Entity\Help;

/**
 * @method Help|null find($id, $lockMode = null, $lockVersion = null)
 * @method Help|null findOneBy(array $criteria, array $orderBy = null)
 * @method Help[]    findAll()
 * @method Help[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HelpRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Help::class);
    }
}
