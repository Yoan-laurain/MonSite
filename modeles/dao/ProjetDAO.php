<?php

class ProjetDAO
{
   ///////////////////////////////Récupère les informations du projet en paramètre//////////////////////////////////////////////////////

   public static function lire($code) 
   { 
       $requetePrepa = DBConnex::getInstance()->prepare("select * from projets where idProjet = :idProjet");
       $requetePrepa->bindParam( ":idProjet", $code);       
       $requetePrepa->execute();  

       $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC); 
       
       if(!empty($liste))
       {
           foreach($liste as $projet){
           $unprojet = new projet();
           $unprojet->hydrate($projet);
           }
       }
       return $unprojet;
   }


    /////////////////////////////////////////Recupere toutes les Projets de la BDD et les hydrate//////////////////////////////////////////////

    public static function lesProjets()
    {
        $result = [];
        $sql = "SELECT * FROM `projets` ";
        $res = DBConnex::getInstance()->query($sql);
        $liste = $res->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($liste)){
            foreach($liste as $Projet){
                $unProjet =new Projet();
                $unProjet->hydrate($Projet);
                $result[] = $unProjet;
            }
        }
        return $result;
    }

    
    /////////////////////////////////////////////////Permet d'ajouter un projet//////////////////////////////////////////////////////////////

    public static function ajouter($projet) 
    {

        $nom=$projet->getNom();
        $description= $projet->getDescription();

        $requetePrepa = DBConnex::getInstance()->prepare("INSERT INTO projets(nom,Description_,idUtilisateur) VALUES(:nom,:description_,'2')");
        $requetePrepa->bindParam( ":nom", $nom); 
        $requetePrepa->bindParam( ":description_",$description); 

        $requetePrepa->execute();
    }  

    public static function supprimer($id) 
    {
        $requetePrepa = DBConnex::getInstance()->prepare("Delete from projets where idProjet=:idProjet");
        $requetePrepa->bindParam( ":idProjet", $id); 
        $requetePrepa->execute();
    }  
}