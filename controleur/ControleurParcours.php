<?php

$Parcours = new Formulaire('post', 'index.php', 'fParcours', 'fParcours');

//Partie Image du top avec Texte de présentation//

$Parcours->ajouterComposantLigne($Parcours->debutDiv("topParcours"));
    $Parcours->ajouterComposantLigne($Parcours->debutDiv("topParcours2"));
        $Parcours->ajouterComposantLigne($Parcours->creerTitre("Mon Parcours"));
        $Parcours->ajouterComposantLigne($Parcours->creerTitre("Voici mon parcours professionel <br> et scolaire", 2));
    $Parcours->ajouterComposantLigne($Parcours->finDiv());
$Parcours->ajouterComposantLigne($Parcours->finDiv());

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

require_once "Vue/vueParcours.php";