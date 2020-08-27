<?php

namespace App\Infrastructure\Persistence\Doctrine\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

abstract class AbstractFixture extends Fixture
{
    /** @var ObjectManager */
    protected $manager;

    /** @var \Generator */
    protected $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $this->seed();
    }

    abstract function seed();
}