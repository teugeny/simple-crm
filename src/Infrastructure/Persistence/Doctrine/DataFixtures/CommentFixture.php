<?php

namespace App\Infrastructure\Persistence\Doctrine\DataFixtures;

use App\Domain\Article\Entity\Comment;
use App\Domain\Article\Entity\Post;
use App\Domain\Auth\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

final class CommentFixture extends AbstractFixture implements DependentFixtureInterface
{
    function seed()
    {
        $count = count(TagFixture::MAIN_REFERENCES) * UserFixture::USER_COUNT * PostFixture::POST_COUNT;

        for ($i = 0; $i < $count; $i++) {
            $postRef = 'POST'.$i;
            $this->createComments($postRef);
        }
    }

    private function createComments($postRef)
    {
        for ($i = 0 ; $i < UserFixture::USER_COUNT; $i++) {
            $userRef = UserFixture::MAIN_USER_REFERENCE.$i;
            $this->createComment($postRef, $userRef);
        }
    }

    private function createComment($postRef, $userRef)
    {

        $comment = new Comment();
        /** @var Post $post */
        $post = $this->getReference($postRef);
        /** @var User $user */
        $user = $this->getReference($userRef);

        $comment->setAuthor($user);
        $comment->setPost($post);
        $comment->setMessage($this->faker->text(20));
        $this->manager->persist($comment);
        $this->manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixture::class, PostFixture::class];
    }
}