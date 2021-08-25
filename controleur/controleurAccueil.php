<?php

$accueil = new Formulaire('post', 'index.php', 'fAccueil', 'fAccueil');

$accueil->ajouterComposantTab();
$accueil->creerFormulaire();

require_once 'vue/vueAccueil.php' ;