<?php
use Zend\Mail\Transport\Smtp;
use Zend\Mail\Transport\SmtpOptions;
return array(   
    'service_manager' => array(
        'factories' => array(
            'MailService' => function($sm) {
                $config = include __DIR__ . '/mail.config.php';
                $smtpoption = new SmtpOptions($config);
                $smtp = new Smtp();
                $smtp->setOptions($smtpoption);
                return $smtp;
            }
        ),
    ),
  
    
    
   
);
