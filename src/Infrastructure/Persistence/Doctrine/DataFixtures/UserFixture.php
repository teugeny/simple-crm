<?php

namespace App\Infrastructure\Persistence\Doctrine\DataFixtures;

use App\Domain\Auth\Entity\Role;
use App\Domain\Auth\Entity\User;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

final class UserFixture extends AbstractFixture implements DependentFixtureInterface
{
    const MAIN_AUTHOR_REFERENCE = 'AUTHOR_USER';

    const MAIN_USER_REFERENCE = 'DEFAULT_USER';

    const USER_COUNT = 2;

    /** @var UserPasswordEncoderInterface */
    protected $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
        parent::__construct();
    }

    function seed()
    {
        foreach (RoleFixture::MAIN_REFERENCE as $code => $name) {
            $this->seedCollection($code);
        }
    }


    protected function seedCollection(string $roleName)
    {
        for ($i = 0; $i < self::USER_COUNT; $i++) {
            /** @var Role $role */
            $role = $this->getReference($roleName);
            $user = new User();
            $user->setFirstName($this->faker->firstName);
            $user->setLastName($this->faker->lastName);
            $user->setGender('male');
            $age = random_int(20, 30);
            $user->setAge($age);
            $user->addRole($role);
            $user->setPassword($this->encoder->encodePassword($user,'password'));
            $ref = $roleName == 'AUTHOR' ? self::MAIN_AUTHOR_REFERENCE : self::MAIN_USER_REFERENCE;
            $ref.=$i;
            $this->addReference($ref, $user);

            $this->manager->persist($user);
            $this->manager->flush();
        }
    }

    public function getDependencies()
    {
        return [RoleFixture::class];
    }
}