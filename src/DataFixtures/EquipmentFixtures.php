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
        ->setLoyalty('Chaos 0 - Balance 0 - Loi 3')
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
        ->setLoyalty('Chaos 0 - Balance 0 - Loi 3')
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
        ->setLoyalty('Chaos 3 - Balance 0 - Loi 0')
        ->setHomeplace('')
        ->setBirthplace('')
        ->setPurse('220');
        $manager->persist( $Bort );

/************************************************************************************************* */
/************************************************************************************************* */

/************************************************************************************************* */
/****************************               RATHEK             ************************** */

$Rathek = new Character();
$Rathek->setName('Rathek')
->setAvatar('rathek.png')
->setGender('M')
->setGuidingHand('Droitier')
->setSize('')
->setWeight('')
->setDescription('')
->setAge('25')
->setDistinctive('')
->setStory('')
->setIsPremade(true)
->setLoyalty('Chaos 0 - Balance 3 - Loi 0')
->setHomeplace('')
->setBirthplace('')
->setPurse('2100');
$manager->persist( $Rathek );

/************************************************************************************************* */
/************************************************************************************************* */

/************************************************************************************************* */
/****************************               VREEN             ************************** */

$Vreen = new Character();
$Vreen->setName('Vreen')
->setAvatar('vreen.png')
->setGender('F')
->setGuidingHand('Droitier')
->setSize('')
->setWeight('')
->setDescription('')
->setAge('19')
->setDistinctive('')
->setStory('')
->setIsPremade(true)
->setLoyalty('Chaos 0 - Balance 3 - Loi 0')
->setHomeplace('')
->setBirthplace('')
->setPurse('660');
$manager->persist( $Vreen );

/************************************************************************************************* */
/************************************************************************************************* */

/************************************************************************************************* */
/****************************               KEVI             ************************** */

$Kevi = new Character();
$Kevi->setName('Kevi')
->setAvatar('kevi.png')
->setGender('F')
->setGuidingHand('Droitier')
->setSize('')
->setWeight('')
->setDescription('')
->setAge('20')
->setDistinctive('')
->setStory('')
->setIsPremade(true)
->setLoyalty('Chaos 3 - Balance 0 - Loi 0')
->setHomeplace('')
->setBirthplace('')
->setPurse('160');
$manager->persist( $Kevi );

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

