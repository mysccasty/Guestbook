<?php

namespace App\EntityListener;

use App\Entity\Conference;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

#[AsEntityListener(event: Events::prePersist, entity: Conference::class)]
#[AsEntityListener(event: Events::preUpdate, entity: Conference::class)]
class ConferenceEntityListener{
    private $slugger;
    public function __construct(SluggerInterface $slugger){
        $this->slugger = $slugger;
    }

    public function prePersist(Conference $conference, LifecycleEventArgs $event){
        $conference->computeSlug($this->slugger);
    }
    public function preUpdate(Conference $conference, LifecycleEventArgs $event){

        $conference->computeSlug($this->slugger);
    }
}