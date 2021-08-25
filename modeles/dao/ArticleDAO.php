<?php

class ArticleDAO
{
    /////////////////////////////////////////Recupere toutes les Articles de la BDD et les hydrate//////////////////////////////////////////////

    public static function lesArticles($page)
    {
        $result = [];
        $sql = DBConnex::getInstance()->prepare("SELECT * FROM `Article` order by idArticle desc LIMIT :page, 12");
        $page = ($page - 1) * 5;
        $sql->bindParam(":page", $page, PDO::PARAM_INT);
        $sql->execute();
        $liste = $sql->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($liste)){
            foreach($liste as $Article){
                $unArticle =new Article();
                $unArticle->hydrate($Article);
                $result[] = $unArticle;
            }
        }
        return $result;
    }

    /////////////////////////////////////////////////Permet d'ajouter un article//////////////////////////////////////////////////////////////

    public static function ajouter($article) 
    {
        $titre=$article->getTitre();
        $lien= $article->getLien();
        $date=$article->getDate();

        $requetePrepa = DBConnex::getInstance()->prepare("INSERT INTO article(titre,lien,date_,idVeille) VALUES(:titre,:lien,:date_,'1')");
        $requetePrepa->bindParam( ":titre", $titre); 
        $requetePrepa->bindParam( ":lien",$lien); 
        $requetePrepa->bindParam( ":date_",$date ); 

        $requetePrepa->execute();
    }  

    ///////////////////////////////////////////////Permet de supprimer un article////////////////////////////////////////////////////////////
    
    public static function supprimer($id) 
    {
        $requetePrepa = DBConnex::getInstance()->prepare("Delete from article where idArticle=:idArticle");
        $requetePrepa->bindParam( ":idArticle", $id); 

        $requetePrepa->execute();
    }  
}