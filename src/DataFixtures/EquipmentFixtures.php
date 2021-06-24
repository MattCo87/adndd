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

        // Compétences        
        $skills = [
            ["Alphabétisation", 50],
            ["Art", 10],
            ["Artillerie", 20],
            ["Artisanat", 50],
            ["Artillerie", 40],
            ["Bagarre", 30],
            ["Camouflage", 20],
            ["Discrétion", 10],
            ["Escalade", 20],
            ["Marchandage", 50],
            ["Natation", 20],
            ["Navigation", 30],
            ["Observation", 10],
            ["Pistage", 40],
        ];

        foreach ($skills as list($a, $b))
        {
            $skill = new Skill();
            $skill->setName($a);
            $skill->setBase($b);            
            $manager->persist( $skill );
        }
        unset($a, $b);

        // Les spécialités
        $specialty = new Specialty();
        $specialty->setName('Armes & Boucliers');
        $manager->persist( $specialty );

        $specialty2 = new Specialty();
        $specialty2->setName('Armure');
        $manager->persist( $specialty2 );

        // Les types d'équipements

        $equipmenttypes = array('Arme tranchante', 
                                "Arme d'estoc", 
                                "Arme de taille et d'estoc", 
                                'Arme de jet', 
                                'Arme de corps à corps', 
                                "Arme d'impact", 
                                "Arme de Fortune"
                            );
        $i = 0;        
        foreach ($equipmenttypes as &$value) {
            $i++;
            $equipmenttype[$i] = new Equipmenttype();
            $equipmenttype[$i]->setName($value);
            $manager->persist( $equipmenttype[$i] );
        }
        unset($value);


        // Equipment

        $equipments = [
            ["Bagarre", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty, $equipmenttype[5]],
            ["Assomoir", 25, "1D8 + 3 + MD", 2, 15, 10, 40, 2, $specialty, $equipmenttype[6]],
            ["Arc de Chasse", 10, "2D6 + 1 + 1/2 MD", 1, 20, 10, 10, 3, $specialty, $equipmenttype[4]],
        ];

        foreach ($equipments as list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j))
        {
            $equipment = new Equipment();
            $equipment->setName($a)
            ->setBase($b)
            ->setDamage($c)
            ->setHands($d)
            ->setHealth($e)
            ->setRanged($f)
            ->setArmorPoints($g)
            ->setSkillModifyer($h)
            ->setIdSpecialty($i)
            ->setIdEquipmenttype($j);          
            $manager->persist( $equipment );
        }
        unset($a, $b, $c, $d, $e, $f, $g, $h, $i, $j);


        // Compétences / Equipement



        $manager->flush();
    }

    public function getOrder()
    {
        return 6;
    }
}

