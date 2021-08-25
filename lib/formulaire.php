<?php
class Formulaire{

	// ##################################################################################################################
	private $method;
	private $action;
	private $nom;
	private $style;
	private $enctype;
	private $formulaireToPrint;
	
	private $ligneComposants = array();
	private $tabComposants = array();
	
	public function __construct($uneMethode, $uneAction , $unNom,$unStyle, $unEnctype = ""){
		$this->method = $uneMethode;
		$this->action =$uneAction;
		$this->nom = $unNom;
		$this->style = $unStyle;
		$this->enctype = $unEnctype;
	}
	
	public function concactComposants($unComposant , $autreComposant ){
		return $unComposant .= $autreComposant;
	}
	public function ajouterComposantLigne($unComposant){
		$this->ligneComposants[] = $unComposant;
	}
	public function ajouterComposantTab(){
		$this->tabComposants[] = $this->ligneComposants;
		$this->ligneComposants = array();
	}
	
	public function creerFormulaire(){
		$this->formulaireToPrint = "<form method = '" .  $this->method . "' ";
		$this->formulaireToPrint .= "action = '" .  $this->action . "' ";
		$this->formulaireToPrint .= "id = '" .  $this->nom . "' ";
		$this->formulaireToPrint .= "name = '" .  $this->nom . "' ";
		$this->formulaireToPrint .= "class = '" .  $this->style . "' ";
		$this->formulaireToPrint .= "enctype = '" .  $this->enctype . "' >";
		
	
		foreach ($this->tabComposants as $uneLigneComposants){
			//$this->formulaireToPrint .= "<div class = 'ligne'>";
			foreach ($uneLigneComposants as $unComposant){
				$this->formulaireToPrint .= $unComposant ;
			}
			//$this->formulaireToPrint .= "</div>";
		}
		$this->formulaireToPrint .= "</form>";
		return $this->formulaireToPrint ;
	}
	
	public function afficherFormulaire(){
		echo $this->formulaireToPrint ;
	}
	
	/* On ne peut pas imbriqué des balise form sinon le css et les post/get bug
	mais comme on a besoin d'un objet form pour créer le container qui va contenir les autres "sous" form
	on doit en créer un puis le fermer juste après
	*/
	public function useInCont(){
		$composant = "</form>";
		return $composant;
	}
	// ##################################################################################################################



	// ##################################################################################################################
	public function creerLabel($unNom, $unId, $unLabel){
		$composant = "<label name ='" . $unNom . "' id ='" . $unId . "'>" . $unLabel . "</label>";
		return $composant;
	}

	public function creerMessage($unMessage){
		$composant = "<label class='message'>" . $unMessage . "</label>";
		return $composant;
	}
	
	public function creerTitre($unTexte, $unNiveau = 1, $unId = ""){
		$composant = "<h" . $unNiveau;
		if ($unId != "") {
			$composant .= " id =" . $unId;
		}
		$composant .= ">" . $unTexte . "</h" . $unNiveau . ">";
		return $composant;
	}

	public function creerParagh($unTexte){		
		$composant = "<p>" . $unTexte . "</p>";
		return $composant;
	}

	public function creerLabelFor($unFor,  $unLabel){
		$composant = "<label for='" . $unFor . "'>" . $unLabel . "</label>";
		return $composant;
	}
	
	public function creerLabelLink($uneClass, $unId, $uneDestination,  $unLabel, $unTaget = "", $onClick = ""){
		$composant = "<a class = '" . $uneClass . "' id ='" . $unId . "' href='" . $uneDestination . "' target='" . $unTaget . "' onclick = '" . $onClick . "'>" . $unLabel . "</a>";
		return $composant;
	}

	public function creerLabelLink2($uneClass, $unId, $uneDestination,  $unLabel, $unTaget = "", $onClick = "",$img=""){
		$composant = "<a class = '" . $uneClass . "' id ='" . $unId . "' href='" . $uneDestination . "' target='" . $unTaget . "' onclick = '" . $onClick . "'>" . $unLabel ;
		$composant .= "<img src=".$img." alt=''></a>";
		return $composant;
	}

	public function creerFLechePrev($unId, $uneDestination){
		$composant = "<a class = carousel-control-prev id ='" . $unId . "' href='" . $uneDestination."' role=button data-slide=prev>";
		$composant .= "<span class=carousel-control-prev-icon aria-hidden=true></span><span class=sr-only>Previous</span></a>";
		return $composant;
	}


