<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use App\Entity\Langages;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Types\SmallIntType;
use Doctrine\Persistence\ObjectManager;
use JetBrains\PhpStorm\Language;

;

class CoursFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $this->createCours("HTML", 2, 5, date_create("2023-09-28"), 1, 1, $manager );

        $manager->flush();
    }

    public function createCours(string $scours_titre, int $icours_niveau, int $icours_temps_estime, \DateTimeInterface $DTIcours_date, int $icours_cree, Langages $ilangage_id, ObjectManager $manager ) : Cours{
        $counter = 1;
        $course = new Cours();
        $course->setCoursTitre($scours_titre);
        $course->setCoursNiveau($icours_niveau);
        $course->setCoursTempsEstime($icours_temps_estime);
        $course->setCoursDate($DTIcours_date);
        $course->setCoursCree($icours_cree);
        $course->setLangage($ilangage_id);

        $manager->persist($course);
        $this->addReference('course-' . $counter, $course);

        return $course;
    }
}
