<?php

namespace App\Factory;

use App\Entity\Voucher;
use App\Repository\VoucherRepository;
use Doctrine\ORM\EntityManagerInterface;

class VoucherFactory
{

    public function __construct(private CodeGenerator $generator)
    {
    }

    public function voucherCreate(): Voucher
    {
        $voucher = new Voucher();
        $voucher->setCode($this->generator->generate());
        $voucher->setActive(true);

        return $voucher;
    }

}