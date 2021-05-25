<?php

if (isset($_GET['supp2']))
{
    CursusDAO::supprimer($_GET['supp2']);
}

if (isset($_POST['submitAjoutCursus']))
{
    $result = CursusDAO::ajouter(new Cursus('1', $_POST['Annee'], FiliereDAO::lire($_POST['Filiere'])));
    $messageParcoursModif =  $result ? "Ajout réussi" : "Echec ajout";
}

if (isset($_POST['submitAjoutFiliere'])) 
{
    $result = FiliereDAO::ajouter(new Filiere("", $_POST['NomFiliere']));
    $messageParcoursModif = $result ? "Ajout réussi" : "Echec ajout";
}

$topParcoursModif = new Formulaire('post', 'index.php', 'ftopParcoursModif', 'ftopParcoursModif');
$topParcoursModif->ajouterComposantLigne($topParcoursModif->debutDiv("topParcoursModif"));
    $topParcoursModif->ajouterComposantLigne($topParcoursModif->debutDiv("topParcoursModif2"));
        $topParcoursModif->ajouterComposantLigne($topParcoursModif->creerTitre("Modification de mon parcours"));
    $topParcoursModif->ajouterComposantLigne($topParcoursModif->finDiv());
$topParcoursModif->ajouterComposantLigne($topParcoursModif->finDiv());
$topParcoursModif->ajouterComposantTab();
$topParcoursModif->creerFormulaire();

$messageParcoursModif="";

//Formulaire des boutons//

$Boutons = new Formulaire('post', 'index.php', 'fboutons', 'fboutons');
$Boutons->ajouterComposantLigne($Boutons-> creerInputSubmit('submitVoirParcours', 'submitVoirParcours', 'Afficher le parcours'));
$Boutons->ajouterComposantLigne($Boutons-> creerInputSubmit('submitFormulaireAjoutParcours', 'submitFormulaireAjoutParcours', 'Formulaire ajout Filiere'));
$Boutons->ajouterComposantLigne($Boutons-> creerInputSubmit('submitFormulaireAjoutCursus', 'submitFormulaireAjoutCursus', 'Formulaire ajout Cursus'));

$Boutons->ajouterComposantTab();
$Boutons->creerFormulaire();

//Si j'appuie sur le bouton d'affichage du formulaire ajout//

