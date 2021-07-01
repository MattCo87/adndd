<?php
namespace App\DataFixtures;

use App\Entity\Spell;
use App\Entity\Spelltype;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class SpellFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        // Type de sort        
        $spelltypes = [
            ["Sorts de combat"],
            ["Sorts d'action"],
            ["Sorts de l'Etre"],
            ["Sorts du Monde Invisible"],
            ["Sorts de caractéristique"],
            ["Sorts des élèments"],
            ["Sorts d'intensification"],
        ];

        foreach ($spelltypes as list($a))
        {
            $spelltype = new Spelltype();
            $spelltype->setName($a);           
            $manager->persist( $spelltype );
        }
        unset($a, $b);

        $spelltype1 = new Spelltype();
        $spelltype1->setName("Sorts de caractéristique");
        $manager->persist( $spelltype1 );

        $spelltype2 = new Spelltype();
        $spelltype2->setName("Sorts de combat");
        $manager->persist( $spelltype2 );  
        
        $spelltype3 = new Spelltype();
        $spelltype3->setName("Sorts d'action");
        $manager->persist( $spelltype3 );          

        // Type de sort        
        $spells = [
            ["Ame de Chardros", "Augmente le POU", 2, 50, $spelltype1],
            ["Armure Infernale", "Protection +4", 0, 10, $spelltype2],
            ["Assimiler Forme", "Prendre la forme d'un autre humain ou d'un animal naturel", 3, 20, $spelltype3],
            ["Vue du Démon", "Permet au sorcier de voir des objets particuliers", 1, 30, $spelltype3],
            ["Corne de Hionhurn", "CON +3 par point de magie utilisé", 2, 20, $spelltype1],
        ];

        foreach ($spells as list($a, $b, $c, $d, $e))
        {
            $spell = new Spell();
            $spell->setName($a);   
            $spell->setEffect($b);  
            $spell->setReach($c);  
            $spell->setZone($d);    
            $spell->setIdSpelltype($e);   
            $manager->persist( $spell );
        }
        unset($a, $b, $c, $d, $e);


        $manager->flush();
    }

    public function getOrder()
    {
        return 8;
    }
}