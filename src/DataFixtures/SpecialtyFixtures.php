<?php
namespace App\DataFixtures;

use App\Entity\Specialty;
use App\Entity\Equipment;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class SpecialtyFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $specialty = new Specialty();
        $specialty->setName('UneSpecialty');

        $manager->persist( $specialty );








        $manager->flush();
    }

    public function getOrder()
    {
        return 6;
    }
}

