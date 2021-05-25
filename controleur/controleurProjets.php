<?php

$projet = new Formulaire('post', 'index.php', 'fprojet', 'fprojet');

//Partie Image du top avec Texte de présentation//

$projet->ajouterComposantLigne($projet->debutDiv("topProjet"));
    $projet->ajouterComposantLigne($projet->debutDiv("topProjet2"));
        $projet->ajouterComposantLigne($projet->creerTitre("Mes projets"));
        $projet->ajouterComposantLigne($projet->creerTitre("Vous trouverez ici tous les projets que j'ai réalisés ainsi que des images et des informations à propos d'eux", 2));
    $projet->ajouterComposantLigne($projet->finDiv());
    
$projet->ajouterComposantLigne($projet->finDiv());
$projet->ajouterComposantTab();

                                                        //Partie projet//

//Récupère tout mes projets//

$_SESSION['listeProjets'] = new Projets(ProjetDAO::lesProjets());

//Pour chacun d'eux crée un block//

$projet->ajouterComposantLigne($projet->debutDiv("contProjet"));
    foreach ($_SESSION['listeProjets']->getProjets() as $unProjet)
    {
        $_SESSION['listePhotos'] = new Photos(PhotoDAO::lire($unProjet->getIdProjet()));

        $projet->ajouterComposantLigne($projet->debutDiv("MidProjet"));
            $projet->ajouterComposantLigne($projet->creerTitre($unProjet->getNom()));
            $projet->ajouterComposantLigne($projet->debutDiv("MidProjetTexte"));
                $projet->ajouterComposantLigne($projet->creerTitre($unProjet->getDescription(), 2));
            $projet->ajouterComposantLigne($projet->finDiv());

                                            //PARTIE CAROUSSEL//

            if(!empty($_SESSION['listePhotos']->getPhotos()))
            {
                $i=1;
                $projet->ajouterComposantLigne($projet->debutDiv("MidProjetImage"));
                    $projet->ajouterComposantLigne($projet->debutDiv("DivCarrousel"));
                        $projet->ajouterComposantLigne("<section class=carousel>");      
                                $projet->ajouterComposantLigne($projet->debutUl2("carrousel_items"));
                                    foreach ($_SESSION['listePhotos']->getPhotos() as $unePhoto)
                                    {
                                    $projet->ajouterComposantLigne($projet->creeCarrousel("images/".$unProjet->getNom().$i.".png","",$i));
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

require_once 'vue/vueProjets.php' ;
?>