<?php

// src/Entity/Client.php
namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Collection;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    /**
     * @var \Doctrine\Common\Collections\Collection<int, Book>
     */
    #[ORM\OneToMany(targetEntity: Book::class, mappedBy: 'client')]
    private \Doctrine\Common\Collections\Collection $borrow;

    public function __construct()
    {
        $this->borrow = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection<int, Book>
     */
    public function getBorrow(): \Doctrine\Common\Collections\Collection
    {
        return $this->borrow;
    }

    public function addBorrow(Book $borrow): static
    {
        if (!$this->borrow->contains($borrow)) {
            $this->borrow->add($borrow);
            $borrow->setClient($this);
        }

        return $this;
    }

    public function removeBorrow(Book $borrow): static
    {
        if ($this->borrow->removeElement($borrow)) {
            // set the owning side to null (unless already changed)
            if ($borrow->getClient() === $this) {
                $borrow->setClient(null);
            }
        }

        return $this;
    }

   public function getBorrowedBooksCount()
{
    return $this->borrow->count();
}






}