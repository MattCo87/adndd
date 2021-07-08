<?php
namespace App\DataFixtures;

use App\Entity\Specialty;
use App\Entity\Character;
use App\Entity\CharacterSkill;
use App\Entity\Equipmenttype;
use App\Entity\Equipment;
use App\Entity\Skill;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class CarkanFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        // Description du personnage prétiré Carkan le jeune
        $Carkan = new Character();
        $Carkan->setName('Carkan le jeune')
        ->setAvatar('carkan.png')
        ->setGender('M')
        ->setGuidingHand('droitier')
        ->setSize('2m00')
        ->setWeight('80kg')
        ->setDescription('Grand, fin, calme, un peu renfrogné quelques fois')
        ->setAge('24')
        ->setDistinctive('Paumettes proéminentes; Yeux sombres et creux, Tatouages tribaux')
        ->setStory('Il fut embarqué sur un bâteau le long des côtes des Terres désolées et humides. Il a fuit les meurtriers de sa famille. Quand il sera prêt, il retournera dans sa contrée pour assouvir sa vengeance.')
        ->setIsPremade(true)
        ->setLoyalty('loi')
        ->setHomeplace('Sur un bâteau')
        ->setBirthplace('Terres désolées et humides');
        $manager->persist( $Carkan );

        // Compétences        
        $skills = [
            ["Artisanat", 1],
            ["Déguisement", 1],
            ["Évitement", 1],
            ["Perception", 1],
            ["Écoute", 1],
            ["Monde naturel", 1],
            ["Navigation", 1],
            ["Autres langages (courant)", 1],
            ["Langue maternelle", 1],
            ["Premiers soins", 1],
            ["Crochetage", 1],
            ["Réparation et bricolage", 1],
            ["Chevaucher", 1],
            ["Naviguer", 1],
            ["Écriture", 1],
            ["Pistage", 1],
            ["Piègeage", 1],
        ];

        $i = 0;
        foreach ($skills as list($a, $b))
        {
            $skill = new Skill();
            $skill->setName($a);
            $skill->setBase($b); 
            $tabskill[$i] = $skill;  
            $i++;    
            $manager->persist( $skill );
        }
        unset($a, $b, $i);

        // Compétences + Valeur pour Carkan le jeune
        $i = 0;
        $skillvalue = array("45", "35", "24", "35", "50", "45", "30", "10", "85", "50", "15", "48", "75", "35", "20", "74", "25");
        foreach ($tabskill as $value)
        {
            $characterskill = new CharacterSkill();
            $characterskill->setIdCharacter($Carkan);
            $characterskill->setIdSkill($value);       
            $characterskill->setValeur($skillvalue[$i]);  
            $i++;   
            $manager->persist( $characterskill );   
        }  
        unset($i);
        $manager->flush();

    }

    public function getOrder()
    {
        return 10;
    }
}