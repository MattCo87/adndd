<?php
namespace App\DataFixtures;

use App\Entity\Specialty;
use App\Entity\Equipmenttype;
use App\Entity\Equipment;
use App\Entity\Skill;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class EquipmentFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        // Tribut
        //$skills = array("Alphabétisation", "Art", "Artillerie", "Artisanat", "Bagarre", "Camouflage", "Discrétion", "Escalade", "Marchandage", "Natation", "Navigation", "Observation", "Pistage");
        //$skillvalue = array("50,10,20,30,40,50,10,10,20,30,50,40,20");
        
        $skills = [
            ["Alphabétisation", 50],
            ["Art", 10],
            ["Artillerie", 20],
            ["Artisanat", 30],
        ];

        foreach ($skills as list($a, $b))
        {
            $skill = new Skill();
            $skill->setName($a);
            $skill->setBase($b);            
            //$skill->setName($value);
            //$skill->setBase($skillvalue);
            $manager->persist( $skill );
        }
        unset($a, $b);


        $specialty = new Specialty();
        $specialty->setName('Armes & Boucliers');
        $manager->persist( $specialty );

        $specialty2 = new Specialty();
        $specialty2->setName('Armure');
        $manager->persist( $specialty2 );

        $equipmenttype1 = new Equipmenttype();
        $equipmenttype1->setName('Arme tranchante');
        $manager->persist( $equipmenttype1 );

        $equipmenttype2 = new Equipmenttype();
        $equipmenttype2->setName("Arme d'estoc");
        $manager->persist( $equipmenttype2 );

        $equipmenttype3 = new Equipmenttype();
        $equipmenttype3->setName("Arme de taille et d'estoc");
        $manager->persist( $equipmenttype3 );

        $equipmenttype4 = new Equipmenttype();
        $equipmenttype4->setName('Arme de jet');
        $manager->persist( $equipmenttype4 );

        $equipmenttype5 = new Equipmenttype();
        $equipmenttype5->setName('Arme de corps à corps');
        $manager->persist( $equipmenttype5 );

        $equipmenttype6 = new Equipmenttype();
        $equipmenttype6->setName("Arme d'impact");
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

