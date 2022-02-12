<?php

namespace App\DataFixtures;

use App\Entity\TestItem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TestItemFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $now = new \DateTimeImmutable();

        for ($i = 1; $i <= 20000; $i ++) {
            $testItem = new TestItem();
            $testItem->setName(rand(0, 10000));
            $testItem->setCreatedAt($now);
            $manager->persist($testItem);
        }

        $manager->flush();
    }
}
