<?php
class Photos
{
	private $Photos= array();

	public function __construct($array)
	{
		if (is_array($array)) 
		{
			$this->Photos = $array;
		}
	}

	public function getPhotos()
	{
		return $this->Photos;
	}

	public static function cherchePhoto($unIdPhoto)
	{
		$i = 0;
		while ($unIdPhoto != $this->Photos[$i]-getIdPhoto() && $i < count($this->Photos)-1)
		{
			$i++;
		}
		if ($unIdPhoto == $this->Photos[$i]->getIdPhoto())
		{
			return $this->Photos[$i];
		}
	}
}