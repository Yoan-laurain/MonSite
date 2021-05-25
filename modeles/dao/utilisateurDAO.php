<?php
class UtilisateurDAO extends PDO
{          
        //Vérifie le statut de l'utilisateur //

        public static function verification(Utilisateur $utilisateur )
        {
            
            $requetePrepa = DBConnex::getInstance()->prepare("select * from utilisateur where login = :login and  mdp = md5(:mdp)");

            $login= $utilisateur->getLogin();
            $mdp=$utilisateur->getMdp();
            
            $requetePrepa->bindParam( ":login",$login);
            $requetePrepa->bindParam( ":mdp" , $mdp);
            
            $requetePrepa->execute();
            $login = $requetePrepa->fetch();
           
           $utilisateur->setIdUser($login[0]);
           $utilisateur->setNom($login[1]);
           $utilisateur->setPrenom($login[2]);
           $utilisateur->setStatut($login[5]);
           $utilisateur->setVeille($login[6]);
          
           return $login;
        }
}