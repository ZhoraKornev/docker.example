<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class ItemsToCalculateDTO
{
    public function __construct(
        /**
         * Assert/NotNull()
         * @var ItemToDiscountDTO[]
         */
        public array  $items,

        #[Assert\NotBlank]
        public string $code,
    )
    {
    }

}