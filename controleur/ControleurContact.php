<?php

$messageErreurMail="";

if (isset($_POST['submitMail']))
{
	$result = smtpmailer('yoan.laurain1@gmail.com',$_POST['email'],$_POST['NomPrenom'],$_POST['Objet'],$_POST['Message'],$_FILES['Pjointes']);
	$messageErreurMail = $result ? 'Votre message a bien été envoyé ' : "Votre message n'a pas pu être envoyé";
}


$contact = new Formulaire('post', 'index.php', 'fcontact', 'fcontact','multipart/form-data');

	//Partie Image du top avec Texte de présentation//

	$contact->ajouterComposantLigne($contact->debutDiv("topContact"));
		$contact->ajouterComposantLigne($contact->debutDiv("topContact2"));
			$contact->ajouterComposantLigne($contact->creerTitre("Me contacter"));
			$contact->ajouterComposantLigne($contact->creerTitre("Voici mon contact professionel", 2));
		$contact->ajouterComposantLigne($contact->finDiv());
	$contact->ajouterComposantLigne($contact->finDiv());
	$contact->ajouterComposantTab();

	//Partie fomulaire de contact//

	$contact->ajouterComposantLigne($contact->debutDiv("contact"));
		$contact->ajouterComposantLigne($contact->creerTitre("Formulaire"));
		$contact->ajouterComposantLigne($contact->creerInputTexte('email', 'email', '', 1, 'Votre email', ''));
		$contact->ajouterComposantLigne($contact->br());
		$contact->ajouterComposantLigne($contact->creerInputTexte('NomPrenom', 'NomPrenom',"",  1, 'Votre nom', ''));
		$contact->ajouterComposantLigne($contact->br());	
		$contact->ajouterComposantLigne($contact->creerInputTexte('Objet', 'Objet', '', 1, 'Objet', ''));
		$contact->ajouterComposantLigne($contact->br());
		$contact->ajouterComposantLigne($contact->creerInputGrandTexte('Message', 'Message', '', 1, 'Votre message', ''));
		$contact->ajouterComposantLigne($contact->br());
		$contact->ajouterComposantLigne($contact->creerLabel("","",'<h2>Pièces jointes :</h2>'));		
		$contact->ajouterComposantLigne($contact->creerInputFile('Pjointes', 'Pjointes'));
		$contact->ajouterComposantLigne($contact->br());
		$contact->ajouterComposantLigne($contact-> creerInputSubmit('submitMail', 'submitMail', 'Valider'));
		$contact->ajouterComposantLigne($contact->br());
		$contact->ajouterComposantLigne($contact->br());
		$contact->ajouterComposantLigne($contact->creerMessage($messageErreurMail));
	$contact->ajouterComposantLigne($contact->finDiv());
	
$contact->ajouterComposantTab();
$contact->creerFormulaire();

require_once "vue/vueContact.php";








function smtpMailer($to, $from, $from_name, $subject, $body,$attachment) 
{

	$mail = new PHPMailer();  // Cree un nouvel objet PHPMailer
	$mail->IsSMTP(); // active SMTP
	$mail->SMTPDebug = 0;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
	$mail->SMTPAuth = true;  // Authentification SMTP active
	$mail->SMTPSecure = 'ssl'; // Gmail REQUIERT Le transfert securise
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->Username = 'yoan.laurain1@gmail.com';
	$mail->Password = 'Chevalier33';

	$mail->addAttachment($attachment['tmp_name']);
	$mail->setFrom($from,$from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
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