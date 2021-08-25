<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

class MAIL
{
    //Fonction pour le mail//

    public static function smtpMailer($to, $from, $from_name, $subject, $body,$attachment="",$Fcontact="",$phone="",$RS="",$Concerne="") 
    {

        $mail = new PHPMailer(true); 	// Cree un nouvel objet PHPMailer

        $mail->IsSMTP(); 			// active SMTP
        $mail->SMTPDebug =0;  		// debogage: 1 = Erreurs et messages, 2 = messages seulement
        $mail->SMTPAuth = true;     // Authentification SMTP active
        $mail->SMTPSecure = 'ssl'; // Gmail REQUIERT Le transfert securise
        $mail->Host = '	SSL0.OVH.NET';
        $mail->Port = 465;
        $mail->Username = 'contact@ipsad.fr';
        $mail->Password = 'ipsad@nfb78';
  
        if($attachment['tmp_name']!='')
        {
            $mail->addAttachment($attachment['tmp_name']);
        }

        $mail->Subject = $subject;
        $mail->setFrom($from,$from_name);
        if($Fcontact==1)
        {
            $mail->Body = ""."
            Identite : ".$from_name . "
            Telephone : ".$phone . "
            Raison sociale : " .$RS."
            Ma demande concerne : ".$Concerne ."
            Message : ".$body;
        }
        else
        {
            $mail->Body = $body;
        }
       
       
        $mail->AddAddress($to); //A qui cela envoie le mail//
        
        $mail->SMTPOptions = array('ssl' => 
        array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true));


        if(!$mail->Send()) {
            return 'Mail error: '.$mail->ErrorInfo;
        } else {
            return true;
        }
    }
}