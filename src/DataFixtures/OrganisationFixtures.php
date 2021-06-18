<?php

namespace App\DataFixtures;

use App\Entity\FAQ;
use App\Entity\Organisation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class OrganisationFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $orga = new Organisation();
        $orga->setName('Ah ! D & Dédé')
            ->setSlogan('Association de jeux de rôles à Guéret (23)')
            ->setContactEmail('bonjour@dynaidev.com')
            ->setTelephone('+33 1 23 45 67 89')
            ->setAdress1('22 avenue de la Sénatorerie')
            ->setZipcode('23000')
            ->setCity('Guéret')
            ->setCountry('France')
            ->setFacebook('https://www.facebook.com')
            ->setInstagram('https://www.instagram.com');
        $manager->persist($orga);

        $manager->flush();
    }

    public function getOrder()
    {
        return 5;
    }
}

