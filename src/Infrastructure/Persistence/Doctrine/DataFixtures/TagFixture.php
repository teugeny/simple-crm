<?php

namespace App\Infrastructure\Persistence\Doctrine\DataFixtures;

use App\Domain\Article\Entity\Tag;

final class TagFixture extends AbstractFixture
{
    const MAIN_REFERENCES = ['work', 'travel'];

    function seed()
    {
        foreach (self::MAIN_REFERENCES as $name) {
            $tag = new Tag();
            $tag->setTitle($name);
            $tag->setSlug($name);
            $this->manager->persist($tag);
            $this->manager->flush();
            $this->addReference($name, $tag);
        }
    }
}