if (isset($_POST['submitVoirParcours'])) 
{
 $Parcours = new Formulaire('post', 'index.php', 'fParcours', 'fParcours');
//Récupère tout mon cursus scolaire//

$_SESSION['listeParcours'] = new  CursusS(CursusDAO::lesCursuss());

//Pour chacun d'eux crée un block //
$i=0;
$Parcours->ajouterComposantLigne($Parcours->debutDiv("contParcours"));
    foreach ($_SESSION['listeParcours']->getCursusS() as $unCursus)
    {
        if($i%2==0)
        {
            //Partie Gauche Texte
        
            $Parcours->ajouterComposantLigne($Parcours->debutDiv("MidParcoursGauche"));
                $Parcours->ajouterComposantLigne($Parcours->debutDiv("MidParcoursGauche2"));
                $Parcours->ajouterComposantLigne($Parcours->creerLabelLink("cross", "", "index.php?veroz=parcoursModif&supp2=" . $unCursus->getAnnee(), "r", ""));
                    $Parcours->ajouterComposantLigne($Parcours->debutDiv("MidParcoursTexteGauche"));
                        $Parcours->ajouterComposantLigne($Parcours->creerTitre(CursusDAO::lire($unCursus->getIdFiliere())));
                    $Parcours->ajouterComposantLigne($Parcours->finDiv());
                    $Parcours->ajouterComposantLigne($Parcours->debutDiv("MidParcoursTexte"));
                        $Parcours->ajouterComposantLigne($Parcours->creerTitre( $unCursus->getAnnee()));
                    $Parcours->ajouterComposantLigne($Parcours->finDiv());
                $Parcours->ajouterComposantLigne($Parcours->finDiv());
            $Parcours->ajouterComposantLigne($Parcours->finDiv());
        
            //Partie Droite Image
        
            $Parcours->ajouterComposantLigne($Parcours->debutDiv("MidParcoursDroite"));
                $Parcours->ajouterComposantLigne($Parcours->debutDiv("MidParcoursDroite2"));
                    $Parcours->ajouterComposantLigne($Parcours->debutDiv("MidParcoursImageDroite"));
                        $Parcours->ajouterComposantLigne($Parcours->creerImage("Images/Parcours4.svg"));
                    $Parcours->ajouterComposantLigne($Parcours->finDiv());
                $Parcours->ajouterComposantLigne($Parcours->finDiv());
            $Parcours->ajouterComposantLigne($Parcours->finDiv());
        }
        else
        {
            //Partie Gauche Image
            
            $Parcours->ajouterComposantLigne($Parcours->debutDiv("MidParcoursGauche"));
                $Parcours->ajouterComposantLigne($Parcours->debutDiv("MidParcoursGauche2"));
                $Parcours->ajouterComposantLigne($Parcours->creerLabelLink("cross", "", "index.php?veroz=parcoursModif&supp2=" . $unCursus->getAnnee(), "r", ""));
                    $Parcours->ajouterComposantLigne($Parcours->debutDiv("MidParcoursImageGauche"));
                         $Parcours->ajouterComposantLigne($Parcours->creerImage("Images/Parcours5.svg"));
                    $Parcours->ajouterComposantLigne($Parcours->finDiv());
                $Parcours->ajouterComposantLigne($Parcours->finDiv());
            $Parcours->ajouterComposantLigne($Parcours->finDiv());

            //Partie Droite Texte
        
            $Parcours->ajouterComposantLigne($Parcours->debutDiv("MidParcoursDroite"));
                $Parcours->ajouterComposantLigne($Parcours->debutDiv("MidParcoursDroite2"));
                    $Parcours->ajouterComposantLigne($Parcours->debutDiv("MidParcoursTexteDroite"));
                        $Parcours->ajouterComposantLigne($Parcours->creerTitre(CursusDAO::lire($unCursus->getIdFiliere())));
                    $Parcours->ajouterComposantLigne($Parcours->finDiv());
                    $Parcours->ajouterComposantLigne($Parcours->debutDiv("MidParcoursTexte"));
                        $Parcours->ajouterComposantLigne($Parcours->creerTitre( $unCursus->getAnnee()));
                    $Parcours->ajouterComposantLigne($Parcours->finDiv());
                $Parcours->ajouterComposantLigne($Parcours->finDiv());
            $Parcours->ajouterComposantLigne($Parcours->finDiv());
        }
        $i++;
    }
    $Parcours->ajouterComposantLigne($Parcours->finDiv());

    $Parcours->ajouterComposantTab();
    $Parcours->creerFormulaire();
}


if (isset($_POST['submitFormulaireAjoutParcours'])) 
{
    $Cursus = new Formulaire('post', 'index.php', 'fCursus', 'fCursus');

    $Cursus->ajouterComposantLigne($Cursus->debutDiv("MidParcoursModif"));

		$Cursus->ajouterComposantLigne($Cursus->debutDiv("GaucheParcoursModif"));
			$Cursus->ajouterComposantLigne($Cursus->debutDiv("TextParcoursModif"));
				$Cursus->ajouterComposantLigne($Cursus->creerImage("images/LogoConnexion.png"));
				$Cursus->ajouterComposantLigne($Cursus->creerTitre("Veroz"));
				$Cursus->ajouterComposantLigne($Cursus->br());
				$Cursus->ajouterComposantLigne($Cursus->creerLabel("","",'<h2>Gestion des filieres</h2>'));	
			$Cursus->ajouterComposantLigne($Cursus->finDiv());		
		$Cursus->ajouterComposantLigne($Cursus->finDiv());

		$Cursus->ajouterComposantLigne($Cursus->debutDiv("DroiteParcoursModif"));
			$Cursus->ajouterComposantLigne($Cursus->creerTitre("Ajout"));
			$Cursus->ajouterComposantLigne($Cursus->creerLabel("","",'<h2>Nom filiere :</h2>'));		
			$Cursus->ajouterComposantLigne($Cursus->creerInputTexte('NomFiliere', 'NomFiliere', '', 1, '', ''));
			$Cursus->ajouterComposantLigne($Cursus->br());
            $Cursus->ajouterComposantLigne($Cursus-> creerInputSubmit('submitAjoutFiliere', 'submitAjoutFiliere', 'Valider'));
            $Cursus->ajouterComposantLigne($Cursus->br());
			$Cursus->ajouterComposantLigne($Cursus->br());
			$Cursus->ajouterComposantLigne($Cursus->creerMessage($messageParcoursModif));
		$Cursus->ajouterComposantLigne($Cursus->finDiv());
            
    $Cursus->ajouterComposantLigne($Cursus->finDiv());
    $Cursus->ajouterComposantTab();
    
    $Cursus->creerFormulaire();
}

