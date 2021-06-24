<?php
namespace App\DataFixtures;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class UserFixtures
    extends Fixture
    implements OrderedFixtureInterface
{
    private $encoder;

    public function __construct( UserPasswordEncoderInterface $encoder )
    {
        $this->encoder = $encoder;
    }

    public function load( ObjectManager $manager )
    {
        // Client administrator account
        $user = new User();
        $user->setIdRegister('0123456789')
        ->setFirstName('Nicolas')
        ->setLastName('Vauché')
        ->setPseudo('nicolasvauche')
        ->setEmail('nvauche@gmail.com')
        ->setPassword($this->encoder->encodePassword($user, 'nicolas'))
        ->setRoles(['ROLE_ADMIN'])
        ->setIsActive(true);
        $manager->persist( $user );

        $matt = new User();
        $matt->setIdRegister('1123756785')
        ->setFirstName('Matt')
        ->setLastName('Co')
        ->setPseudo('Lord Aixois')
        ->setEmail('87700a@gmail.com')
        ->setPassword($this->encoder->encodePassword($matt, 'matthieu'))
        ->setRoles(['ROLE_USER'])
        ->setIsActive(true);
        $manager->persist( $matt );

        $julien = new User();
        $julien->setIdRegister('2523446789')
        ->setFirstName('Julien')
        ->setLastName('Vasse')
        ->setPseudo('Icar')
        ->setEmail('julienicar@hotmail.com')
        ->setPassword($this->encoder->encodePassword($julien, 'julien'))
        ->setRoles(['ROLE_USER'])
        ->setIsActive(true);
        $manager->persist( $julien ); 


        $manager->flush();

        $this->addReference('admin-user', $user);
    }

    public function getOrder()
    {
        return 1;
    }
}
