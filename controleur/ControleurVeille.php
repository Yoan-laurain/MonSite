<?php

$Veille = new Formulaire('post', 'index.php', 'fVeille', 'fVeille');

$page = isset($_GET['page']) ? $_GET['page'] : 1;

//Partie Image du top avec Texte de présentation//

$Veille->ajouterComposantLigne($Veille->debutDiv("topVeille"));
    $Veille->ajouterComposantLigne($Veille->debutDiv("topVeille2"));
        $Veille->ajouterComposantLigne($Veille->creerTitre("Ma Veille"));
        $Veille->ajouterComposantLigne($Veille->creerTitre("Vous trouverez ici tous les articles que j'ai récolté concernant ma veille et vous pouvez les consultés!", 2));
    $Veille->ajouterComposantLigne($Veille->finDiv());   
$Veille->ajouterComposantLigne($Veille->finDiv());
$Veille->ajouterComposantTab();

                                                    //Partie veille/

//Récupère tout mes articles//

$_SESSION['listeArticles'] = new Articles(ArticleDAO::lesArticles($page));

$i=0;
$t=1;

//Pour chacun d'eux crée un block et saute de ligne tout les 3 articles//

foreach ($_SESSION['listeArticles']->getArticles() as $unArticle)
{
    if($i%3==0)
    {
        $Veille->ajouterComposantLigne($Veille->finDiv());
        $Veille->ajouterComposantLigne($Veille->debutDiv("MidVeille"));
    }
        $Veille->ajouterComposantLigne($Veille->debutDiv("MidVeille2"));
            $Veille->ajouterComposantLigne($Veille->debutDiv("MidVeilleTitre"));
                $Veille->ajouterComposantLigne($Veille->creerTitre("".$unArticle->getTitre()));
            $Veille->ajouterComposantLigne($Veille->finDiv());
            $Veille->ajouterComposantLigne($Veille->debutDiv("MidVeilleTexte"));
                $Veille->ajouterComposantLigne($Veille->creerTitre("Date : ".$unArticle->getDate(), 2));
            $Veille->ajouterComposantLigne($Veille->finDiv());
            $Veille->ajouterComposantLigne($Veille->debutDiv("MidVeilleBoutton"));
                $Veille->ajouterComposantLigne($Veille->creerLabelLink("", "", $unArticle->getLien(), "VOIR", ""));             
            $Veille->ajouterComposantLigne($Veille->finDiv());
        $Veille->ajouterComposantLigne($Veille->finDiv());
    if($t%3==0)
    {
        $Veille->ajouterComposantLigne($Veille->finDiv());
    }
  $t++;
  $i++;
}
$Veille->ajouterComposantLigne($Veille->finDiv());
$Veille->ajouterComposantTab();
$Veille->creerFormulaire();


$fPage = new Formulaire('post', 'index.php', 'fPage', 'fPage');
if (count($_SESSION['listeArticles']->getArticles()) == 0) {
    $fPage->ajouterComposantLigne($fPage->creerTitre("Aucun article"));
} else {
    if ($page > 1) {
        $fPage->ajouterComposantLigne($fPage->creerLabelLink("", "", "index.php?veroz=veille&page=" . ($page - 1), "◄ Page précédente", ""));
    }
    if (count($_SESSION['listeArticles']->getArticles()) == 12) {
        $fPage->ajouterComposantLigne($fPage->creerLabelLink("", "", "index.php?veroz=veille&page=" . ($page + 1), "Page suivante ►", ""));
    }
}


$fPage->ajouterComposantTab();
$fPage->creerFormulaire();

require_once 'vue/vueVeille.php' ;
?>