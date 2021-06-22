<?php
namespace App\DataFixtures;

use App\Entity\Specialty;
use App\Entity\Equipment;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class EquipmentFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $specialty = new Specialty();
        $specialty->setName('UneSpecialty');

        $manager->persist( $specialty );

        $equipment1 = new Equipment();
        $equipment1->setName('arme tranchante');

        $manager->persist( $equipment1 );






        $manager->flush();
    }

    public function getOrder()
    {
        return 6;
    }
}

