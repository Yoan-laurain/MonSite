<?php

$messageVeilleModif="";

if (isset($_POST['submitVAjout'])) 
{
	$result = ArticleDAO::ajouter(new article($_POST['titre'], $_POST['lien'],$_POST['date']));

	$messageVeilleModif =  $result ? "Ajout réussi" : "Echec ajout";
}


$topVeilleModif = new Formulaire('post', 'index.php', 'ftopVeilleModif', 'ftopVeilleModif');
$topVeilleModif->ajouterComposantLigne($topVeilleModif->debutDiv("topVeilleModif"));
    $topVeilleModif->ajouterComposantLigne($topVeilleModif->debutDiv("topVeilleModif2"));
        $topVeilleModif->ajouterComposantLigne($topVeilleModif->creerTitre("Modification de ma veille"));
    $topVeilleModif->ajouterComposantLigne($topVeilleModif->finDiv());
$topVeilleModif->ajouterComposantLigne($topVeilleModif->finDiv());
$topVeilleModif->ajouterComposantTab();
$topVeilleModif->creerFormulaire();


if (isset($_GET['supp'])) {
    ArticleDAO::supprimer($_GET['supp']);
}


$page = isset($_GET['page']) ? $_GET['page'] : 1;




//Formulaire des boutons//

$Boutons = new Formulaire('post', 'index.php', 'fboutons', 'fboutons');
$Boutons->ajouterComposantLigne($Boutons-> creerInputSubmit('submitFormulaireAjout', 'submitFormulaireAjout', 'Afficher Formulaire ajout'));
$Boutons->ajouterComposantTab();
$Boutons->creerFormulaire();

//Si j'appuie sur le bouton d'affichage du formulaire ajout//

if (isset($_POST['submitFormulaireAjout'])) 
{
    $VeilleModif = new Formulaire('post', 'index.php', 'fVeilleModif', 'fVeilleModif');

    $VeilleModif->ajouterComposantLigne($VeilleModif->debutDiv("MidVeilleModif"));

		$VeilleModif->ajouterComposantLigne($VeilleModif->debutDiv("GaucheVeilleModif"));
			$VeilleModif->ajouterComposantLigne($VeilleModif->debutDiv("TextVeilleModif"));
				$VeilleModif->ajouterComposantLigne($VeilleModif->creerImage("images/LogoConnexion.png"));
				$VeilleModif->ajouterComposantLigne($VeilleModif->creerTitre("Veroz"));
				$VeilleModif->ajouterComposantLigne($VeilleModif->br());
				$VeilleModif->ajouterComposantLigne($VeilleModif->creerLabel("","",'<h2>Gestion de ta VeilleModif</h2>'));	
			$VeilleModif->ajouterComposantLigne($VeilleModif->finDiv());		
		$VeilleModif->ajouterComposantLigne($VeilleModif->finDiv());

		$VeilleModif->ajouterComposantLigne($VeilleModif->debutDiv("DroiteVeilleModif"));
			$VeilleModif->ajouterComposantLigne($VeilleModif->creerTitre("Ajout"));
			$VeilleModif->ajouterComposantLigne($VeilleModif->creerLabel("","",'<h2>Titre article :</h2>'));		
			$VeilleModif->ajouterComposantLigne($VeilleModif->creerInputTexte('titre', 'titre', '', 1, '', ''));
			$VeilleModif->ajouterComposantLigne($VeilleModif->br());
			$VeilleModif->ajouterComposantLigne($VeilleModif->creerLabel("","",'<h2>Lien :</h2>'));
			$VeilleModif->ajouterComposantLigne($VeilleModif->creerInputTexte('lien', 'lien', '', 1, '', ''));
            $VeilleModif->ajouterComposantLigne($VeilleModif->br());
            $VeilleModif->ajouterComposantLigne($VeilleModif->creerLabel("","",'<h2>Date :</h2>'));
			$VeilleModif->ajouterComposantLigne($VeilleModif->creerInputTexte('date', 'date', '', 1, '', ''));
			$VeilleModif->ajouterComposantLigne($VeilleModif->br());
            $VeilleModif->ajouterComposantLigne($VeilleModif-> creerInputSubmit('submitVAjout', 'submitVAjout', 'Valider'));
            $VeilleModif->ajouterComposantLigne($VeilleModif->br());
			$VeilleModif->ajouterComposantLigne($VeilleModif->br());
			$VeilleModif->ajouterComposantLigne($VeilleModif->creerMessage($messageVeilleModif));
		$VeilleModif->ajouterComposantLigne($VeilleModif->finDiv());
            
    $VeilleModif->ajouterComposantLigne($VeilleModif->finDiv());
    $VeilleModif->ajouterComposantTab();
    
    $VeilleModif->creerFormulaire();
}
    
