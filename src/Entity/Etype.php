<?php
namespace Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="etype")
 */
class Etype
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;
    
    /** 
     * @ORM\Column(type="string", length=64) 
     * @var string
     */
    private $name;

    /** 
     * @ORM\Column(type="boolean") 
     * @var boolean
     */
    private $uniquery;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getUniquery()
    {
        return $this->uniquery;
    }

    public function setUniquery($uniquery)
    {
        $this->uniquery = $uniquery;
    }
}
