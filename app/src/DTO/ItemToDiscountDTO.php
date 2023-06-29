<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class ItemToDiscountDTO
{
    public function __construct(
        #[Assert\NotNull]
        public int $id,

        #[Assert\NotBlank]
        public int $price,
    )
    {
    }

}