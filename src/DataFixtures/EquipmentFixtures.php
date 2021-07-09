<?php
namespace App\DataFixtures;

use App\Entity\Specialty;
use App\Entity\Character;
use App\Entity\CharacterSkill;
use App\Entity\Equipmenttype;
use App\Entity\Equipment;
use App\Entity\Skill;
use App\Entity\CharacterCharacteristic;


use App\Entity\Characteristic;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class EquipmentFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

/************************************************************************************************* */
/****************************               CARKAN LE JEUNE             ************************** */

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
        ->setBirthplace('Terres désolées et humides')
        ->setPurse('80');
        $manager->persist( $Carkan );

/************************************************************************************************* */
/************************************************************************************************* */

/************************************************************************************************* */
/****************************               TABITA OF NESS             ************************** */

        $Tabita = new Character();
        $Tabita->setName('Tabita Of Ness')
        ->setAvatar('tabita.png')
        ->setGender('F')
        ->setGuidingHand('Gaucher')
        ->setSize('')
        ->setWeight('')
        ->setDescription('')
        ->setAge('22')
        ->setDistinctive('')
        ->setStory('')
        ->setIsPremade(true)
        ->setLoyalty('loi')
        ->setHomeplace('')
        ->setBirthplace('')
        ->setPurse('570');
        $manager->persist( $Tabita );

/************************************************************************************************* */
/************************************************************************************************* */

/************************************************************************************************* */
/****************************               BORT OF PIKARAYD             ************************** */

        $Bort = new Character();
        $Bort->setName('Bort Of Pikarayd')
        ->setAvatar('bort.png')
        ->setGender('M')
        ->setGuidingHand('Gaucher')
        ->setSize('')
        ->setWeight('')
        ->setDescription('')
        ->setAge('21')
        ->setDistinctive('')
        ->setStory('')
        ->setIsPremade(true)
        ->setLoyalty('loi')
        ->setHomeplace('')
        ->setBirthplace('')
        ->setPurse('220');
        $manager->persist( $Bort );

/************************************************************************************************* */
/************************************************************************************************* */


        // Les caractéristiques du jeu Elric
       
        $elriccharacteristics = [
            ["Modificateur aux dégâts", "DMG", 0],
            ["Jet d'Idée", "JIDE", 0],
            ["Jet de Chance", "JLUCK", 0],
            ["Jet de Charisme", "JCHAR", 0],
            ["Jet de Dexterité", "JDEX", 0],
            ["Force", "FOR", 1],
            ["Constitution", "CON", 1],
            ["Taille", "TAI", 1],
            ["Intelligence", "INT", 1],
            ["Pouvoir", "POU", 1],
            ["Dexterité", "DEX", 1],
            ["Apparence", "APP", 1],
            ["Point de vie", "HP", 1],
        ];

        $i = 0;
        foreach ($elriccharacteristics as list($a, $b, $c))
        {
            $characteristic = new Characteristic();
            $characteristic->setName($a);
            $characteristic->setShortName($b); 
            $characteristic->setBase($c); 
            $tabcharacteristic[$i] = $characteristic;      
            $manager->persist( $characteristic );
            $i++;
        }
        unset($a, $b, $c, $i);

        $tabgamers = array($Carkan, $Tabita, $Bort);
        $tabcarkan = array("0", "0", "0", "0", "0", "15", "12", "14", "17", "16", "12", "11", "13");
        $tabtabita = array("0", "0", "0", "0", "0", "13", "16", "13", "15", "14", "18", "11", "15");
        $tabbort = array("0", "0", "0", "0", "0", "13", "14", "15", "14", "17", "13", "13", "15");

        $i = 0;
        foreach ($tabgamers as $key)
        {            
            $j = 0;
            foreach ($tabcharacteristic as $value)
            {
                
                $charactercharacteristic = new CharacterCharacteristic();
                $charactercharacteristic->setIdCharacter($key);
                $charactercharacteristic->setIdCharacteristic($value);

                switch ($i) {
                    case 0:
                        $charactercharacteristic->setValeur($tabcarkan[$j]); 
                        break;
                    case 1:
                        $charactercharacteristic->setValeur($tabtabita[$j]);
                        break;
                    case 2:
                        $charactercharacteristic->setValeur($tabbort[$j]); 
                        break;
                }            
                
                $j++;    
                $manager->persist( $charactercharacteristic );
            }
            $i++;

        }

/************************************************************************************************* */


        // Les Compétences de Carkan        
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


/************************************************************************************************* */
/************************************************************************************************************** */
/************************************************************************************************** */














        // Les caractéristiques
       
        $characteristics = [           
            ["Agilité", "AGI", 50],
            ["Endurance", "END", 50],
            ["Concentration", "FOCUS", 35],
            ["Habileté", "HAB", 75],
            ["Sagesse", "SAG", 5],
            ["Éducation", "EDU", 85],
            ["Mouvement", "MVT", 15],
            ["Points de magie", "MAG", 15],
            ["Points de santé mentale", "MENT", 1],
            ["Manipulation", "MANIP", 25],
            ["Perception", "PER", 15],
            ["Spiritualité", "SPIRIT", 115],
        ];

        foreach ($characteristics as list($a, $b, $c))
        {
            $characteristic = new Characteristic();
            $characteristic->setName($a);
            $characteristic->setShortName($b); 
            $characteristic->setBase($c);           
            $manager->persist( $characteristic );
        }
        unset($a, $b, $c);

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
                            'Marin'
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
            ["Bagarre", 25, "1D3 + MD"],
            ["Assommoir", 25, "1D8 + 3 + MD"],
            ["Arc de Chasse", 10, "2D6 + 1 + 1/2 MD"],
            ["Lance-roquette", 25, "1D3 + MD"],
            ["Catapulte", 25, "1D3 + MD"],
            ["Canon", 25, "1D3 + MD"],
            ["Engin de siège", 25, "1D3 + MD"],
            ["Pistolet à énergie", 25, "1D3 + MD"],
            ["Fusil à énergie", 25, "1D3 + MD"],
            ["Armure de plate", 25, "1D3 + MD"],
            ["Armure de cuir", 25, "1D3 + MD"],
            ["Collier", 25, "1D3 + MD"],
            ["Mortier", 25, "1D3 + MD"],
            ["Matraque télescopique", 25, "1D3 + MD"],
        ];

        $z = 0;  
        foreach ($equipments as list($a, $b, $c))
        {
            $z++;
            $equipment[$z] = new Equipment();
            $equipment[$z]->setName($a)
            ->setBase($b)
            ->setDamage($c);        
            $manager->persist( $equipment[$z] );
        }
        unset($a, $b, $c);


        // Compétences        
        $skills = [
            ["Alphabétisation", 50],
            ["Art", 10],
            ["Artillerie", 20],
            ["Bagarre", 30],
            ["Camouflage", 20],
            ["Discrétion", 10],
            ["Escalade", 20],
            ["Marchandage", 50],
            ["Natation", 20],
        ];

        foreach ($skills as list($a, $b))
        {
            $skill = new Skill();
            $skill->setName($a);
            $skill->setBase($b);       

            $manager->persist( $skill );
        }
        unset($a, $b);


        $manager->flush();
    }

    public function getOrder()
    {
        return 7;
    }
}

