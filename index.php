<?php

require __DIR__ . '/vendor/autoload.php';


use App\dispatcher\EventDispatcher;
use App\services\UserEvents;
use App\services\User;


function firstListener($eventName, UserEvents $userEvents) {
    print "FIRST LISTENER\n";
}

function secondListener($eventName, UserEvents $userEvents) {
    print "SECOND LISTENER\n";
}


$dispatcher = new EventDispatcher();

$dispatcher->addListener(UserEvents::USER_CREATED,'firstListener',1);
$dispatcher->addListener(UserEvents::USER_CREATED, 'secondListener',5);

$user = new User('John');
$userEvent = new UserEvents($user);


$dispatcher->dispatch(UserEvents::USER_CREATED, $userEvent);


print "\n";