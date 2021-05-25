<?php

class FiliereDAO
{
   ///////////////////////////////Récupère les Filiere du Filiere en paramètre//////////////////////////////////////////////////////

   public static function lesFilieres()
   {
       $result = [];
       $sql = "SELECT nom FROM `Filiere` ";
       $res = DBConnex::getInstance()->query($sql);
       $liste = $res->fetchAll(PDO::FETCH_ASSOC);

       if(!empty($liste))
       {
        foreach($liste as $Filiere)
        {
            $unFiliere =new Filiere();
            $unFiliere->hydrate($Filiere);
            $result[] = $unFiliere->getNom();
        }
       }
        return $result;
   }

   public static function lire($Nom) 
   { 
       $requetePrepa = DBConnex::getInstance()->prepare("select idFiliere from filiere where nom = :nom");
       $requetePrepa->bindParam( ":nom", $Nom);       
       $requetePrepa->execute();  

       $liste = $requetePrepa->fetch(); 

       return $liste[0];
   }

   public static function ajouter($Filiere) 
   {
       $requetePrepa = DBConnex::getInstance()->prepare("INSERT INTO Filiere(nom) VALUES(:NomFiliere)");

       $requetePrepa->bindParam( ":NomFiliere",$NomFiliere); 

       $NomFiliere= $Filiere->getNom();

       $requetePrepa->execute();
   }  
}