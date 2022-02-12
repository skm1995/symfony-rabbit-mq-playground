<?php

namespace App\Controller;

use App\Entity\TestItem;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestItemController extends AbstractController
{
    public function showList(ManagerRegistry $managerRegistry)
    {
        $testItemRepository = $managerRegistry->getRepository(TestItem::class);
        $items = $testItemRepository->findAllCachedQuery(60)->getArrayResult();

        return $this->render('test_item/list.html.twig', [
            'items' => $items
        ]);
    }
}
