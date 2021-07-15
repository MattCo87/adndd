<?php
namespace App\DataFixtures;

use App\Entity\Character;
use App\Entity\Game;
use App\Entity\Scenario;
use App\Entity\User;
use App\Entity\Tribe;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;



class CharacterFixtures
    extends Fixture
    implements OrderedFixtureInterface
{

    public function load( ObjectManager $manager )
    {
        $character = new Character();

        // Tribut
        $tribus = array("Humain", "Melnibonéen", "Myrrhynien", "Elfe", "Nain", "Semi-homme", "Gnome", "Demi-orc", "Vampire", "Loup-garou", "Fantôme", "Changelin", "Exalté");
        foreach ($tribus as &$value)
        {
            $tribe = new Tribe();
            $tribe->setName($value);
            $manager->persist( $tribe );
        }
        unset($value);




        // Personnage
        $character->setName('Perceval')
        ->setAvatar('perceval.png')
        ->setGender('M')
        ->setGuidingHand('fausse patte')
        ->setSize('1m76')
        ->setWeight('75kg')
        ->setDescription('Air jovial et souvent hêbété, cheveux mi-longs et grisonnants')
        ->setAge('36')
        ->setDistinctive('sent le poisson pas frais')
        ->setOccupation('glander à la taverne')
        ->setStory('À vécu un temps en Provence avant de revenir dans son pays natal gallois afin d\'y pratiquer ses jeux favoris comme le cul hibou')
        ->setNotes('J\'ai oublié mes parchemin à la taverne')
        ->setIsPremade(false);
        $manager->persist( $character );

        $character2 = new Character();

        $character2->setName('Elric')
        ->setAvatar('elric.png')
        ->setGender('M')
        ->setGuidingHand('droitier')
        ->setSize('1m90')
        ->setWeight('90kg')
        ->setDescription('Assez pâlot et air sinistre')
        ->setAge('30')
        ->setDistinctive('yeux rouges')
        ->setOccupation('aime lire')
        ->setStory('Elric est le fils unique de Sadric LXXXVI et de sa femme qui est morte des suites de la naissance d\'Elric. ')
        ->setNotes('Possède une épée plutôt classe')
        ->setIsPremade(false)
        ->setLoyalty('loi')
        ->setHomeplace('Marbella')
        ->setNamesTitlesSurname('Le grand albinos, Empereur, Rico')
        ->setBirthplace('Melniboné')
        ->setRelatives('Sadric LXXXVI, Yyrkoon, Cymoril')
        ->setEnemies('Yyrkoon');
        $manager->persist( $character2 );

        $manager->flush();
    }

    public function getOrder()
    {
        return 6;
    }
}