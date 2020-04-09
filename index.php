<?php
    require_once __DIR__ . '/vendor/autoload.php';

    use Doctrine\ORM\Tools\Setup;
    use Doctrine\ORM\EntityManager;

    use Repository\UserRepository;
    use Repository\ContactRepository;

    //////////// em booting ////////////
    $paths = array(__DIR__."/src/Entity");
    $isDevMode = true;
    $proxyDir = null;
    $cache = null;
    $useSimpleAnnotationReader = false;

    // the connection configuration
    $dbParams = array(
        'driver'   => 'pdo_mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'dbname'   => 'buch-oop',
        'user'     => 'root',
        'password' => 'vuanh123',
    );

    $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
    $config->addEntityNamespace('Demo', 'Entity');
    $entityManager = EntityManager::create($dbParams, $config);

    /////////
    /*
    
    // add user----
    //$user4 = new User();
    //$user4->setName("Tony");
    //$user4->setPassword("tonyPw");
    //$entityManager->persist($user4);

    //get user----
    $user = $entityManager->find('Entity\User', 5);

    // entry-type----

    $etypeName = $entityManager->find('Entity\Etype', 1);
    $etypeTel = $entityManager->find('Entity\Etype', 2);
    $etypeAdd = $entityManager->find('Entity\Etype', 3);
    $etypeCom = $entityManager->find('Entity\Etype', 4);

    // entries ----

    $entryName = new Entry();
    $entryName->setText('User 5');
    $entryName->setEtype($etypeName);
    //$entityManager->persist($entryName);

    $entryTel = new Entry();
    $entryTel->setText('555');
    $entryTel->setEtype($etypeTel);
    //$entityManager->persist($entryTel);

    $entryAdd = new Entry();
    $entryAdd->setText('Jean Str.55 Munich');
    $entryAdd->setEtype($etypeAdd);

    $entryCom = new Entry();
    $entryCom->setText('Papa55 Germany');
    $entryCom->setEtype($etypeCom);

    // contact----
    $contact = new Contact();
    $contact->setCreated(new \DateTime());

    $contact->setUser($user);

    $contact->addEntry($entryName);
    $contact->addEntry($entryTel);
    $contact->addEntry($entryAdd);
    $contact->addEntry($entryCom);

    // persist contact

    $entityManager->persist($contact);
    // actually executes the queries (i.e. the INSERT query)
    $entityManager->flush();

    */
    //---------------------------------------------------------------------------
    
    $contactRepo = new contactRepository($entityManager);

    /////////// add empty-contact to user ////////////
    // $contactRepo->addNewContactToUser($userId);
    // $contactRepo->addNewContactToUser(6);

    ////////// add entry to contact ////////////
    // $contactRepo->addEntryToContact(int $contactId, String $entryData, String $entryType);
    
     $contactRepo->addEntryToContact(18, 'Sunny 3', 'Nam');
    // $contactRepo->addEntryToContact(16, '8888', 'Tel');
    // $contactRepo->addEntryToContact(15, 'Perlach.15 Munic', 'Add');
    // $contactRepo->addEntryToContact(16, 'Beer AG', 'Com');

    ////////// get contacts of user //////////
    // $contacts = $contactRepo->getContactsOfUser(7); //param = userId
    // var_dump($contacts);
    // exit;

    $contactRepo->displayContactsOfUser(6); //$userId

    

        

