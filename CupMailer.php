<?php

class CupMailer extends CNucleo {

    public $template = 'template_email';
    public $from;
    public $to;
    public $subject;
    public $message;

    public function __construct() {
        $this->from = 'bot@' . $_SERVER["HTTP_HOST"];
        return parent::__construct();
    }

    public function enviaEmail($dados, $to = null, $subject = 'Contato através do site', $viewEmail = 'email_contato') {
        $this->to = $to;
        $this->subject = $subject;
        if (is_null($this->to)) {
            $this->to = $this->retornaEmail();
        }
        $this->message = $this->renderizar($viewEmail, array('dados' => $dados), true);
        return $this->send();
    }

    private function send() {
        $enviado = mail($this->to, $this->subject, $this->message, $this->getHeaders(), "-r" . $this->from);
        if (!$enviado) {
            $enviado = (mail($this->to, $this->subject, $this->message, $this->getHeaders()));
        }
        return $enviado;
    }

    private function getHeaders() {
        $headers = "MIME-Version: 1.1\n";
        $headers .= "Content-type: text/html; charset=utf-8\n";
        $headers .= "From: " . $this->from . "\n"; //E-mail do remetente
        $headers .= "Return-Path: " . $this->from . "\n"; //E-mail do remetente
        return $headers;
    }

}
