<?php
namespace App\DataFixtures;

use App\Entity\Characteristic;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class CharacteristicFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        // Les caractéristiques
       
        $characteristics = [
            ["Modificateur aux dégâts", "DMG", 0],
            ["Jet d'Idée", "JIDE", 0],
            ["Jet de Chance", "JLUCK", 0],
            ["Jet de Charisme", "JCHAR", 0],
            ["Jet de Dexterité", "JDEX", 0],

            ["Force", "FOR", 1],
            ["Constitution", "CON", 10],
            ["Taille", "TAI", 69],
            ["Intelligence", "INT", 50],
            ["Pouvoir", "POU", 50],
            ["Apparence", "APP", 20],
            ["Dexterité", "DEX", 50],
            ["Agilité", "AGI", 50],
            ["Endurance", "END", 50],
            ["Concentration", "FOCUS", 35],
            ["Habileté", "HAB", 75],
            ["Sagesse", "SAG", 5],
            ["Éducation", "EDU", 85],
            ["Mouvement", "MVT", 15],
            ["Points de vie", "PV", 50],
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

        $manager->flush();
    }

    public function getOrder()
    {
        return 9;
    }
}