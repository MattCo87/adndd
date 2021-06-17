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
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}