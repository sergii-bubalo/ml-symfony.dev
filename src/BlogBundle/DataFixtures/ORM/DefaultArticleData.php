<?php
/**
 * This file contains DefaultArticleData class
 *
 * @author Sergii Bubalo <sergii.bubalo@gmail.com>
 *
 * Free license
 */

namespace BlogBundle\DataFixtures\ORM;

use BlogBundle\Entity\Blog;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DefaultArticleData implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $blog = new Blog();

        $blog->setTitle('First tile')
            ->setSummary('First summary')
            ->setBody('First body');

        $manager->persist($blog);
        $manager->flush();
    }
}