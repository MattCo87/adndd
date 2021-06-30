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

        // Les spécialités

        $specialties = array(
                            'Cuisinier', 
                            'Bûcheron', 
                            'Policier', 
                            'Archer', 
                            'Chevalier', 
                            'Artilleur', 
                            'Commerçant', 
                            "En recherche d'emploi", 
                            'Ninja', 
                            'Sumotori', 
                            'Yakuza', 
                            'Lancier', 
                            'Pompier', 
                            'Mitrailleur',
                            'Arbalétrier',
                            'Cowboy',
                            'Agriculteur',
                            'Mousquetaire',
                            );
        $i = 0;        
        foreach ($specialties as &$value) {
            $i++;
            $specialty[$i] = new Specialty();
            $specialty[$i]->setName($value);
            $manager->persist( $specialty[$i] );
        }
        unset($value);

        // Les types d'équipements

        $equipmenttypes = array( 
                                'Arme à énergie',
                                'Arme à feu',
                                'Arme tranchante', 
                                "Arme d'estoc", 
                                "Arme de taille et d'estoc", 
                                'Arme de jet', 
                                'Arme de corps à corps', 
                                "Arme d'impact", 
                                "Arme de Fortune",
                                'Arme lourde',
                                'Art martiaux',
                                'Armure',
                                'Artillerie',
                                'Bouclier',
                                'Lutte',
                                'Machine lourde', 
                                'Marchandises', 
                                'Arme à distance',                              
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
            ["Bagarre", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[11], $equipmenttype[7]],
            ["Assommoir", 25, "1D8 + 3 + MD", 2, 15, 10, 40, 2, $specialty[2], $equipmenttype[8]],
            ["Arc de Chasse", 10, "2D6 + 1 + 1/2 MD", 1, 20, 10, 10, 3, $specialty[4], $equipmenttype[18]],
            ["Lance-roquette", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[6], $equipmenttype[13]],
            ["Catapulte", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[6], $equipmenttype[13]],
            ["Canon", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[6], $equipmenttype[13]],
            ["Engin de siège", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[6], $equipmenttype[13]],
            ["Pistolet à énergie", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[3], $equipmenttype[1]],
            ["Fusil à énergie", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[3], $equipmenttype[1]],
            ["Mitrailleuse", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[14], $equipmenttype[2]],
            ["Pistolet", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[3], $equipmenttype[2]],
            ["Revolver", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[16], $equipmenttype[2]],
            ["Fusil", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[8], $equipmenttype[2]],
            ["Fusil à pompe", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[11], $equipmenttype[2]],
            ["Fusil-mitrailleur", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[14], $equipmenttype[2]],
            ["Presse hydraulique", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[17], $equipmenttype[16]],
            ["Engin agricole", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[17], $equipmenttype[16]],
            ["Bazooka", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[6], $equipmenttype[10]],
            ["Mitrailleuse lourde", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[14], $equipmenttype[10]],
            ["Judo", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[9], $equipmenttype[11]],
            ["Karaté", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[10], $equipmenttype[11]],
            ["Capoeira", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[9], $equipmenttype[11]],
            ["Hache", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[2], $equipmenttype[3]],
            ["Gourdin", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[3], $equipmenttype[8]],
            ["Dague", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[11], $equipmenttype[7]],
            ["Fléau", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[5], $equipmenttype[8]],
            ["Marteau", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[7], $equipmenttype[8]],
            ["Masse", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[5], $equipmenttype[8]],
            ["Lance", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[12], $equipmenttype[7]],
            ["Bâton", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[3], $equipmenttype[7]],
            ["Epee", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[5], $equipmenttype[3]],
            ["Arc", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[4], $equipmenttype[18]],
            ["Arbalète", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[15], $equipmenttype[18]],
            ["Bouclier", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[5], $equipmenttype[14]],
            ["Bouclier d'énergie", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[3], $equipmenttype[14]],
            ["Targe", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[5], $equipmenttype[14]],
            ["Ecu", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[5], $equipmenttype[14]],
            ["Fleuret", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[18], $equipmenttype[4]],
            ["Sabre", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[18], $equipmenttype[5]],
            ["Poêle à frire", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[1], $equipmenttype[9]],
            ["Livre", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[1], $equipmenttype[9]],
            ["Armure de plate", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[5], $equipmenttype[12]],
            ["Armure de cuir", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[3], $equipmenttype[12]],
            ["Collier", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[7], $equipmenttype[17]],
            ["Mortier", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[6], $equipmenttype[10]],
            ["Matraque télescopique", 25, "1D3 + MD", 1, 50, 10, 20, 5, $specialty[3], $equipmenttype[8]],
        ];

        $z = 0;  
        foreach ($equipments as list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j))
        {
            $z++;
            $equipment[$z] = new Equipment();
            $equipment[$z]->setName($a)
            ->setBase($b)
            ->setDamage($c)
            ->setHands($d)
            ->setHealth($e)
            ->setRanged($f)
            ->setArmorPoints($g)
            ->setSkillModifyer($h)
            ->setIdSpecialty($i)
            ->setIdEquipmenttype($j);          
            $manager->persist( $equipment[$z] );
        }
        unset($a, $b, $c, $d, $e, $f, $g, $h, $i, $j);


        // Compétences        
        $skills = [
            ["Alphabétisation", 50, $equipment[41]],
            ["Art", 10, $equipment[17]],
            ["Artillerie", 20, $equipment[6]],
            ["Artisanat", 50, $equipment[44]],
            ["Bagarre", 30, $equipment[1]],
            ["Camouflage", 20, $equipment[41]],
            ["Discrétion", 10, $equipment[42]],
            ["Escalade", 20, $equipment[17]],
            ["Marchandage", 50, $equipment[44]],
            ["Natation", 20, $equipment[42]],
        ];

        foreach ($skills as list($a, $b, $c))
        {
            $skill = new Skill();
            $skill->setName($a);
            $skill->setBase($b);       
            $skill->addEquipment($c);     
            $manager->persist( $skill );
        }
        unset($a, $b, $c);

        $manager->flush();
    }

    public function getOrder()
    {
        return 7;
    }
}

