<?php


include_once 'dispatcher/EventDispatcher.php';
include_once 'UserEvents.php';




class User
{

    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}

function firstListener($eventName, UserEvents $userEvents) {
    print "FIRST LISTENER\n";
}

function secondListener($eventName, UserEvents $userEvents) {
    print "SECOND LISTENER\n";
}


$dispatcher = new EventDispatcher();
$dispatcher->addListener(UserEvents::USER_CREATED,'firstListener',3);

$dispatcher->addListener(UserEvents::USER_CREATED, 'secondListener',1);

$user = new User('Davian');
$userEvent = new UserEvents($user);

//$dispatcher->removeListener(UserEvents::USER_CREATED, 'firstListener');

$dispatcher->dispatch(UserEvents::USER_CREATED, $userEvent);


print "\n";