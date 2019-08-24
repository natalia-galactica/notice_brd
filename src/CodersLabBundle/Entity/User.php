<?php

namespace CodersLabBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="user")
*/
class User extends BaseUser
{

/**
* @ORM\OneToMany(targetEntity="Ad", mappedBy="user")
*/
private $ad;


/**
* @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
*/
private $comment;


/**
* @ORM\Id
* @ORM\Column(type="integer")
* @ORM\GeneratedValue(strategy="AUTO")
*/
protected $id;

public function __construct()
{

parent::__construct();
$this->comment = new ArrayCollection();
$this->ạd = new ArrayCollection();
}
}