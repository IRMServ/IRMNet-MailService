<?php

namespace MailService\Service;

use Zend\Mail\Message;
use Zend\ServiceManager\ServiceLocatorInterface;

class MailService extends Message {

    private $mailservice;

    public function __construct(ServiceLocatorInterface $sm) {
        $this->mailservice = $sm->get('MailService');
        $this->setEncoding("UTF-8");    
    }

    public function send()
    {
        $this->mailservice->send($this);
    }

}