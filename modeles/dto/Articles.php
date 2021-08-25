<?php
class Articles
{
	private $Articles= array();

	public function __construct($array)
	{
		if (is_array($array)) 
		{
			$this->Articles = $array;
		}
	}

	public function getArticles()
	{
		return $this->Articles;
	}

	public static function chercheArticle($unIdArticle)
	{
		$i = 0;
		while ($unIdArticle != $this->Articles[$i]-getIdArticle() && $i < count($this->Articles)-1)
		{
			$i++;
		}
		if ($unIdArticle == $this->Articles[$i]->getIdArticle())
		{
			return $this->Articles[$i];
		}
	}
}