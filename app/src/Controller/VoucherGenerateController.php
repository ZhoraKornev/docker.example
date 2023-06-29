<?php

namespace App\Controller;

use App\DTO\VoucherDTO;
use App\Factory\VoucherFactory;
use App\Repository\VoucherRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class VoucherGenerateController extends AbstractController
{

    public function __construct(
        private VoucherFactory $voucherFactory,
        private VoucherRepository $vouchers,
    )
    {
    }

    #[Route('/generate', name: 'app_voucher_generate',methods: 'POST')]
    public function index(Request  $request, SerializerInterface  $serializer, ValidatorInterface $validator): Response
    {
        /** @var VoucherDTO $voucherDTO */
        $voucherDTO = $serializer->deserialize($request->getContent(),VoucherDTO::class,    'json');
        $voucher = $this->voucherFactory->voucherCreate();
        $voucher->setDiscount($voucherDTO->discount);
        $this->vouchers->save($voucher);

        return $this->json(['code' => $voucher->getCode()]);

    }
}
