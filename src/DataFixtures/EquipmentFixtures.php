<?php
namespace App\DataFixtures;

use App\Entity\Specialty;
use App\Entity\Equipmenttype;
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

        $equipmenttype1 = new Equipmenttype();
        $equipmenttype1->setName('arme tranchante');

        $manager->persist( $equipmenttype1 );

        $equipmenttype2 = new Equipmenttype();
        $equipmenttype2->setName("arme d'estoc");

        $manager->persist( $equipmenttype2 );

        $equipmenttype3 = new Equipmenttype();
        $equipmenttype3->setName("arme de taille et d'estoc");

        $manager->persist( $equipmenttype3 );

        $equipmenttype4 = new Equipmenttype();
        $equipmenttype4->setName('arme de jet');

        $manager->persist( $equipmenttype4 );

        $equipmenttype5 = new Equipmenttype();
        $equipmenttype5->setName('arme de corps à corps');

        $manager->persist( $equipmenttype5 );

        $equipmenttype6 = new Equipmenttype();
        $equipmenttype6->setName("arme d'impact");

        $manager->persist( $equipmenttype6 );

        // Equipment
        $equipment1 = new Equipment();
        $equipment1->setName('Hâche')
        ->setBase('50')
        ->setDamage('30')
        ->setHands('10')
        ->setHealth('25')
        ->setRanged('15')
        ->setArmorPoints('20')
        ->setSkillModifyer('5')
        ->setIdSpecialty($specialty)
        ->setIdEquipmenttype($equipmenttype5);
        $manager->persist( $equipment1 );

        $equipment2 = new Equipment();
        $equipment2->setName('Fronde')
        ->setBase('25')
        ->setDamage('15')
        ->setHands('30')
        ->setHealth('50')
        ->setRanged('30')
        ->setArmorPoints('5')
        ->setSkillModifyer('10')
        ->setIdSpecialty($specialty)
        ->setIdEquipmenttype($equipmenttype4);
        $manager->persist( $equipment2 );

        $manager->flush();
    }

    public function getOrder()
    {
        return 6;
    }
}

