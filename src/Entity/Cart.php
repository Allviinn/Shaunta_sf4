<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CartRepository")
 */
class Cart
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $items;

    /**
     * @ORM\Column(type="datetime")
     */
    private $expire_date;

    /**
     * @ORM\Column(type="integer")
     */
    private $paid;

    /**
     * @ORM\Column(type="integer")
     */
    private $shipped;

    public function getId()
    {
        return $this->id;
    }

    public function getItems(): ?string
    {
        return $this->items;
    }

    public function setItems(string $items): self
    {
        $this->items = $items;

        return $this;
    }

    public function getExpireDate(): ?\DateTimeInterface
    {
        return $this->expire_date;
    }

    public function setExpireDate(\DateTimeInterface $expire_date): self
    {
        $this->expire_date = $expire_date;

        return $this;
    }

    public function getPaid(): ?int
    {
        return $this->paid;
    }

    public function setPaid(int $paid): self
    {
        $this->paid = $paid;

        return $this;
    }

    public function getShipped(): ?int
    {
        return $this->shipped;
    }

    public function setShipped(int $shipped): self
    {
        $this->shipped = $shipped;

        return $this;
    }
}
