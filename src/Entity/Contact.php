<?php
namespace Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="contact")
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    protected $created;

    /**
     * @ORM\OneToMany(targetEntity="Entry", mappedBy="contact", cascade={"persist"})
     */
    private $entries;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    

    public function __construct() {
        $this->entries = new ArrayCollection();
    }


    public function getId()
    {
        return $this->id;
    }

    public function setCreated(\DateTime $created)
    {
        $this->created = $created;
    }

    public function getCreated()
    {
        return $this->created;
    }

    /////
   
    public function getEntries(): Collection
    {
        return $this->entries;
    }

    public function addEntry(Entry $entry): void
    {
        $entry->setContact($this);
        if (!$this->entries->contains($entry)) {
            $this->entries->add($entry);
        }
    }

    public function removeEntry(Entry $entry): void
    {
        $this->entries->removeElement($entry);
    }
    
    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

}
