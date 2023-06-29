<?php

namespace App\Controller;

use App\DTO\ItemsToCalculateDTO;
use App\DTO\VoucherDTO;
use App\Repository\VoucherRepository;
use Carbon\Carbon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class VoucherCalculateController extends AbstractController
{
    #[Route('/apply', name: 'app_voucher_calculate',methods: 'POST')]
    public function index(Request $request, SerializerInterface $serializer, VoucherRepository $repository): Response
    {
        /** @var ItemsToCalculateDTO $toCalculateDTO */
        $toCalculateDTO = $serializer->deserialize($request->getContent(),ItemsToCalculateDTO::class,    'json');
        $voucher = $repository->findOneBy(['code' => $toCalculateDTO->code]);
        foreach ($toCalculateDTO->items as $item){
            //TODO calculate

        }
        $voucher->setActive(false);
        $voucher->setUsedAt(Carbon::now()->toDateTimeImmutable());
        $repository->save($voucher);



        return $this->json(['code' => $voucher->getCode()]);

    }
}
