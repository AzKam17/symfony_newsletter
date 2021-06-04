<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MailTemplates extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $arr = [
            [
                "lib" => "Test",
                "path" => 'email/test1.html.twig',
                "createdAt" => new \DateTime(),
                "data" => ['name' => '','op' => '']
            ]
        ];

        foreach ($arr as $a)
        {
            $temp = (new \App\Entity\MailTemplates())
                ->setLib($a["lib"])
                ->setPath($a["path"])
                ->setCreatedAt(($a["createdAt"]))
                ->setData($a['data']);

            $manager->persist($temp);
        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
