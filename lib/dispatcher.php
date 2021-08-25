<?php
class dispatcher{

	public static function dispatch($unMenuP){
		/*
		if (isset($_SESSION['utilisateur']) &&
			is_file("controleur/" . daoStatus::statusByCode($_SESSION['utilisateur']->codeStatus)->libelle . "/controleur" . ucfirst($unMenuP) . ".php")) {
			return "controleur/" . daoStatus::statusByCode($_SESSION['utilisateur']->codeStatus)->libelle . "/controleur" . ucfirst($unMenuP) . ".php";

		} else*/
		if (is_file("controleur/controleur" . ucfirst($unMenuP) . ".php")) {
			return "controleur/controleur" . ucfirst($unMenuP) . ".php";
		} else {
			header('location: index.php?IPSAD=accueil');
		}
	}
}
