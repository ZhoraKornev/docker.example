<?php

namespace App\Entity;

use App\Repository\VoucherRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoucherRepository::class)]
class Voucher
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(type: Types::INTEGER)]
    private ?int $discount = 0;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $validDue = null;

    #[ORM\Column(length: 50)]
    private ?string $status = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $usedAt = null;

    #[ORM\Column(length: 200)]
    private ?string $code = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValidDue(): ?\DateTimeInterface
    {
        return $this->validDue;
    }

    public function setValidDue(?\DateTimeInterface $validDue): static
    {
        $this->validDue = $validDue;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }

    public function getUsedAt(): ?\DateTimeImmutable
    {
        return $this->usedAt;
    }

    public function setUsedAt(?\DateTimeImmutable $usedAt): static
    {
        $this->usedAt = $usedAt;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    /**
     * @param int|null $discount
     */
    public function setDiscount(?int $discount): void
    {
        $this->discount = $discount;
    }
}
