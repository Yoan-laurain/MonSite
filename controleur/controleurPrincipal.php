<?php
// Recupere dans l'url le menu ou en defini un si existe pas

if(isset($_GET['veroz'])){
	$_SESSION['veroz'] = $_GET['veroz'];
}
else
{
	if(!isset($_SESSION['veroz'])){
		$_SESSION['veroz'] = "accueil";
	}
}
///////////////////////////////////////////Si il veut se connecter//////////////////////////////////////////////////////////

if (isset($_POST['submitConnex'])) 
{    
    $_SESSION['identification'] = utilisateurDAO::verification(new utilisateur($_POST['login'], $_POST['mdp']));

    if($_SESSION['identification']) //Est authentifie//
    {
        $_SESSION['veroz']="accueil";
    }
    else //N'est pas authentifie//
    {
        $messageErreurConnexion= "Erreur de login ou de mdp";
    }
}
// ####################################################################################################
// Menu de navigation
$menuNav = new Menu("veroz");

// ####################################################################################################


//Affiche connexion ou deconnexion suivant si l'utilisateur est connect�//

if (isset($_SESSION['identification']) && ($_SESSION['identification'])) //Si il est authentifi� //
{
	$menuNav->ajouterComposant($menuNav->creerItemLien("accueil", "ACCUEIL"));
	$menuNav->ajouterComposant($menuNav->creerItemLien("veilleModif", "VEILLEM"));
	$menuNav->ajouterComposant($menuNav->creerItemLien("parcoursModif", "PARCOURSM"));
	$menuNav->ajouterComposant($menuNav->creerItemLien("projetsModif", "PROJETSM"));
	$menuNav->ajouterComposant($menuNav->creerItemLien("connexion", ""));
	$menuNav->ajouterComposant($menuNav->creerItemLien("contact", ""));
}
else
{
	$menuNav->ajouterComposant($menuNav->creerItemLien("accueil", "ACCUEIL"));
	$menuNav->ajouterComposant($menuNav->creerItemLien("veille", "MA VEILLE"));
	$menuNav->ajouterComposant($menuNav->creerItemLien("parcours", "MON PARCOURS"));
	$menuNav->ajouterComposant($menuNav->creerItemLien("projets", "MES PROJETS"));
	$menuNav->ajouterComposant($menuNav->creerItemLien("connexion", ""));
	$menuNav->ajouterComposant($menuNav->creerItemLien("contact", ""));
}

$menuNav->creerMenu($_SESSION['veroz'], 'veroz');

// ####################################################################################################
// Footer

$formFooter = new Formulaire('post', 'index.php', 'fFooter', 'fFooter');

$formFooter->ajouterComposantLigne($formFooter->debutDiv("footerup"));

	$formFooter->ajouterComposantLigne($formFooter->debutDiv("footerlink"));
		$formFooter->ajouterComposantLigne($formFooter->debutDiv("footerlinkartc"));
			$formFooter->ajouterComposantLigne($formFooter->creerTitre("CATÉGORIES"));
			$formFooter->ajouterComposantLigne($formFooter->debutUl());
				$formFooter->ajouterComposantLigne($formFooter->debutLi());
					$formFooter->ajouterComposantLigne($formFooter->creerLabelLink("", "", "index.php?veroz=veille", "Ma veille"));
				$formFooter->ajouterComposantLigne($formFooter->finLi());
				$formFooter->ajouterComposantLigne($formFooter->debutLi());
					$formFooter->ajouterComposantLigne($formFooter->creerLabelLink("", "", "index.php?veroz=parcours", "Mon parcours"));
				$formFooter->ajouterComposantLigne($formFooter->finLi());
				$formFooter->ajouterComposantLigne($formFooter->debutLi());
					$formFooter->ajouterComposantLigne($formFooter->creerLabelLink("", "", "index.php?veroz=projets", "Mes projets"));
				$formFooter->ajouterComposantLigne($formFooter->finLi());
			$formFooter->ajouterComposantLigne($formFooter->finUl());
		$formFooter->ajouterComposantLigne($formFooter->finDiv());

		$formFooter->ajouterComposantLigne($formFooter->debutDiv("footerlinkartc"));
			$formFooter->ajouterComposantLigne($formFooter->creerTitre("INFORMATIONS"));
			$formFooter->ajouterComposantLigne($formFooter->debutUl());
				$formFooter->ajouterComposantLigne($formFooter->debutLi());
					$formFooter->ajouterComposantLigne($formFooter->creerLabelLink("", "", "index.php?veroz=contacter", "Me contacter"));
				$formFooter->ajouterComposantLigne($formFooter->finLi());
				$formFooter->ajouterComposantLigne($formFooter->debutLi());
					$formFooter->ajouterComposantLigne($formFooter->creerLabelLink("", "", "index.php?veroz=conditions", "Conditions générales"));
				$formFooter->ajouterComposantLigne($formFooter->finLi());
			$formFooter->ajouterComposantLigne($formFooter->finUl());
		$formFooter->ajouterComposantLigne($formFooter->finDiv());
		
		$formFooter->ajouterComposantLigne($formFooter->debutDiv("footerlinkartc"));
			$formFooter->ajouterComposantLigne($formFooter->creerTitre("RÉSEAUX"));
			$formFooter->ajouterComposantLigne($formFooter->debutUl());
				$formFooter->ajouterComposantLigne($formFooter->debutLi());
					$formFooter->ajouterComposantLigne($formFooter->creerLabelLink("", "", "https://twitter.com/YoanLaurain", "Mon twitter", "_blank"));
				$formFooter->ajouterComposantLigne($formFooter->finLi());
				$formFooter->ajouterComposantLigne($formFooter->debutLi());
					$formFooter->ajouterComposantLigne($formFooter->creerLabelLink("", "", "https://www.instagram.com/yoanlaurain/", "Mon Instagram", "_blank"));
				$formFooter->ajouterComposantLigne($formFooter->finLi());
				$formFooter->ajouterComposantLigne($formFooter->debutLi());
					$formFooter->ajouterComposantLigne($formFooter->creerLabelLink("", "", "https://fr-fr.facebook.com/yoan.laurain.9", "Mon Facebook", "_blank"));
				$formFooter->ajouterComposantLigne($formFooter->finLi());
			$formFooter->ajouterComposantLigne($formFooter->finUl());
        $formFooter->ajouterComposantLigne($formFooter->finDiv());
        

		$formFooter->ajouterComposantLigne($formFooter->finDiv());
$formFooter->ajouterComposantLigne($formFooter->finDiv());


$formFooter->ajouterComposantLigne($formFooter->debutDiv("footerdown"));
	$formFooter->ajouterComposantLigne($formFooter->creerImage("images/icons8_developer_mode_96px.png", ""));
	$formFooter->ajouterComposantLigne($formFooter->creerLabelLink("", "", "javascript:void(0);", "© 2020, LAURAIN Yoan (alias Veroz). Tous droits réservés.", "", "bleep.play();"));
$formFooter->ajouterComposantLigne($formFooter->finDiv());

$formFooter->ajouterComposantTab();
$formFooter->creerFormulaire();
// ####################################################################################################

// Dispatch
require_once dispatcher::dispatch($_SESSION['veroz']);