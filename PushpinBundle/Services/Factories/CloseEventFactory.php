<?php

namespace Gamma\Pushpin\PushpinBundle\Services\Factories;

use Gamma\Pushpin\PushpinBundle\Events\CloseEvent;
use Gamma\Pushpin\PushpinBundle\Exceptions\Factory\UnsupportedEventTypeException;
use Gamma\Pushpin\PushpinBundle\Interfaces\Events\CloseEventInterface;
use Gamma\Pushpin\PushpinBundle\Interfaces\Factory\EventFactoryInterface;
use GripControl\WebSocketEvent;

class CloseEventFactory implements EventFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function getEvent(WebSocketEvent $webSocketEvent, $format = null)
    {
        if ($webSocketEvent->type !== CloseEventInterface::EVENT_TYPE) {
            throw new UnsupportedEventTypeException($this, $webSocketEvent);
        }

        return new CloseEvent($webSocketEvent->type, $webSocketEvent->content);
    }

    /**
     * {@inheritdoc}
     */
    public function getFormat()
    {
        return CLoseEventInterface::EVENT_TYPE;
    }
}
