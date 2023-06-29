<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class VoucherDTO
{
    public function __construct(
        #[Assert\GreaterThan(1)]
        public int $discount,
    )
    {
    }

}