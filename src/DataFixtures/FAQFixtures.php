<?php
namespace App\DataFixtures;

use App\Entity\FAQ;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class FAQFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        for ($i = 0; $i < 5; $i++) {
            $faq = new FAQ();
            $faq->setQuestion('Where does it come from?  '.$i);
            $faq->setAnswer('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that   '.$i);
            $faq->setnumber($i);
            $manager->persist( $faq );
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}

