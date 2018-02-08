<?php

namespace Zendvn\Mail;

use Zend\View\Helper\Url;
use Zend\Mime\Mime;
use Zend\Mail\Message;
use Zend\Mail\Transport\SmtpOptions;

class Mail
{

    protected $_config = array(
        'name' => 'localhost',
        'host' => 'smtp.gmail.com',
        'port' => 587,                // 587 465 25
        'connection_class' => 'login',
        'connection_config' => array(
            'username' => 'phankiet1204@gmail.com',
            'password' => 'behonghanh',
            'ssl' => 'tls'
        ),
    );


    public function sendMail($fullName, $email, $linkActive)
    {
        $smtpOptions = new SmtpOptions($this->_config);
        $message = new Message();
        $message->setFrom($this->_config['connection_config']['username'], 'BookOnline');
        $message->setEncoding('UTF-8');

        $message->setSubject('Kích hoạt tài khoản');

        $content = new \Zend\Mime\Part(
            '<p>Xin chào ' . $fullName . '!</p>
			<p> Bạn vừa đăng ký tài khoản tại website BookOnline,
			để hoàn thành việc đăng ký bạn vui lòng <a href="' . $linkActive . '">click vào đây</a> để kích hoạt tài khoản.
			</p>
			Trân trọng!'
        );

        $content->type = Mime::TYPE_HTML;
        $content->charset = 'UTF-8';
        $message->setTo($email, $fullName);

        $mimeMessage = new \Zend\Mime\Message();
        $mimeMessage->setParts(array($content));

        $message->setBody($mimeMessage);

        $transport = new \Zend\Mail\Transport\Smtp($smtpOptions);
        $transport->send($message);
    }
}