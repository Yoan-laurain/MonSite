<?php
/**
 * Classe Menu
 * Permet de crréer des menus
 * $style style css
 * $composants liste des items coposant le menu
 */
class Menu{
	private $style;
	private $composants = [];
	private $menu;

	/**
	 * Constructeur de la classe Menu
	 * @param $unStyle (style pour css)
	 */
	public function __construct($unStyle ){
		$this->style = $unStyle;
	}

	/**
	 * Ajoute un item à la liste des items du menu
	 * @param $unComposant (un item du menu)
	 */
	public function ajouterComposant($unComposant){
		$this->composants[] = $unComposant;
	}


	/**
	 * Crée un nouvelle item pour le menu
	 * @param $unLien  (valeur transmise)
	 * @param $uneValeur (valeur affichée)
	 * @return un item pour le menu
	 */
	public function creerItemLien($unLien,$uneValeur){
		$composant = array();
		$composant[0] = $unLien ;
		$composant[1] = $uneValeur ;
		return $composant;
	}

	/**
	 * crée le menu à afficher
	 * @param $composantActif (item s�lectionné)
	 * @param $nomMenu (nom variable transmise)
	 */
	public function creerMenu($composantActif,$nomMenu){
		$this->menu = "<ul class = '" .  $this->style . "' id = '" .  $this->style . "'>";
		foreach($this->composants as $composant){
			if($composant[0] == $composantActif){
				$this->menu .= "<li class='actif' id = '" . $composant[0] ."'>";
				$this->menu .=  "<span>" . $composant[1] ."</span>";
			}
			else{
				$this->menu .= "<li id = '" . $composant[0] ."'>";
				$this->menu .= "<a href='index.php?" . $nomMenu ;
				$this->menu .= "=" . $composant[0] . "' >";
				$this->menu .= "<span>" . $composant[1] ."</span>";
				$this->menu .= "</a>";
			}
			$this->menu .= "</li>";
		}
		$this->menu .= "</ul>";
	}


	public function afficherMenu() {
		echo $this->menu;
	}
	

}