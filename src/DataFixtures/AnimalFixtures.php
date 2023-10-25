<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $a1 = new Animal();
         $a1->setNom("Chien")
            ->setDescription("Chien mechant")
            ->setImage("chien.png");
         $manager->persist($a1);

         $a2 = new Animal();
         $a2->setNom("Cochon")
            ->setDescription("tres sale ")
            ->setImage("cochon.png");
        $manager->persist($a2);

        $a3 = new Animal();
        $a3->setNom("Serpent")
            ->setDescription("Serpent venimeux et mechant")
            ->setImage("serpent.png");
        $manager->persist($a3);

        $a4 = new Animal();
        $a4->setNom("Chat")
            ->setDescription("Tres gentil")
            ->setImage("chat.png");
        $manager->persist($a4);

        $manager->flush();
    }
}
