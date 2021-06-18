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

        $cms1->setType("legal");
        $cms1->setIsActive(true);
        $manager->persist($cms1);

        $cms2 = new CMS();
        $cms2->setTitle('conditions d\'utilisation');
        $cms2->setContent('<h2> Titre de la première partie </h2> 
                        <h3> voici un sous-titre </h3>
                        <p> une ligne de blablabla </p>
                        <p> ça c\'est une autre ligne de blabla It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that</p> 
                        <p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that </p>');
        $cms2->setType("legal");
        $cms2->setIsActive(true);
        $manager->persist($cms2);

        $cms3 = new CMS();
        $cms3->setTitle('politique de confidentialite');
        $cms3->setContent('<h2> Titre de la première partie </h2> 
                        <h3> voici un sous-titre </h3>
                        <p> une ligne de blablabla </p>
                        <p> ça c\'est une autre ligne de blabla </p> ');
        $cms3->setType("legal");
        $cms3->setIsActive(true);
        $manager->persist($cms3);

        $cms4 = new CMS();
        $cms4->setTitle('présentation');
        $cms4->setContent('<p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that </p>
                            <img src="/assets/images/presentation/presentation1.jpg" alt="image de presentation 1"/>
                            <p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that </p>
                            <img src="/assets/images/presentation/presentation2.jpg" alt="image de presentation 2"/>
                            <p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that </p>');
        $cms4->setType("about");
        $cms4->setIsActive(true);
        $manager->persist($cms4);



        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }
}
