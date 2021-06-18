<?php
namespace App\DataFixtures;
use App\Entity\Game;
use App\Entity\Category;
use App\Entity\Gamesystem;
use App\Entity\Diceset;
use App\Entity\Dice;
use App\Entity\Gamerules;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;



class GameFixtures
    extends Fixture
    implements OrderedFixtureInterface
{

    public function load( ObjectManager $manager )
    {

        $ungamesrules = New Gamerules();
        $ungamesrules->setName('Régle du jeu')
        ->setPath('rules.pdf');
        $manager->persist( $ungamesrules );

        $undiceset = New Diceset();
        $undiceset->setName('Chaosium');
        $manager->persist( $undiceset );

        $undice4 = New Dice();
        $undice4->setFaces('4')
        ->setName('D4')
        ->addDiceset($undiceset);
        $manager->persist( $undice4 );

        $undice6 = New Dice();
        $undice6->setFaces('6')
        ->setName('D6')
        ->addDiceset($undiceset);
        $manager->persist( $undice6 );

        $undice8 = New Dice();
        $undice8->setFaces('8')
        ->setName('D8')
        ->addDiceset($undiceset);
        $manager->persist( $undice8 );

        $undice10 = New Dice();
        $undice10->setFaces('10')
        ->setName('D10')
        ->addDiceset($undiceset);
        $manager->persist( $undice10 );

        $undice20 = New Dice();
        $undice20->setFaces('20')
        ->setName('D20')
        ->addDiceset($undiceset);
        $manager->persist( $undice20 );

        $unecategorie = new Category;
        $unecategorie->setName('Médiéval Fantastique');
        $manager->persist( $unecategorie );

        $ungamesystem = new Gamesystem;
        $ungamesystem->setName('Chaosium')
        ->setIdDiceset($undiceset);
        $manager->persist( $ungamesystem );

        // Game account
        $game = new Game();
        $game->setName('Elric')
        ->setVersion('1.0')
        ->setShortDescription('Elric est un Empereur')
        ->setDescription('Elric utilise chaosium')
        ->setImage('elric.png')
        ->setIdCategory($unecategorie)
        ->setIdGamesystem($ungamesystem)
        ->addGamerule($ungamesrules);
        $manager->persist( $game );

        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }
}