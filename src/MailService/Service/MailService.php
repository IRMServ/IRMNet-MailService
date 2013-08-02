<?php

namespace MailService\Service;

use Zend\Mime\Part as MimeType;
use Zend\Mail\Message as Mail;
use Zend\Mime\Message as Mime;
use Zend\ServiceManager\ServiceLocatorInterface;

class MailService {

    private $mailservice = null;
    private $template = null;
    private $mail = null;
    private $serviceLocator = null;

    public function __construct(ServiceLocatorInterface $sm, $template) {
        $this->mail = new Mail();
        $this->setTemplate($template);
        $this->setServiceLocator($sm);


        $this->mailservice = $sm->get('MailService');
    }

    public function getServiceLocator() {
        return $this->serviceLocator;
    }

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->serviceLocator = $serviceLocator;
    }

    public function send() {

        $headers = $this->mail->getHeaders();
        $headers->removeHeader('Content-Type');
        $headers->addHeaderLine('Content-Type', 'text/html; charset=UTF-8');
        $this->mail->setHeaders($headers);
        $this->mailservice->send($this->mail);
    }

    public function getTemplate() {
        return $this->template;
    }

    public function setTemplate($template) {
        $this->template = $template;
        return $this;
    }

    public function addFrom($from) {
        $this->mail->addFrom($from);
        return $this;
    }

    public function addTo($to) {
        $this->mail->addTo($to);
        return $this;
    }

    public function setSubject($subject) {
        $this->mail->setSubject($subject);
        return $this;
    }

    public function setBody(array $body) {
        $renderer = $this->getServiceLocator()->get('ViewRenderer');
        $content = $renderer->render($this->getTemplate(), $body);
        $mimehtml = new MimeType($content);
        $message = new Mime();
        $message->addPart($mimehtml);
        $this->mail->setBody($message);
        return $this;
    }

    public function addBcc($bcc) {
        $this->mail->addBcc($bcc);
        return $this;
    }

    public function addCc($cc) {
        $this->mail->addCc($cc);
        return $this;
    }

}