<?php

namespace app\components;
use app\models\Event;
use yii\httpclient\Client;

class NotifyClient extends Client
{

    private $url;
    private $method;

    /**
     * @param Event $event
     */
    public function __construct($event)
    {
        parent::__construct();
        $query_string = preg_replace(['/{id}/', '/{goal}/', '/{price}/'], [$event->id, $event->goal, $event->price], $event->integration->params);
        $this->url = $event->integration->endpoint . '?' . $query_string;
        $this->method = $event->integration->getRequestTypeLabel();
    }

    public function notify()
    {

        if ($this->method === 'GET')
            $this->get($this->url)->send();
        elseif ($this->method === 'POST')
            $this->post($this->url)->send();
        else
            return;
    }
}