<?php
class Article 
{
    use Hydrate;
    private $idArticle;
    private $titre;
    private $lien;
    private $date_;
    private $idVeille;

    public function __construct( $titre="",  $lien="",$date_="")
    {
        $this->titre=$titre;
        $this->lien=$lien;
        $this->date_=$date_;
    }   
   
       public function getIdArticle()
       {
           return $this->idArticle;
       }
   
       public function getTitre()
       {
           return $this->titre;
       }
   
       public function getlien()
       {
           return $this->lien;
       }
   
       public function getdate()
       {
           return $this->date_;
       }
   
       public function getIdVeille()
       {
           return $this->idVeille;
       }
   
       public function setIdArticle($idArticle)
       {
           $this->idArticle = $idArticle;
       }
   
       public function setTitre($titre)
       {
           $this->titre = $titre;
       }
   
       public function setlien($lien)
       {
           $this->lien = $lien;
       }
   
       public function setdate_($date_)
       {
           $this->date_ = $date_;
       }
   
       public function setIdVeille($idVeille)
       {
           $this->idVeille = $idVeille;
       }
}