/************************************************************************************************* */
/****************************               INITIALISATION DES PRETIRES ELRIC             ************************** */

        $tabgamers = array($Carkan, $Tabita, $Bort, $Rathek, $Vreen, $Kevi);
        $tabcarkan = array("0", "0", "0", "0", "0", "15", "12", "14", "17", "16", "12", "11", "13");
        $tabtabita = array("0", "0", "0", "0", "0", "13", "16", "13", "15", "14", "18", "11", "15");
        $tabbort = array("0", "0", "0", "0", "0", "13", "14", "15", "14", "17", "13", "13", "15");
        $tabrathek = array("0", "0", "0", "0", "0", "15", "15", "13", "16", "13", "15", "13", "14");
        $tabvreen = array("0", "0", "0", "0", "0", "13", "14", "15", "15", "13", "15", "13", "15");
        $tabkevi = array("0", "0", "0", "0", "0", "16", "12", "14", "13", "16", "15", "17", "13");

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
                    case 3:
                        $charactercharacteristic->setValeur($tabrathek[$j]); 
                        break;
                    case 4:
                        $charactercharacteristic->setValeur($tabvreen[$j]); 
                        break;
                    case 5:
                        $charactercharacteristic->setValeur($tabkevi[$j]); 
                        break;
                }            
                
                $j++;    
                $manager->persist( $charactercharacteristic );
            }
            $i++;

        }

        // Les autres caractéristiques de Chaosium
       
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
/************************************************************************************************* */
/************************************************************************************************* */
/************************************************************************************************* */


        // Les Compétences du jeu Elric        
        $skills = [
            ["Esquive", 1],
            ["Réparation et bricolage", 1],
            ["Déguisement", 1],
            ["Perception", 1],
            ["Langue maternelle (courant)", 1],
            ["Monde naturel", 1],
            ["Chevaucher", 1],
            ["Aperçu", 1],
            ["Négociation", 1],
            ["Parler vite", 1],
            ["Art oratoire", 1],
            ["Recherche", 1],
            ["Crochetage", 1],
            ["Cacher", 1],
            ["Artisanat", 1],
            ["Écoute", 1],
            ["Navigation", 1],
            ["Premiers soins", 1],
            ["Naviguer", 1],
            ["Écriture", 1],
            ["Grimper", 1],
            ["Dissimuler objet", 1],
            ["Autres langages (Melnibonéan)", 1],
            ["Autres langages (courant)", 1],
            ["Langue maternelle (Mong)", 1],
            ["Pistage", 1],
            ["Piégeage", 1],
            ["Art (Torture)", 1],
            ["Saut", 1],
            ["Déplacement discret", 1],
            ["Flairer parfum", 1],
            ["Nager", 1],
            ["Lancer", 1],
            ["Art (Courtoisie)", 1],
            ["Jeune Royaume", 1],
            ["Potions", 1],
            ["Art (Conversation)", 1],
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


/************************************************************************************************* */
/****************************               INITIALISATION DES PRETIRES ELRIC             ************************** */

$tabgamers = array($Carkan, $Tabita, $Bort, $Rathek, $Vreen, $Kevi);
$tabcarkan = array("24", "48", "35", "35", "0", "45", "75", "0", "0", "0", "0", "0", "15", "0", "45", "50", "30", "50", "35", "20", "0", "0", "0", "10", "85", "74", "25", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0");
$tabtabita = array("86", "72", "0", "0", "75", "0", "101", "55", "0", "0", "0", "0", "0", "0", "0", "45", "30", "0", "35", "0", "60", "0", "0", "0", "0", "0", "0", "35", "45", "50", "35", "45", "45", "0", "0", "0", "0");
$tabbort = array("56", "52", "95", "35", "90", "45", "0", "35", "65", "95", "35", "40", "25", "40", "75", "0", "0", "0", "0", "0", "0", "75", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0");
$tabrathek = array("30", "60", "35", "95", "90", "85", "55", "0", "95", "35", "25", "40", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "20", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "25", "25", "0", "0");
$tabvreen = array("30", "60", "35", "35", "75", "45", "0", "95", "14", "65", "25", "40", "25", "40", "0", "0", "0", "101", "0", "20", "0", "45", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "69", "0");
$tabkevi = array("30", "60", "95", "35", "85", "0", "55", "35", "35", "35", "25", "101", "0", "60", "0", "0", "0", "0", "0", "0", "89", "0", "20", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "25");

$i = 0;
foreach ($tabgamers as $key)
{            
    $j = 0;
    foreach ($tabskill as $value)
    {
        
        $characterskill = new CharacterSkill();
        $characterskill->setIdCharacter($key);
        $characterskill->setIdSkill($value);
        $ok =  0;

        switch ($i) {
            case 0:
                if( $tabcarkan[$j] != '0'){
                    $characterskill->setValeur($tabcarkan[$j]); 
                    $ok = 1;
                }
                break;
            case 1:
                if( $tabtabita[$j] != '0'){
                    $characterskill->setValeur($tabtabita[$j]); 
                    $ok = 1;
                }
                break;
            case 2:
                if( $tabbort[$j] != '0'){
                    $characterskill->setValeur($tabbort[$j]); 
                    $ok = 1;
                }                
                break;
            case 3:
                if( $tabrathek[$j] != '0'){
                    $characterskill->setValeur($tabrathek[$j]); 
                    $ok = 1;
                }     
                break;
            case 4:
                if( $tabvreen[$j] != '0'){
                    $characterskill->setValeur($tabvreen[$j]); 
                    $ok = 1;
                }    
                break;
            case 5:
                if( $tabkevi[$j] != '0'){
                    $characterskill->setValeur($tabkevi[$j]); 
                    $ok = 1;
                } 
                break;
        }            
    
        $j++;    
        if( $ok == 1){
            $manager->persist( $characterskill );
        }
    }
    $i++;

}

/*        // Compétences + Valeur pour Carkan le jeune
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

        $manager->flush();
    }

    public function getOrder()
    {
        return 7;
    }
}

