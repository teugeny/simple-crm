<?php

namespace App\Infrastructure\Persistence\Doctrine\DataFixtures;

use App\Domain\Article\Entity\Post;
use App\Domain\Article\Entity\Tag;
use App\Domain\Auth\Entity\User;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

final class PostFixture extends AbstractFixture implements DependentFixtureInterface
{
    public const POST_COUNT = 2;

    public function seed()
    {
        $position = 0;

        foreach (TagFixture::MAIN_REFERENCES as $tag) {
            for ($i = 0; $i < self::POST_COUNT; $i++) {
                $this->seedCollection($tag, $position);
            }
        }
    }

    private function seedCollection(string $tag, &$position)
    {
        for ($i = 0; $i < UserFixture::USER_COUNT; $i++) {
            $userRef = UserFixture::MAIN_AUTHOR_REFERENCE.$i;

            $this->createPost($tag, $userRef, $position);
        }

    }

    private function createPost(string $tag, string $author, &$position)
    {
        /** @var User $user */
        $user = $this->getReference($author);

        $post = new Post();
        $post->setTitle($this->faker->text(10));
        $post->setDescription($this->faker->text(20));
        $post->setDetails($this->faker->text(200));

        /** @var Tag $tag */
        $tag = $this->getReference($tag);
        $post->addTag($tag);
        $post->setAuthor($user);

        $postRef = 'POST'.$position;
        $this->addReference($postRef, $post);

        $this->manager->persist($post);
        $this->manager->flush();

        $position++;
    }

    public function getDependencies()
    {
        return [TagFixture::class, UserFixture::class];
    }
}