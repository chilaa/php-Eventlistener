<?php



include_once 'Event.php';

class EventDispatcher
{

    /**
     * @var array
     */
    protected $listeners = [];
    protected $weightplan =[10];

    /**
     * @param $eventName
     * @param Event $event
     * @return Event
     */
    public function dispatch($eventName, Event $event)
    {

        ksort($this->listeners[$eventName]);
        print_r($this->listeners);
        if ($listeners = $this->listeners[$eventName]) {
            foreach ($listeners as $listener) {
                $listener($eventName, $event);
            }
        }

        return $event;
    }


    /**
     * @param $eventName
     * @param $handler
     * @param $weight
     */
    public function addListener($eventName, callable $handler, $weight)
    {



        if(isset($this->listeners[$eventName][$weight])){
            array_splice($this->listeners[$eventName],$weight-1,0, $this->listeners[$eventName][$weight] = $handler);

        }else {
            $this->listeners[$eventName][$weight] = $handler;
        }
    }


    /**
     * @param $eventName
     * @param $listener
     */
    public function removeListener($eventName, $listener)
    {

        if ($listeners = $this->listeners[$eventName]) {

            foreach ($listeners as $index => $list) {
                if ($list == $listener) {
                    unset($this->listeners[$eventName][$index]);
                }
            }

        }
    }
}