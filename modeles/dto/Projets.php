<?php
class Projets
{
	private $Projets= array();

	public function __construct($array)
	{
		if (is_array($array)) 
		{
			$this->Projets = $array;
		}
	}

	public function getProjets()
	{
		return $this->Projets;
	}

	public static function chercheProjet($unIdProjet)
	{
		$i = 0;
		while ($unIdProjet != $this->Projets[$i]-getIdProjet() && $i < count($this->Projets)-1)
		{
			$i++;
		}
		if ($unIdProjet == $this->Projets[$i]->getIdProjet())
		{
			return $this->Projets[$i];
		}
	}
}