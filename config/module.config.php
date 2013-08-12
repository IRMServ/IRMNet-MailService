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
  
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => realpath(__DIR__ . '/../../base/view/layout/layout.phtml'),
            'application/index/index' => __DIR__ . '/../../base/view/application/index/index.phtml',
          
           'envio/teste' => __DIR__ . '/../view/envio/teste.phtml',
            'helpdesk/resposta' => __DIR__ . '/../view/helpdesk/email-resposta-chamado.phtml',
            'helpdesk/abertura' => __DIR__ . '/../view/helpdesk/email-abertura-chamado.phtml',
            'helpdesk/fechamento' => __DIR__ . '/../view/helpdesk/email-fechar-chamado.phtml',
            'dp/convite-individual' => __DIR__ . '/../view/dp/convite-individual.phtml',
            'dp/convite-individual-gestor-aprovar' => __DIR__ . '/../view/dp/convite-individual-gestor-aprovar.phtml',
            'dp/convite-coletivo' => __DIR__ . '/../view/dp/convite-coletivo.phtml',
            'dp/convite-coletivo-gestor-aprovar' => __DIR__ . '/../view/dp/convite-coletivo-gestor-aprovar.phtml',
            'dp/convite-individual-rose-aprovar' => __DIR__ . '/../view/dp/convite-individual-rose-aprovar.phtml',
            'dp/convite-individual-aprovado' => __DIR__ . '/../view/dp/convite-individual-aprovado.phtml',
            'dp/convite-individual-rose-negar' => __DIR__ . '/../view/dp/convite-individual-rose-negar.phtml',
            'dp/convite-individual-negar' => __DIR__ . '/../view/dp/convite-individual-negar.phtml',
            'rh/noticia' => __DIR__ . '/../view/rh/noticia.phtml',
            
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
   
);
