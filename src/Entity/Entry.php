<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="entry")
 */
class Entry
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /** 
     * @ORM\Column(type="string", length=128)
     * @var string 
     */
    private $text;

    /**
     * @ORM\ManyToOne(targetEntity="Etype")
     * @ORM\JoinColumn(name="etype_id", referencedColumnName="id")
     */
    private $etype;

    /**
     * @ORM\ManyToOne(targetEntity="Contact", inversedBy="entries")
     * @ORM\JoinColumn(name="contact_id", referencedColumnName="id")
     */
    private $contact;


    public function getId()
    {
        return $this->id;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    //////

    public function getEtype(): ?Etype
    {
        return $this->etype;
    }

    public function setEtype(?Etype $etype): self
    {
        $this->etype = $etype;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    //public function __toString()
    //{
    //    return (string)$this->getId();
    //}
   
}
