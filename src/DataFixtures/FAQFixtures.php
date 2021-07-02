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

        $faq = new FAQ();
        $faq->setQuestion('1. Puis-je jouer gratuitement ?');
        $faq->setAnswer('Oui, vous pouvez contacter l\'administrateur pour qu\'il vous crée un compte temporaire vous permettant de participer à une partie de jeu de rôles sur le site ! À la suite de cet essai, vous pourrez décider de rejoindre l\'association (payant) et débloquer un accès permanent aux parties avec les membres.');
        $faq->setnumber(1);
        $manager->persist($faq);

        $faq = new FAQ();
        $faq->setQuestion('2. Si je suis adhérent, puis-je ajouter un jeu sur le site ?');
        $faq->setAnswer('Oui, en proposant votre jeu à l\'administrateur, celui-ci pourra, ou non, décider d\'ajouter votre jeu à la liste des jeux du site.');
        $faq->setnumber(2);
        $manager->persist($faq);

        $faq = new FAQ();
        $faq->setQuestion('3. Je n\'ai pas de caméra, est-ce que je peux quand même participer ?');
        $faq->setAnswer('Bien sûr, dans ce cas, c\'est votre avatar de personnage qui s\'affichera à la place');
        $faq->setnumber(3);
        $manager->persist($faq);

        $faq = new FAQ();
        $faq->setQuestion('4. Je n\'ai pas encore 18 ans, est-ce que je peux vous rejoindre ?');
        $faq->setAnswer('Oui, cependant il se peut que certains jeux ne vous soient pas accessibles, c\'est le Maître de jeu qui en décidera.');
        $faq->setnumber(4);
        $manager->persist($faq);

        $faq = new FAQ();
        $faq->setQuestion('5. J\'ai constaté une erreur sur le site, comment vous la communiquer ?');
        $faq->setAnswer('Pour cela, utilisez le formulaire de la page Contact en précisant au mieux où vous l\'avez repérée et sa nature.');
        $faq->setnumber(5);
        $manager->persist($faq);

        $faq = new FAQ();
        $faq->setQuestion('6. J\'ai perdu mon mot de passe !! Aidez-moi');
        $faq->setAnswer('Ne vous inquiétez pas, vous pouvez tout simplement faire une récupération de mot de passe depuis le menu de connexion et un nouveau mot de passe vous sera envoyé sur votre adresse email.');
        $faq->setnumber(6);
        $manager->persist($faq);

        $faq = new FAQ();
        $faq->setQuestion('7. J\'aimerai beaucoup vous rendre visite, comment faire ?');
        $faq->setAnswer('Cliquez sur le lien "Nous contacter" dans le pied de page de n\'importe quelle page du site, vous trouverez notre adresse, nos horaires, ainsi qu\'un plan indiquant nos locaux.');
        $faq->setnumber(7);
        $manager->persist($faq);

        $faq = new FAQ();
        $faq->setQuestion('8. Je souhaite me désabonner, puis-je le faire depuis le site ?');
        $faq->setAnswer('Oui, l\'administrateur du site et président de l\'association sera alors informé de votre demande et vous recevrez rapidement une confirmation de sa part que votre abonnement a bien été résilié.');
        $faq->setnumber(8);
        $manager->persist($faq);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
