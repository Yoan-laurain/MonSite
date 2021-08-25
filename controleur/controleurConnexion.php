<?php

$messageErreurConnexion="";




$topConnexion = new Formulaire('post', 'index.php', 'ftopConnexion', 'ftopConnexion');

//Partie Image du top avec Texte de présentation//

$topConnexion->ajouterComposantLigne($topConnexion->debutDiv("topConnexion"));
    $topConnexion->ajouterComposantLigne($topConnexion->debutDiv("topConnexion2"));
        $topConnexion->ajouterComposantLigne($topConnexion->creerTitre("CONNEXION"));
   $topConnexion->ajouterComposantLigne($topConnexion->finDiv());
    
$topConnexion->ajouterComposantLigne($topConnexion->finDiv());
$topConnexion->ajouterComposantTab();
$topConnexion->creerFormulaire();

if(!isset($_SESSION['identification']) || !$_SESSION['identification'])
{
$formulaireConnexion = new Formulaire('post', 'index.php', 'fConnexion', 'fConnexion');
	
									//Partie fauche du formualire//

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->debutDiv("MidConnexion"));
	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->debutDiv("GaucheConnexion"));
		$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->debutDiv("TextConnexion"));
			$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerImage("images/LogoConnexion.png"));
			$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerTitre("Veroz"));
			$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->br());
			$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel("","",'<h2>Ton espace personel</h2>'));	
		$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->finDiv());		
	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->finDiv());

									//Partie droite du formulaire//

	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->debutDiv("DroiteConnexion"));
		$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerTitre("Sign in"));
		$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel("","",'<h2>Identifiant :</h2>'));		
		$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexte('login', 'login', '', 1, 'Entrez votre identifiant', ''));
		$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->br());
		$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel("","",'<h2>Mot de Passe :</h2>'));
		$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputMdp('mdp', 'mdp',  1, 'Entrez votre mot de passe', ''));
		$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->br());
		$formulaireConnexion->ajouterComposantLigne($formulaireConnexion-> creerInputSubmit('submitConnex', 'submitConnex', 'Valider'));
		$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->br());
		$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->br());
		$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerMessage($messageErreurConnexion));
	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->finDiv());
			
	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->finDiv());
	$formulaireConnexion->ajouterComposantTab();
	$formulaireConnexion->creerFormulaire();

	require_once 'vue/vueConnexion.php' ;
}
else
{
	$_SESSION['identification']=[];
	$_SESSION['veroz']="accueil";
	header('location: index.php');
}