<?php
namespace App\Service;

use App\Entity\Depense;
use Doctrine\ORM\EntityManagerInterface;

class DepenseService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getAllDepenses(): array
    {
        return $this->entityManager->getRepository(Depense::class)->findAll();
    }

    public function createDepense(array $data): Depense
    {
        $depense = new Depense();
        $depense->setTitle($data['title']);
        $depense->setAmount($data['amount']);
        $depense->setDate(new \DateTime($data['date']));
        $depense->setCategory($data['category']);

        $this->entityManager->persist($depense);
        $this->entityManager->flush();

        return $depense;
    }

    public function updateDepense(Depense $depense, array $data): Depense
    {
        $depense->setTitle($data['title']);
        $depense->setAmount($data['amount']);
        $depense->setDate(new \DateTime($data['date']));
        $depense->setCategory($data['category']);

        $this->entityManager->flush();

        return $depense;
    }

    public function deleteDepense(Depense $depense): void
    {
        $this->entityManager->remove($depense);
        $this->entityManager->flush();
    }

    public function findDepenseById(int $id): ?Depense
    {
        return $this->entityManager->getRepository(Depense::class)->find($id);
    }
}