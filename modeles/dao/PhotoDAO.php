<?php

class PhotoDAO
{
   ///////////////////////////////Récupère les photo du projet en paramètre//////////////////////////////////////////////////////

   public static function lire($idProjet) 
   { 
       $result = [];
       $requetePrepa = DBConnex::getInstance()->prepare("select * from photo where idProjet = :idProjet");
       $requetePrepa->bindParam( ":idProjet", $idProjet);       
       $requetePrepa->execute();  

       $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC); 
       
       if(!empty($liste))
       {
           foreach($liste as $photo){
           $unephoto = new photo();
           $unephoto->hydrate($photo);
           $result[] = $unephoto;
           }
       }

       return $result;
   }
}