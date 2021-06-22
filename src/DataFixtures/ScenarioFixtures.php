<?php
namespace App\DataFixtures;


use App\Entity\User;
use App\Entity\Scenario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class ScenarioFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User;
        for ($i = 0; $i < 5; $i++) {
            $scenario = new scenario();
            $scenario->setName('scenatio'.$i);
            $scenario->setStartAt(new \DateTime('2021-06-30'));
            $scenario->setStatus('A venir');
            $scenario->setPrivate(false);
            $scenario->setRoomName('adndd-scenario-'.$i);
            $scenario->setDungeonmaster($user->getDoctrine()->getRepository(user::class)->find(1));
            

            $manager->persist( $scenario );
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 7;
    }
}