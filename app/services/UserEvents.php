<?php



namespace App\services;
use App\dispatcher\Event;



class UserEvents extends Event
{
    /**
     * Dispatched when user signs up.
     */
    const USER_REGISTERED = "user.registered";


    /**
     * Dispatched when user signs up.
     */
    const USER_CREATED = "user.created";


    /**
     * Dispatched when user log out.
     */
    const USER_LOGOUT = "user.logout";


    /**
     * @var User $user
     */
    protected $user;


    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}