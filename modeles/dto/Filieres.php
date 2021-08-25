<?php
class Filieres
{
	private $Filieres= array();

	public function __construct($array)
	{
		if (is_array($array)) 
		{
			$this->Filieres = $array;
		}
	}

	public function getFilieres()
	{
		return $this->Filieres;
	}

	public static function chercheCursus($unIdFiliere)
	{
		$i = 0;
		while ($unIdCursus != $this->Filieres[$i]->getIdFiliere() && $i < count($this->Filieres)-1)
		{
			$i++;
		}
		if ($unIdCursus == $this->Filieres[$i]->getIdFiliere())
		{
			return $this->Filieres[$i];
		}
	}
}