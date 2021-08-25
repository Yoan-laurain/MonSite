<?php

class Photo
{
    use Hydrate;
    private $idPhoto;
    private $url;
    private $idProjet;

    public function getIdPhoto()
    {
        return $this->idPhoto;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getIdProjet()
    {
        return $this->idProjet;
    }

    public function setIdPhoto($idPhoto)
    {
        $this->idPhoto = $idPhoto;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function setIdProjet($idProjet)
    {
        $this->idProjet = $idProjet;
    }
}