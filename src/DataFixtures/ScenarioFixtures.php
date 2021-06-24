<?php
namespace App\DataFixtures;


use App\Entity\User;
use App\Entity\Scenario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ScenarioFixtures extends Fixture implements OrderedFixtureInterface
{
    private $encoder;

    public function __construct( UserPasswordEncoderInterface $encoder )
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User;

        $user->setIdRegister('525123456789')
        ->setFirstName('Nicolas')
        ->setLastName('Vauché')
        ->setPseudo('nicolasvauche')
        ->setEmail('nivauche@gmail.com')
        ->setPassword($this->encoder->encodePassword($user, 'nicolas'))
        ->setRoles(['ROLE_ADMIN'])
        ->setIsActive(true);

        $manager->persist( $user );

        for ($i = 0; $i < 5; $i++) {

            $scenario = new scenario();
            $scenario->setName('scenatio'.$i);
            $scenario->setStartAt(new \DateTime('2021-06-30'));
            $scenario->setStatus('A venir');
            $scenario->setPrivate(false);
            $scenario->setRoomName('adndd-scenario-'.$i);
            $scenario->setDungeonmaster($user);
            
            $manager->persist( $scenario );
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 7;
    }
}