<?php

$messageProjetModif="";

if (isset($_POST['submitVAjoutProjet'])) 
{
	$result = ProjetDAO::ajouter(new Projet("",$_POST['NomProjet'], $_POST['Description']));

	$messageProjetModif =  $result ? "Ajout réussi" : "Echec ajout";
}

if (isset($_GET['supp3']))
{
    ProjetDAO::supprimer($_GET['supp3']);
}

$topProjetModif = new Formulaire('post', 'index.php', 'ftopProjetModif', 'ftopProjetModif');
$topProjetModif->ajouterComposantLigne($topProjetModif->debutDiv("topProjetModif"));
    $topProjetModif->ajouterComposantLigne($topProjetModif->debutDiv("topProjetModif2"));
        $topProjetModif->ajouterComposantLigne($topProjetModif->creerTitre("Modification de mes projets"));
    $topProjetModif->ajouterComposantLigne($topProjetModif->finDiv());
$topProjetModif->ajouterComposantLigne($topProjetModif->finDiv());
$topProjetModif->ajouterComposantTab();
$topProjetModif->creerFormulaire();

//Formulaire des boutons//

$Boutons = new Formulaire('post', 'index.php', 'fboutons', 'fboutons');
$Boutons->ajouterComposantLigne($Boutons-> creerInputSubmit('submitFormulaireAjout', 'submitFormulaireAjout', ' Ajout '));
$Boutons->ajouterComposantLigne($Boutons-> creerInputSubmit('submitFormulaireAffichage', 'submitFormulaireAffichage', ' Affichage '));

$Boutons->ajouterComposantTab();
$Boutons->creerFormulaire();

if (isset($_POST['submitFormulaireAffichage']))
{
	$projet = new Formulaire('post', 'index.php', 'fprojet', 'fprojet');
	//Récupère tout mes projets//

	$_SESSION['listeProjets'] = new Projets(ProjetDAO::lesProjets());

	//Pour chacun d'eux crée un block//

	$projet->ajouterComposantLigne($projet->debutDiv("contProjet"));
		foreach ($_SESSION['listeProjets']->getProjets() as $unProjet)
		{
			$_SESSION['listePhotos'] = new Photos(PhotoDAO::lire($unProjet->getIdProjet()));

			$projet->ajouterComposantLigne($projet->debutDiv("MidProjet"));
			$projet->ajouterComposantLigne($projet->creerLabelLink("cross", "", "index.php?veroz=projetsModif&supp3=" . $unProjet->getIdProjet(), "r", ""));
 
				$projet->ajouterComposantLigne($projet->creerTitre($unProjet->getNom()));
				$projet->ajouterComposantLigne($projet->debutDiv("MidProjetTexte"));
					$projet->ajouterComposantLigne($projet->creerTitre($unProjet->getDescription(), 2));
				$projet->ajouterComposantLigne($projet->finDiv());

												//PARTIE CAROUSSEL//

				if(!empty($_SESSION['listePhotos']->getPhotos()))
				{
					$i=0;
					$projet->ajouterComposantLigne($projet->debutDiv("MidProjetImage"));
						$projet->ajouterComposantLigne($projet->debutDiv("DivCarrousel"));
							$projet->ajouterComposantLigne("<section class=carousel>");      
									$projet->ajouterComposantLigne($projet->debutUl2("carrousel_items"));
										foreach ($_SESSION['listePhotos']->getPhotos() as $unePhoto)
										{
										$projet->ajouterComposantLigne($projet->creeCarrousel("images/".$unePhoto->getUrl().".png","",$i));
										$i++;
										}
									$projet->ajouterComposantLigne($projet->finUl());
								$projet->ajouterComposantLigne($projet->finDiv());
							$projet->ajouterComposantLigne("</section>");
						$projet->ajouterComposantLigne($projet->finDiv());
					$projet->ajouterComposantLigne($projet->finDiv());
				}
				


			$projet->ajouterComposantTab();
		}
	$projet->ajouterComposantLigne($projet->finDiv());

	$projet->creerFormulaire();
}


//Si j'appuie sur le bouton d'affichage du formulaire ajout//

if (isset($_POST['submitFormulaireAjout'])) 
{
    $ProjetModif = new Formulaire('post', 'index.php', 'fProjetModif', 'fProjetModif');

    $ProjetModif->ajouterComposantLigne($ProjetModif->debutDiv("MidProjetModif"));

		$ProjetModif->ajouterComposantLigne($ProjetModif->debutDiv("GaucheProjetModif"));
			$ProjetModif->ajouterComposantLigne($ProjetModif->debutDiv("TextProjetModif"));
				$ProjetModif->ajouterComposantLigne($ProjetModif->creerImage("images/LogoConnexion.png"));
				$ProjetModif->ajouterComposantLigne($ProjetModif->creerTitre("Veroz"));
				$ProjetModif->ajouterComposantLigne($ProjetModif->br());
				$ProjetModif->ajouterComposantLigne($ProjetModif->creerLabel("","",'<h2>Gestion de tes Projets</h2>'));	
			$ProjetModif->ajouterComposantLigne($ProjetModif->finDiv());		
		$ProjetModif->ajouterComposantLigne($ProjetModif->finDiv());

		$ProjetModif->ajouterComposantLigne($ProjetModif->debutDiv("DroiteProjetModif"));
			$ProjetModif->ajouterComposantLigne($ProjetModif->creerTitre("Ajout"));
			$ProjetModif->ajouterComposantLigne($ProjetModif->creerLabel("","",'<h2>Nom projet :</h2>'));		
			$ProjetModif->ajouterComposantLigne($ProjetModif->creerInputTexte('NomProjet', 'NomProjet', '', 1, '', ''));
			$ProjetModif->ajouterComposantLigne($ProjetModif->br());
			$ProjetModif->ajouterComposantLigne($ProjetModif->creerLabel("","",'<h2>Description :</h2>'));
			$ProjetModif->ajouterComposantLigne($ProjetModif->creerInputGrandTexte('Description', 'Description', '', 1, '', ''));
			$ProjetModif->ajouterComposantLigne($ProjetModif->br());
            $ProjetModif->ajouterComposantLigne($ProjetModif-> creerInputSubmit('submitVAjoutProjet', 'submitVAjoutProjet', 'Valider'));
            $ProjetModif->ajouterComposantLigne($ProjetModif->br());
			$ProjetModif->ajouterComposantLigne($ProjetModif->br());
			$ProjetModif->ajouterComposantLigne($ProjetModif->creerMessage($messageProjetModif));
		$ProjetModif->ajouterComposantLigne($ProjetModif->finDiv());
            
    $ProjetModif->ajouterComposantLigne($ProjetModif->finDiv());
    $ProjetModif->ajouterComposantTab();
    
    $ProjetModif->creerFormulaire();
}

require_once "vue/vueProjetsModif.php";