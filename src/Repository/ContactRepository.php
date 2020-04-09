<?php
namespace Repository;

use Entity\Etype;
use Entity\Entry;
use Entity\Contact;
use Entity\User;

/**
 * ContactRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContactRepository extends EntityRepository {

    public function addEntryToContact(int $contactId, String $entryData, String $entryType){
        
        $entry = new Entry();
        $entry->setText($entryData);

	if($entryType == 'Nam'){
	    $etypeNam = $this->em->find('Entity\Etype', 1);
            $entry->setEtype($etypeNam);
        }
        if($entryType == 'Tel'){
	    $etypeTel = $this->em->find('Entity\Etype', 2);
            $entry->setEtype($etypeTel);
        }
        if($entryType == 'Add'){
	    $etypeAdd = $this->em->find('Entity\Etype', 3);
            $entry->setEtype($etypeAdd);
        }
        if($entryType == 'Com'){
	    $etypeCom = $this->em->find('Entity\Etype', 4);
            $entry->setEtype($etypeCom);
        }

        $contact = $this->em->find('Entity\Contact', $contactId);
        $contact->addEntry($entry);

        $this->em->persist($contact);
    	$this->em->flush();
    }
    
    public function addNewContactToUser(int $userId){
          
	$user = $this->em->find('Entity\User', $userId);
        $contact = new Contact();
        $contact->setCreated(new \DateTime());
        $contact->setUser($user);

        $this->em->persist($contact);
        $this->em->flush();
    }
  
    public function getContactsOfUser(int $userId){
        
        $qb = $this->em->createQueryBuilder();
        
        return $qb ->select('c.id') 
        	->addSelect('e.text as info')
        	->addSelect('t.name as info_type')
        	->from('Demo:Contact', 'c')
        	->leftJoin('c.entries', 'e')
        	->leftJoin('e.etype', 't')
        	->leftJoin('c.user', 'u')
        	->where('u.id = :userId')
        	->orderBy('c.id, t.id', 'ASC')
        	->setParameter('userId', $userId)
        	->getQuery()
        	->getResult();
        
    }

    public function displayContactsOfUser(int $userId){

        $contacts = $this->getContactsOfUser($userId);
        $contactId = 0;
    	foreach ($contacts as $item) {
            if($item['id'] != $contactId){
                $contactId = $item['id'];
                echo "Contact Id: ".$item['id']."\n";
            }
            if($item['info'] != '')
                echo "    ".$item['info_type'].": ".$item['info']."\n";	
        }

        if($contactId == 0)
            echo "--- No contact found for this User!!"."\n";
    }
}