if (isset($_POST['submitFormulaireAjoutCursus'])) 
{
    $_SESSION['listeFiliere'] = new  Filieres(FiliereDAO::lesFilieres());

    $ParcoursModif = new Formulaire('post', 'index.php', 'fParcoursModif', 'fParcoursModif');

    $ParcoursModif->ajouterComposantLigne($ParcoursModif->debutDiv("MidParcoursModif"));

		$ParcoursModif->ajouterComposantLigne($ParcoursModif->debutDiv("GaucheParcoursModif"));
			$ParcoursModif->ajouterComposantLigne($ParcoursModif->debutDiv("TextParcoursModif"));
				$ParcoursModif->ajouterComposantLigne($ParcoursModif->creerImage("images/LogoConnexion.png"));
				$ParcoursModif->ajouterComposantLigne($ParcoursModif->creerTitre("Veroz"));
				$ParcoursModif->ajouterComposantLigne($ParcoursModif->br());
				$ParcoursModif->ajouterComposantLigne($ParcoursModif->creerLabel("","",'<h2>Gestion des filieres</h2>'));	
			$ParcoursModif->ajouterComposantLigne($ParcoursModif->finDiv());		
		$ParcoursModif->ajouterComposantLigne($ParcoursModif->finDiv());

        $ParcoursModif->ajouterComposantLigne($ParcoursModif->debutDiv("DroiteParcoursModif"));
                    
			$ParcoursModif->ajouterComposantLigne($ParcoursModif->creerTitre("Ajout"));
			$ParcoursModif->ajouterComposantLigne($ParcoursModif->creerLabel("","",'<h2>Année :</h2>'));		
			$ParcoursModif->ajouterComposantLigne($ParcoursModif->creerInputTexte('Annee', 'Annee', '', 1, '', ''));
            $ParcoursModif->ajouterComposantLigne($ParcoursModif->br());
            $ParcoursModif->ajouterComposantLigne($ParcoursModif->creerLabel("","",'<h2>Filiere :</h2>'));		
			$ParcoursModif->ajouterComposantLigne($ParcoursModif->creerSelect('Filiere', 'Filiere',  $_SESSION['listeFiliere']->getFilieres(),''));
			$ParcoursModif->ajouterComposantLigne($ParcoursModif->br());
            $ParcoursModif->ajouterComposantLigne($ParcoursModif-> creerInputSubmit('submitAjoutCursus', 'submitAjoutCursus', 'Valider'));
            $ParcoursModif->ajouterComposantLigne($ParcoursModif->br());
			$ParcoursModif->ajouterComposantLigne($ParcoursModif->br());
			$ParcoursModif->ajouterComposantLigne($ParcoursModif->creerMessage($messageParcoursModif));
		$ParcoursModif->ajouterComposantLigne($ParcoursModif->finDiv());
            
    $ParcoursModif->ajouterComposantLigne($ParcoursModif->finDiv());
    $ParcoursModif->ajouterComposantTab();
    
    $ParcoursModif->creerFormulaire();
}

require_once "vue/vueParcoursModif.php";