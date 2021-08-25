<?php

$accueil = new Formulaire('post', 'index.php', 'fAccueil', 'fAccueil');

//Partie Image PC avec Texte de présentation//

$accueil->ajouterComposantLigne($accueil->debutDiv("topAccueil"));
    $accueil->ajouterComposantLigne($accueil->debutDiv("topAccueil2"));
        $accueil->ajouterComposantLigne($accueil->creerTitre("BIENVENUE"));
        $accueil->ajouterComposantLigne($accueil->creerTitre("Ce site est dédié à ma veille technologique ainsi qu'à mon parcours scolaire et professionnel", 2));
    $accueil->ajouterComposantLigne($accueil->finDiv());
    
$accueil->ajouterComposantLigne($accueil->finDiv());
$accueil->ajouterComposantTab();

//Premier block de l'accueil//

$accueil->ajouterComposantLigne($accueil->debutDiv("MidAccueil"));
    $accueil->ajouterComposantLigne($accueil->debutDiv("MidAccueil2"));
        $accueil->ajouterComposantLigne($accueil->creerTitre("Ma veille"));
        $accueil->ajouterComposantLigne($accueil->debutDiv("MidAccueilTexte"));
            $accueil->ajouterComposantLigne($accueil->creerTitre("Consultez ma veille sur L'Assurance qualité logiciel (AQL)", 2));
            $accueil->ajouterComposantLigne($accueil->creerLabelLink("", "", "index.php?veroz=veille", "CONSULTER", ""));
        $accueil->ajouterComposantLigne($accueil->finDiv());
        $accueil->ajouterComposantLigne($accueil->debutDiv("MidAccueilImage"));
        $accueil->ajouterComposantLigne($accueil->creerImage("images/Veille.svg"));
        $accueil->ajouterComposantLigne($accueil->finDiv());
    $accueil->ajouterComposantLigne($accueil->finDiv());

//Deuxieme block de l'accueil//

$accueil->ajouterComposantLigne($accueil->debutDiv("MidAccueil2"));
    $accueil->ajouterComposantLigne($accueil->creerTitre("Mon parcours "));
    $accueil->ajouterComposantLigne($accueil->debutDiv("MidAccueilTexte"));
        $accueil->ajouterComposantLigne($accueil->creerTitre("Visionnez les études que j'ai réalisées et les diplomes que j'ai acquis ainsi que mon pedigree", 2));
        $accueil->ajouterComposantLigne($accueil->creerLabelLink("", "", "index.php?veroz=parcours", "CONSULTER", ""));
    $accueil->ajouterComposantLigne($accueil->finDiv());
    $accueil->ajouterComposantLigne($accueil->debutDiv("MidAccueilImage"));
    $accueil->ajouterComposantLigne($accueil->creerImage("images/Parcours.svg"));
$accueil->ajouterComposantLigne($accueil->finDiv());
$accueil->ajouterComposantLigne($accueil->finDiv());

//Troisieme block de l'accueil//

$accueil->ajouterComposantLigne($accueil->debutDiv("MidAccueil2"));
    $accueil->ajouterComposantLigne($accueil->creerTitre("Mes projets "));
    $accueil->ajouterComposantLigne($accueil->debutDiv("MidAccueilTexte"));
        $accueil->ajouterComposantLigne($accueil->creerTitre("Aperçevez quelques images de site que j'ai produit et faite vous un avis!", 2));
        $accueil->ajouterComposantLigne($accueil->creerLabelLink("", "", "index.php?veroz=projet", "CONSULTER", ""));      
    $accueil->ajouterComposantLigne($accueil->finDiv());
    $accueil->ajouterComposantLigne($accueil->debutDiv("MidAccueilImage"));
    $accueil->ajouterComposantLigne($accueil->creerImage("images/Projets.svg"));
    $accueil->ajouterComposantLigne($accueil->finDiv());
$accueil->ajouterComposantLigne($accueil->finDiv());

$accueil->ajouterComposantLigne($accueil->finDiv());
$accueil->ajouterComposantTab();
$accueil->creerFormulaire();

require_once 'vue/vueAccueil.php' ;