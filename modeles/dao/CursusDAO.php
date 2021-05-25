<?php

class CursusDAO
{
    /////////////////////////////////////////Recupere toutes les Cursuss de la BDD et les hydrate//////////////////////////////////////////////

    public static function lesCursuss()
    {
        $result = [];
        $sql = "SELECT * FROM `Cursus` order by annee desc";
        $res = DBConnex::getInstance()->query($sql);
        $liste = $res->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($liste)){
            foreach($liste as $Cursus){
                $unCursus =new Cursus();
                $unCursus->hydrate($Cursus);
                $result[] = $unCursus;
            }
        }
        return $result;
    }

    //////////////////////////////////////Permet de récupérer les informations d'une filière/////////////////////////////////////////////////

    public static function lire($idFiliere) 
    { 
        $requetePrepa = DBConnex::getInstance()->prepare("select nom from filiere where idFiliere = :idFiliere");
        $requetePrepa->bindParam( ":idFiliere", $idFiliere);       
        $requetePrepa->execute();  
 
        $liste = $requetePrepa->fetch()[0]; 
        
        return $liste;
    }  

    public static function ajouter($Cursus) 
    {
        $Annee=$Cursus->getAnnee();
        $Filiere= $Cursus->getIdFiliere();
        
        $requetePrepa = DBConnex::getInstance()->prepare("INSERT INTO Cursus(idUtilisateur,Annee,idFiliere) VALUES('2',:Annee,:Filiere)");
        $requetePrepa->bindParam( ":Annee", $Annee); 
        $requetePrepa->bindParam( ":Filiere",$Filiere); 


        $requetePrepa->execute();
    }  

    ///////////////////////////////////////////////Permet de supprimer un Cursus////////////////////////////////////////////////////////////
    
    public static function supprimer($id) 
    {
        $requetePrepa = DBConnex::getInstance()->prepare("Delete from Cursus where Annee= :Annee");
        $requetePrepa->bindParam( ":Annee", $id);     
        $requetePrepa->execute();
    }  
}