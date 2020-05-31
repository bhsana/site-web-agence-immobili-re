<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{


    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * Création d'un utilisateur par défault admin:admin
     * @param ObjectManager $manager
     *
     */
    public function load(ObjectManager $manager)
    {

        $user = new User();
        $user->setUsername("admin");
        $user->setPassword($this->encoder->encodePassword($user,"admin"));
        $manager->persist($user);
        $manager->flush();
    }
}