	public function creerFLecheNext($unId, $uneDestination){
		$composant = "<a class = carousel-control-next id ='" . $unId . "' href='" . $uneDestination."' role=button data-slide=next>";
		$composant .= "<span class=carousel-control-next-icon aria-hidden=true></span><span class=sr-only>Next</span></a>";
		return $composant;
	}
	// ##################################################################################################################
	


	// ##################################################################################################################

	public function debutDivCarou($uneClass,$dataInterval,$id,$Aos){
		$composant = "<div data-aos=".$Aos. " data-interval=".$dataInterval. " data-ride=carousel class='" . $uneClass . "' id='" . $id . "'>";
		return $composant;
	}
		
	public function debutDivAos($uneClass,$Aos){
		$composant = "<div data-aos=".$Aos. " class='" . $uneClass . "' id='" . $uneClass . "'>";
		return $composant;
	}
	
	
	
	public function debutDiv($uneClass){
		$composant = "<div class='" . $uneClass . "' id='" . $uneClass . "'>";
		return $composant;
	}

	

	public function finDiv(){
		$composant = "</div>";
		return $composant;
	}

	public function debutDivCaptcha($uneClass,$data){
		$composant = "<div class='" . $uneClass . "' id='" . $uneClass . "' data-sitekey='". $data."'>";
		return $composant;
	}

	public function debutA($hRef){
		$composant = "<a href='" . $hRef . "'>";
		return $composant;
	}

	public function finA(){
		$composant = "</a>";
		return $composant;
	}

	public function debutUl(){
		$composant = "<ul>";
		return $composant;
	}

	public function debutUl2($test){
		$composant = "<ul class=".$test.">";
		return $composant;
	}

	public function finUl(){
		$composant = "</ul>";
		return $composant;
	}

	public function debutLi(){
		$composant = "<li>";
		return $composant;
	}

	public function finLi(){
		$composant = "</li>";
		return $composant;
	}

	public function autoDiv($uneClass){
		$composant = "<div class='" . $uneClass . "' id='" . $uneClass . "'></div>";
		return $composant;
	}

	public function br(){
		$composant = "</br>";
		return $composant;
	}

	public function creerImage($uneSource, $unDefautText = ""){
		$composant = "<img src='" . $uneSource . "' alt='" . $unDefautText . "'/>";
		return $composant;
	}

	public function creeCarrousel($uneSource, $unDefautText = "",$i)
	{
	   $html ="<li class=carousel-item>";
       $html .= '<div id="slide'.$i.'" class="slide">';
                    
       $html .= '<div class="visu">';
       $html .= "<img src='" . $uneSource . "' alt='" . $unDefautText . "'/>";
       $html .= '</div>';
                
	   $html .= '</div>';
	   $html.="</li>";
          
       return $html;
	}
	// ##################################################################################################################

	
	
	// ##################################################################################################################
	public function creerInputTexte($unNom, $unId, $uneValue , $required , $placeholder , $pattern){
		$composant = "<input type = 'text' name = '" . $unNom . "' id = '" . $unId . "' ";
		if (!empty($uneValue)){
			$composant .= "value = '" . $uneValue . "' ";
		}
		if (!empty($placeholder)){
			$composant .= "placeholder = '" . $placeholder . "' ";
		}
		if ($required == 1){
			$composant .= "required ";
		}
		if (!empty($pattern)){
			$composant .= "pattern = '" . $pattern . "' ";
		}
		$composant .= "/>";
		return $composant;
	}

	public function creerInputGrandTexte($unNom, $unId, $uneValue , $required , $placeholder , $pattern){
		$composant = "<TEXTAREA rows=10 name = '" . $unNom . "' id = '" . $unId . "' ";
		if (!empty($uneValue)){
			$composant .= "value = '" . $uneValue . "' ";
		}
		if (!empty($placeholder)){
			$composant .= "placeholder = '" . $placeholder . "' ";
		}
		if ($required == 1){
			$composant .= "required ";
		}
		if (!empty($pattern)){
			$composant .= "pattern = '" . $pattern . "' ";
		}
		$composant .= "/>";
		$composant .= "</TextArea>";
		return $composant;
	}



	public function creerInputNumber($unNom, $unId, $uneValue , $required , $placeholder , $pattern){
		$composant = "<input type = 'number' name = '" . $unNom . "' id = '" . $unId . "' ";
		if (!empty($uneValue)){
			$composant .= "value = '" . $uneValue . "' ";
		}
		if (!empty($placeholder)){
			$composant .= "placeholder = '" . $placeholder . "' ";
		}
		if ($required == 1){
			$composant .= "required ";
		}
		if (!empty($pattern)){
			$composant .= "pattern = '" . $pattern . "' ";
		}
		$composant .= "/>";
		return $composant;
	}

