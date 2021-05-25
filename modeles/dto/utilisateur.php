<?php
class Utilisateur{
    use Hydrate;
    private  $idUser;
    private  $nom;
    private  $prenom;
    private  $login;
    private  $mdp;
    private  $statut;
    private  $veille;

    
    public function __construct( $login,  $mdp)
    {
        $this->login=$login;
        $this->mdp=$mdp;
    }   

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function getVeille()
    {
        return $this->veille;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    public function setVeille($veille)
    {
        $this->veille = $veille;
    }    
}