<?php
class CursusS
{
	private $CursusS= array();

	public function __construct($array)
	{
		if (is_array($array)) 
		{
			$this->CursusS = $array;
		}
	}

	public function getCursusS()
	{
		return $this->CursusS;
	}

	public static function chercheCursus($unIdUtilisateur)
	{
		$i = 0;
		while ($unIdCursus != $this->CursusS[$i]->getIdUtilisateur() && $i < count($this->CursusS)-1)
		{
			$i++;
		}
		if ($unIdCursus == $this->CursusS[$i]->getIdUtilisateur())
		{
			return $this->CursusS[$i];
		}
	}
}