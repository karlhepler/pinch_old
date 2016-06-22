<?php

namespace App\Helpers;

use ReflectionClass;
use ReflectionMethod;
use Illuminate\Events\Dispatcher;

class EventSubscriber
{
    /**
     * Subscribe to all events referenced in the class
     *
     * @param  \Illuminate\Events\Dispatcher $events
     * @return void
     */
    public function subscribe(Dispatcher $events)
    {
        // Get the reflection class instance
        $subscriber = new ReflectionClass($this);

        // Go through each public method & listen to all event methods
        foreach ($subscriber->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            // Continue if the method doesn't start with "on"
            if ( strpos($method, 'on') === false ) continue;

            // Get the event name
            $event = 'App\\Events\\'.substr($method->name, 2);

            // Continue if it doesn't exist
            if ( !class_exists($event) ) continue;

            // Listen for the event!
            $events->listen($event, $subscriber->getName().'@'.$method->name);
        }
    }
}
