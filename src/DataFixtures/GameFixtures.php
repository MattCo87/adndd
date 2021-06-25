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

        $unecategorie1 = new Category;
        $unecategorie1->setName('Médiéval Fantastique');
        $manager->persist( $unecategorie1 );

        $unecategorie2 = new Category;
        $unecategorie2->setName('Moderne');
        $manager->persist( $unecategorie2 );        

        $unecategorie3 = new Category;
        $unecategorie3->setName('Fantastique');
        $manager->persist( $unecategorie3 );     

        $unecategorie4 = new Category;
        $unecategorie4->setName('Science-Fiction');
        $manager->persist( $unecategorie4 );    

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
        ->setIdCategory($unecategorie1)
        ->setIdGamesystem($ungamesystem)
        ->addGamerule($ungamesrules);
        $manager->persist( $game );

        $game1 = new Game();
        $game1->setName('Advanced Donjons & Dragons')
        ->setVersion('2.0')
        ->setShortDescription('Le papa de tous les jeux de rôles')
        ->setDescription('Jeu qui se déroule dans un univers médiéval/fantastique')
        ->setImage('add.png')
        ->setIdCategory($unecategorie1)
        ->setIdGamesystem($ungamesystem)
        ->addGamerule($ungamesrules);
        $manager->persist( $game1 );

        $game2 = new Game();
        $game2->setName('White Wolf')
        ->setVersion('1.0')
        ->setShortDescription('un jeu avec des loups')
        ->setDescription('White Wolf est un jeu fantastique')
        ->setImage('ww.png')
        ->setIdCategory($unecategorie3)
        ->setIdGamesystem($ungamesystem)
        ->addGamerule($ungamesrules);
        $manager->persist( $game2 );

        $game3 = new Game();
        $game3->setName('Chroniques Oubliées')
        ->setVersion('2.0')
        ->setShortDescription('un jeu de chroniques')
        ->setDescription('Chroniques Oubliées est un jeu Moderne')
        ->setImage('co.png')
        ->setIdCategory($unecategorie2)
        ->setIdGamesystem($ungamesystem)
        ->addGamerule($ungamesrules);
        $manager->persist( $game3 );


        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }
}