	public function creerInputCheck($unNom, $unId, $uneValue, $estCheck){
		$composant = "<input type = 'checkbox' name = '" . $unNom . "' id = '" . $unId . "'";

		if ($estCheck){
			$composant .= " checked";
		}

		$composant .= "><label for='" . $unId . "'>" . $uneValue . "</label>";
		return $composant;
	}

	public function creerInputRadio($unNom, $unId, $uneValue, $estCheck){
		$composant = "<input type = 'radio' name = '" . $unNom . "' id = '" . $unId . "' value = '" . $uneValue . "'";

		if ($estCheck){
			$composant .= " checked";
		}

		$composant .= "><label for='" . $unId . "'>" . $uneValue . "</label>";
		return $composant;
	}
	
	public function creerInputMdp($unNom, $unId,  $required , $placeholder , $pattern){
		$composant = "<input type = 'password' name = '" . $unNom . "' id = '" . $unId . "' ";
		if (!empty($placeholder)){
			$composant .= "placeholder = '" . $placeholder . "' ";
		}
		if ($required == 1){
			$composant .= "required ";
		}
		if (!empty($pattern)){
			$composant .= "pattern = '" . $pattern . "' ";
		}
		$composant .= "/>";
		return $composant;
	}
	
	public function creerInputFile($unNom, $unId){
		$composant = "<input type = 'file' name = '" . $unNom . "' id = '" . $unId . "'/>";
		return $composant;
	}
	
	public function creerInputDate($unNom, $unId, $uneValue = null){
		$composant = "<input type = 'datetime-local' name = '" . $unNom . "' id = '" . $unId . "'";
		if ($uneValue != null) {
			$composant .= " value='" . $uneValue . "T00:00'";
		}
		$composant .= "/>";
		return $composant;
	}
	
	public function creerInputSubmit($unNom, $unId, $uneValue, $onClick = ""){
		$composant = "<input type = 'submit' name = '" . $unNom . "' id = '" . $unId . "' ";
		$composant .= "value = \"" . $uneValue . "\"";
		if ($onClick != "") {
			$composant .= " onclick='" . $onClick . "'";
		}
		
		$composant .= "/> ";
		return $composant;
	}
	public function creerInputSubmit2($Class,$unNom, $unId, $uneValue, $onClick = ""){
		$composant = "<input class =".$Class." type = 'submit' name = '" . $unNom . "' id = '" . $unId . "' ";
		$composant .= "value = \"" . $uneValue . "\"";
		if ($onClick != "") {
			$composant .= " onclick='" . $onClick . "'";
		}
		
		$composant .= "/> ";
		return $composant;
	}

	public function creerInputImage($unNom, $unId, $uneSource){
		$composant = "<input type = 'image' name = '" . $unNom . "' id = '" . $unId . "' ";
		$composant .= "src = '" . $uneSource . "'/> ";
		return $composant;
	}

	// ##################################################################################################################


	
	// ##################################################################################################################
	public function creerSelect($unNom, $unId, $options, $selected){
		$composant = "<select  name = '" . $unNom . "' id = '" . $unId . "' >";
		foreach ($options as $option){
			$composant .= "<option value = '" . $option . "'";
			if ($option == $selected) {
				$composant .= " selected disabled";
			}
			$composant .= ">" . $option . "</option>";
		}
		$composant .= "</select></td></tr>";
		return $composant;
	}	
	
	public function creerTable($uneListe){
		$composant = "<table class='tab'><thead><tr>";

		// Creer le head avec la premier ligne de la liste
		foreach ($uneListe[0] as $laTete) {
			$composant .= "<td>" . $laTete . "</td>";
		}

		$composant .= "</tr></thead><tbody>";

		// Creer le corps avec le reste de la liste
		for ($i = 1; $i < count($uneListe); $i++) {
			
			// Determine les couleurs par pair
			if ($i%2==0) {
				$composant .= "<tr class='pair'>";
			} else {
				$composant .= "<tr class='impair'>";
			}
			
			foreach ($uneListe[$i] as $leCorps) {
				$composant .= "<td>" . $leCorps . "</td>";
			}
			
			$composant .= "</tr>";

		}
		$composant .= "</tbody></table>";
		

		return $composant;
	}
	// ##################################################################################################################	
}