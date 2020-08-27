<?php

namespace App\Infrastructure\Persistence\Doctrine\DataFixtures;

use App\Domain\Auth\Entity\Role;

final class RoleFixture extends AbstractFixture
{
    public const MAIN_REFERENCE = ['USER' => 'Пользователь', 'AUTHOR' => 'Автор'];

    function seed()
    {
        foreach (self::MAIN_REFERENCE as $code => $title) {
            $role = new Role();
            $role->setTitle($title);
            $role->setCode($code);
            $this->addReference($code, $role);
            $this->manager->persist($role);
            $this->manager->flush();
        }
    }
}