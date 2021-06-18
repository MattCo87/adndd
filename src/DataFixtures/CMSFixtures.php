<?php

namespace App\DataFixtures;

use App\Entity\CMS;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class CMSFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $cms1 = new CMS();
        $cms1->setTitle('mentions legales');
        $cms1->setContent('<h2> Titre de la première partie </h2> 
                        <p> une ligne de blablabla  It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that</p>
                        <p> ça c\'est une autre ligne de blablaIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that </p> 
                        <p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that </p>');

        $cms1->setType("text");
        $cms1->setIsActive(true);
        $manager->persist($cms1);

        $cms2 = new CMS();
        $cms2->setTitle('conditions d\'utilisation');
        $cms2->setContent('<h2> Titre de la première partie </h2> 
                        <h3> voici un sous-titre </h3>
                        <p> une ligne de blablabla </p>
                        <p> ça c\'est une autre ligne de blabla </p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that
                        <p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that </p>');
        $cms2->setType("text");
        $cms2->setIsActive(true);
        $manager->persist($cms2);

        $cms3 = new CMS();
        $cms3->setTitle('politique de confidentialite');
        $cms3->setContent('<h2> Titre de la première partie </h2> 
                        <h3> voici un sous-titre </h3>
                        <p> une ligne de blablabla </p>
                        <p> ça c\'est une autre ligne de blabla </p> ');
        $cms3->setType("text");
        $cms3->setIsActive(true);
        $manager->persist($cms3);

        $cms4 = new CMS();
        $cms4->setTitle('présentation texte 1');
        $cms4->setContent('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that   ');
        $cms4->setType("text");
        $cms4->setIsActive(true);
        $manager->persist($cms4);

        $cms5 = new CMS();
        $cms5->setTitle('présentation texte 2');
        $cms5->setContent('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that   ');
        $cms5->setType("text");
        $cms5->setIsActive(true);
        $manager->persist($cms5);

        $cms6 = new CMS();
        $cms6->setTitle('présentation texte 3');
        $cms6->setContent('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that   ');
        $cms6->setType("text");
        $cms6->setIsActive(true);
        $manager->persist($cms6);

        $cms7 = new CMS();
        $cms7->setTitle('présentation img 1');
        $cms7->setMedia('presentation2.png');
        $cms7->setType("img");
        $cms7->setIsActive(true);
        $manager->persist($cms7);

        $cms8 = new CMS();
        $cms8->setTitle('présentation img 2');
        $cms8->setMedia('presentation2.png');
        $cms8->setType("img");
        $cms8->setIsActive(true);
        $manager->persist($cms8);

        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }
}
