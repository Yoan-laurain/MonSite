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
	private $AunSousMenu;
	private $EstUnSousMenu;

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
	public function creerItemLien($unLien,$uneValeur,$AunSousMenu,$EstUnSousMenu){
		$composant = array();
		$composant[0] = $unLien ;
		$composant[1] = $uneValeur ;
		$composant[2]= $AunSousMenu;
		$composant[3]= $EstUnSousMenu;
		return $composant;
	}

	/**
	 * crée le menu à afficher
	 * @param $composantActif (item s�lectionné)
	 * @param $nomMenu (nom variable transmise)
	 */
	public function creerMenu($composantActif,$nomMenu)
	{
		$i=0;
		$temp=false;
		$temp2=false;
		$this->menu = "<ul class = '" .  $this->style . "' id = '" .  $this->style . "'>";
		foreach($this->composants as $composant)
		{
			//Menu actif//

			if($composant[0] == $composantActif)
			{
				//Si l'item actif n'est pas un sous menu//
				if(!$composant[3])
				{
					$this->menu .= "<li class='actif' id = '" . $composant[0] ."'>";
					$this->menu .=  "<span>" . $composant[1] ."</span>";
				}

				if($composant[2] && $temp2==false && $temp==false) //Menu avec sous menu
				{	
					$this->menu .= "<ul>";
					
					$t=$i;
					while($this->composants[$t+1][3])
					{

						$this->menu .= "<li id = '" . $this->composants[$t+1][0] ."'>";
						$this->menu .= "<a href='index.php?" . $nomMenu ;
						$this->menu .= "=" . $this->composants[$t+1][0] . "' >";
						$this->menu .= "<span>" . $this->composants[$t+1][1] ."</span>";
						$this->menu .= "</a>";

						//Si le sous menu à également un sous menu//

						if($this->composants[$t+1][2])
						{	
							$this->menu .= "<ul>";
							$temp2=true;
						}
						$t++;
						if(!isset($this->composants[$t+1])){
                            break;
                        }
					}

					if($temp2)
					{
						$this->menu .= "</ul>";
						$this->menu .= "</li>";
					}

					$this->menu .= "</ul>";
					$this->menu .= "</li>";
					$this->menu .='<div class="arrow-down"></div>';
				}
				else
				{
					$this->menu .= "</li>";
				}	
			}
			else
			{

				if(!$composant[3] && !$composant[2] ) //Menu Normal
				{
					$this->menu .= "<li id = '" . $composant[0] ."'>";
					$this->menu .= "<a href='index.php?" . $nomMenu ;
					$this->menu .= "=" . $composant[0] . "' >";
					$this->menu .= "<span>" . $composant[1] ."</span>";
					$this->menu .= "</a>";
				}

				if($composant[2] && $temp==false) //Menu avec sous menu
				{
					//Menu parent//

					//Menu sans direction//

					if($composant[0]=='')					
					{
						$this->menu .= "<li id = '" . $composant[0] ."'>";					
						$this->menu .= "<span>" . $composant[1] ."</span>";			
						$this->menu .= "<ul>";
					}
					else
					{
						$this->menu .= "<li id = '" . $composant[0] ."'>";				
						$this->menu .= "<a href='index.php?" . $nomMenu ;
						$this->menu .= "=" . $composant[0] . "' >";		
						$this->menu .= "<span>" . $composant[1] ."</span>";			
						$this->menu .= "</a>";
						$this->menu .= "<ul>";
					}


					$t=$i;

					while($this->composants[$t+1][3])
					{

						$this->menu .= "<li id = '" . $this->composants[$t+1][0] ."'>";
						$this->menu .= "<a href='index.php?" . $nomMenu ;
						$this->menu .= "=" . $this->composants[$t+1][0] . "' >";
						$this->menu .= "<span>" . $this->composants[$t+1][1] ."</span>";
						$this->menu .= "</a>";

						//Si le sous menu à également un sous menu//

						if($this->composants[$t+1][2]){	
		
							$this->menu .= "<ul>";
							$temp=true;
						}
					
						$t++;
						if(!isset($this->composants[$t+1])){
                            break;
                        }
					}
					if($temp)
					{
						$this->menu .= "</ul>";
						$this->menu .= "</li>";
					}
					
					$this->menu .= "</ul>";
					$this->menu .= "</li>";
					$this->menu .='<div class="arrow-down"></div>';
				}
				else
				{
					$this->menu .= "</li>";
				}		
			}	
			$i++;
		}
		$this->menu .= "</ul>";
	}


	public function afficherMenu() {
		echo $this->menu;
	}
	

}