//Si j'appuie sur le bouton d'affichage de mes articles//

    $VeilleModif2 = new Formulaire('get', 'index.php', 'fVeilleModif2', 'fVeilleModif2');
    
    //Partie VeilleModif/

    $_SESSION['listeArticles'] = new Articles(ArticleDAO::lesArticles($page));

    $i=0;
    $t=1;

    foreach ($_SESSION['listeArticles']->getArticles() as $unArticle)
    {
        
        if($i%3==0)
        {
            $VeilleModif2->ajouterComposantLigne($VeilleModif2->debutDiv("PMidVeilleModif"));
        }
            $VeilleModif2->ajouterComposantLigne($VeilleModif2->debutDiv("PMidVeilleModif2"));
            
                $VeilleModif2->ajouterComposantLigne($VeilleModif2->creerLabelLink("cross", "", "index.php?veroz=veilleModif&supp=" . $unArticle->getIdArticle(), "r", ""));

                $VeilleModif2->ajouterComposantLigne($VeilleModif2->debutDiv("PMidVeilleModifTitre"));
                    $VeilleModif2->ajouterComposantLigne($VeilleModif2->creerTitre("".$unArticle->getTitre()));
                $VeilleModif2->ajouterComposantLigne($VeilleModif2->finDiv());
                $VeilleModif2->ajouterComposantLigne($VeilleModif2->debutDiv("PMidVeilleModifTexte"));
                    $VeilleModif2->ajouterComposantLigne($VeilleModif2->creerTitre("Date : ".$unArticle->getDate(), 2));
                $VeilleModif2->ajouterComposantLigne($VeilleModif2->finDiv());
                $VeilleModif2->ajouterComposantLigne($VeilleModif2->debutDiv("PMidVeilleModifBoutton"));
                    $VeilleModif2->ajouterComposantLigne($VeilleModif2->creerLabelLink("voir", "", $unArticle->getLien(), "VOIR", "_blank"));             
                $VeilleModif2->ajouterComposantLigne($VeilleModif2->finDiv());

            $VeilleModif2->ajouterComposantLigne($VeilleModif2->finDiv());
        if($t%3==0)
        {
            $VeilleModif2->ajouterComposantLigne($VeilleModif2->finDiv());
        }
    $t++;
    $i++;
    }
    $VeilleModif2->ajouterComposantLigne($VeilleModif2->finDiv());
    $VeilleModif2->ajouterComposantTab();
    $VeilleModif2->creerFormulaire();



$fPage = new Formulaire('post', 'index.php', 'fPage', 'fPage');
if (count($_SESSION['listeArticles']->getArticles()) == 0) {
    $fPage->ajouterComposantLigne($fPage->creerTitre("Aucun article"));
} else {
    if ($page > 1) {
        $fPage->ajouterComposantLigne($fPage->creerLabelLink("", "", "index.php?veroz=veilleModif&page=" . ($page - 1), "◄ Page précédente", ""));
    }
    if (count($_SESSION['listeArticles']->getArticles()) == 12) {
        $fPage->ajouterComposantLigne($fPage->creerLabelLink("", "", "index.php?veroz=veilleModif&page=" . ($page + 1), "Page suivante ►", ""));
    }
}


$fPage->ajouterComposantTab();
$fPage->creerFormulaire();

require_once "vue/vueVeilleModif.php";