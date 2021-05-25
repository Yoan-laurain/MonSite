-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 21 mars 2021 à 13:12
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `monsite`
--

-- --------------------------------------------------------

--
-- Structure de la table `anneescolaire`
--

DROP TABLE IF EXISTS `anneescolaire`;
CREATE TABLE IF NOT EXISTS `anneescolaire` (
  `Annee` varchar(50) NOT NULL,
  PRIMARY KEY (`Annee`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `anneescolaire`
--

INSERT INTO `anneescolaire` (`Annee`) VALUES
('2016-2017'),
('2017-2018'),
('2018-2019'),
('2019-2020'),
('2020-2021'),
('2021-2022'),
('2022-2023');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `idArticle` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `lien` varchar(200) NOT NULL,
  `date_` varchar(50) NOT NULL,
  `idVeille` int(11) NOT NULL,
  PRIMARY KEY (`idArticle`),
  KEY `ARTICLE_VEILLE_FK` (`idVeille`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idArticle`, `titre`, `lien`, `date_`, `idVeille`) VALUES
(5, 'Test rémunéré', 'https://www.vrplayer.fr/dreams-vr-playstation-vr-beta/\r\n', '25/05/2020', 1),
(6, '7 piliers de l’assurance qualité logiciel', 'https://www.cigniti.com/blog/software-quality-assurance-reliable-application/?utm_source=ReviveOldPost&utm_medium=social&utm=campaign=ReviveOldPost\r\n', '31/05/2020', 1),
(7, 'Analyse automatisée', 'https://www.linkedin.com/pulse/automated-code-analysis-next-big-thing-2020-software-quality-boris', '04/06/2020', 1),
(8, 'La qualité logicielle bat la vitesse de livraison ', 'https://betanews.com/2020/06/02/quality-over-speed-for-developers/\r\n', '05/06/2020', 1),
(9, 'évaluez la qualité du logiciel avant le déploiement', 'https://blogs.cisco.com/networking/how-do-you-gauge-software-quality-before-deployment\r\n', '09/06/2020', 1),
(10, '4e édition de la Soirée du Test Logiciel', 'https://tribuca.net/numerique_66668679-soiree-du-test-logiciel-appel-a-orateurs-et-sponsors', '11/06/2020', 1),
(11, 'Équilibrer le coût, la vitesse et la qualité du logiciel\r\n', 'https://www.diffblue.com/blog/software%20development/testing/balancing-software-cost-speed-and-quality/', '17/06/2020', 1),
(12, 'Pourquoi devriez-vous utiliser le crowdsource logiciel d’assurance de la qualité?', 'https://www.cigniti.com/blog/why-crowdsourcing-testing-services/amp/?utm_source=ReviveOldPost&utm_medium=social&utm_campaign=ReviveOldPost&_twitter_impression=true', '24/06/2020', 1),
(13, 'Ponicode extension de VS qui analyse le code sélectionné et propose des test unitaires ', 'https://www.informatiquenews.fr/ponicode-lia-qui-simplifie-la-vie-des-developpeurs-entre-en-beta-publique-71602\r\n', '30/06/2020', 1),
(14, 'Tests fonctionnels et non fonctionnels pour améliorer la qualité du logiciel\r\n', 'https://www.kiwiqa.com/functional-non-functional-testing-to-improve-software-quality/\r\n', '04/07/2020', 1),
(15, '7 conseils pour améliorer la qualité du logiciel grâce au processus de test\r\n', 'https://icts.io/2020/04/29/7-tips-to-improve-software-quality-through-testing-process/\r\n', '10/07/2020', 1),
(16, 'Architecture logicielle', 'https://www.techno-science.net/glossaire-definition/Architecture-logicielle.html\r\n', '16/07/2020', 1),
(17, 'La façon SAFe de construire la qualité des logiciels\r\n', 'https://www.cigniti.com/blog/software-quality-engineering-safe-agile/amp/?utm_source=ReviveOldPost&utm_medium=social&utm_campaign=ReviveOldPost&__twitter_impression=true', '18/07/2020', 1),
(18, 'Guide des tests agiles', 'https://dzone.com/articles/a-guide-to-agile-testing-for-better-software-quali', '22/07/2020', 1),
(19, 'Conseils pour une séance d’essais exploratoires efficaces', 'https://medium.com/software-qe/effective-exploratory-software-testing-1e2828c8e94e', '26/07/2020', 1),
(20, '10 façons d’accélérer devOps', 'https://www.forbes.com/sites/louiscolumbus/2020/07/31/10-ways-ai-is-accelerating-devops/#3ecc4f676a50', '30/07/2020', 1),
(21, 'test-tools', 'https://www.cigniti.com/blog/category/test-tools/', '12/08/2020', 1),
(22, 'Applications de test', 'https://www.appdynamics.com/blog/news/software-quality-incident-management-partners/?ref=upflow.co', '15/08/2020', 1),
(23, 'Connaissance du test en entreprise ', 'https://latavernedutesteur.fr/2020/08/20/tests-logiciels-et-agilite-a-lechelle/', '20/08/2020', 1),
(24, 'Normes d\'assurance qualité', 'https://www.bacancytechnology.com/blog/quality-assurance-standards-to-improve-software-quality', '24/08/2020', 1),
(25, '6 Meilleures pratiques pour l’essai de sélénium', 'https://www.testingxperts.com/blog/selenium-testing-best-practices', '01/09/2020', 1),
(26, 'La façon SAFe de construire la qualité des logiciels', 'La façon SAFe de construire la qualité des logiciels', '10/09/2020', 1),
(29, ' création de piles de filtration de qualité', 'https://www.capitalone.com/tech/software-engineering/software-quality-testing/\r\n', '17/09/2020', 1),
(30, 'Sortie de Tuleap 12', 'https://www.toolinux.com/?ce-qui-change-avec-la-sortie-de-tuleap-12', '27/09/2020', 1),
(31, 'SonarQube allié des test unitaire et clean code', 'https://www.sonarqube.org/sonarqube-8-5/', '05/10/2020', 1),
(32, 'Redéfinir la qualité des logiciels', 'https://gojko.net/2012/05/08/redefining-software-quality/', '12/10/2020', 1),
(33, 'Les meilleures conférences d\'AQ logiciel et de test de 2021', 'https://techbeacon.com/app-dev-testing/best-software-qa-testing-conferences-2021?utm_source=richisoc', '01/11/2020', 1),
(34, 'Parcours d\'un analyste qualité', 'https://medium.com/technogise/journey-of-a-quality-analyst-2d78ddc44798', '13/11/2020', 1),
(35, 'Questions-réponses avec un spécialiste', 'https://www.infoq.com/articles/book-review-accelerating-software-quality/?utm_campaign=infoq_content&utm_source=infoq&utm_medium=feed&utm_term=global', '22/11/2020', 1),
(36, 'Ponicode Unit Test release', 'https://www.docaufutur.fr/2020/11/30/ponicode-devoile-une-nouvelle-fonctionnalite-github-action-ponicode-unit-test/', '05/12/2020', 1),
(41, 'Qu\'est-ce que la résolution de concept dans les tests logiciels?', 'https://niittyviita.medium.com/what-is-the-concept-resolution-in-software-testing-3c20a7c2d5c0', '17/12/2020', 1),
(42, 'Coûts de mauvaise qualité des logiciels US $ 2,08 tn', 'https://www.infosecurity-magazine.com/news/poor-software-quality-costs-us/', '10/01/2021', 1),
(44, 'Quel Est Le Coût De La Qualité', 'https://www.softwaretestinghelp.com/coq-cost-of-quality-tutorial/#more-154844', '15/01/2021', 1),
(45, 'Qu\'est-ce que l\'assurance qualité créative', 'https://medium.com/design-bootcamp/what-is-creative-qa-and-how-does-it-help-improve-product-quality-33014a14a54c', '20/01/2021', 1),
(46, 'Fuite d\'informations d\'un ingénieur AQL de Tesla', 'https://www.businessinsider.fr/us/elon-musks-tesla-suing-an-ex-worker-who-it-says-downloaded-trade-secrets-2021-1', '23/01/2021', 1),
(47, 'La qualité des logiciels d\'Apple s\'est considérablement améliorée en 2020', ' https://www.iphonehacks.com/2021/02/apple-software-quality-improved-2020.html?utm_source=dlvr.it&utm_medium=twitter', '02/02/2021', 1),
(48, 'Comment les tests Shift-Left améliorent l\'efficacité DevOps et la qualité des logiciels', 'https://devops.com/how-shift-left-testing-improves-devops-efficiency-and-software-quality/', '12/02/2021', 1),
(49, 'Les tests logiciels sont fastidieux. L\'IA peut aider.', 'https://hbr.org/2021/02/software-testing-is-tedious-ai-can-help', '20/02/2021', 1),
(50, 'Principales compétences en ingénierie de la qualité logicielle en 2021', 'https://www.mabl.com/blog/top-skills-for-software-quality-engineering-in-2021-mabl?utm_source=twitter&utm_medium=organic', '05/03/2021', 1),
(51, 'Delphix et GenRocket s\'associent pour améliorer la qualité des logiciels', 'https://devops.com/delphix-and-genrocket-team-up-to-improve-software-quality/', '17/03/2021', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cursus`
--

DROP TABLE IF EXISTS `cursus`;
CREATE TABLE IF NOT EXISTS `cursus` (
  `idUtilisateur` int(11) NOT NULL,
  `Annee` varchar(50) NOT NULL,
  `idFiliere` int(11) NOT NULL,
  PRIMARY KEY (`idUtilisateur`,`Annee`,`idFiliere`),
  KEY `CURSUS_ANNEESCOLAIRE0_FK` (`Annee`),
  KEY `CURSUS_FILIERE1_FK` (`idFiliere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cursus`
--

INSERT INTO `cursus` (`idUtilisateur`, `Annee`, `idFiliere`) VALUES
(2, '2016-2017', 1),
(2, '2017-2018', 2),
(2, '2018-2019', 3),
(2, '2019-2020', 4),
(2, '2020-2021', 5),
(2, '2021-2022', 14);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `idFiliere` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`idFiliere`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`idFiliere`, `nom`) VALUES
(1, 'SECONDE GENERALE'),
(2, 'PREMIERE STI2D'),
(3, 'TERMINALE STI2D'),
(4, '1 ERE ANNEE BTS SIO SLAM'),
(5, '2 EME ANNEE BTS SIO SLAM'),
(14, 'Licence DAGPI');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `idPhoto` int(11) NOT NULL AUTO_INCREMENT,
  `idProjet` int(11) NOT NULL,
  PRIMARY KEY (`idPhoto`),
  KEY `PHOTO_PROJETS_FK` (`idProjet`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`idPhoto`, `idProjet`) VALUES
(30, 14),
(31, 14),
(32, 14),
(33, 15),
(34, 15),
(35, 15),
(36, 15),
(37, 16),
(38, 16),
(39, 16),
(40, 17),
(41, 17),
(42, 17),
(43, 18),
(44, 18),
(46, 19),
(47, 19),
(60, 19),
(48, 20),
(49, 20),
(50, 20),
(51, 21),
(52, 21),
(53, 21),
(54, 22),
(55, 22),
(56, 22),
(57, 23),
(58, 23),
(59, 23);

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `idProjet` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `Description_` varchar(150) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idProjet`),
  KEY `PROJETS_utilisateur_FK` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`idProjet`, `nom`, `Description_`, `idUtilisateur`) VALUES
(14, 'Talian-proprete', 'Site vitrine pour une entreprise de nettoyage', 2),
(15, 'IPSAD', 'Entreprise de conseil et d\'accompagnent pour jeune entreprise', 2),
(16, 'BIO-RELAIS', 'Site de vente de produits bio ', 2),
(17, 'Autocool', 'Site de gestion , réservation de location voitures', 2),
(18, 'Championnat', 'Site de gestion d\'équipes et de tournois , Il gère les matchs , les résultats et les classements', 2),
(19, 'M2L', 'Site de présentation des ligues de lorraine avec Partie administrateur pour la gestion de celle-ci.', 2),
(20, 'MPM', 'Site de gestion de projets avec la méthode MPM. Gérer vos équipe les taches de vos projets et bien d\'autres!', 2),
(21, 'GSB', 'Site de gestion de factures.', 2),
(22, 'ResaSalle', 'Site de gestion et de réservation de salles', 2),
(23, 'JPO', 'Site de gestion de ligues de sport', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `statut` varchar(50) NOT NULL,
  `idVeille` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  PRIMARY KEY (`idUtilisateur`),
  KEY `utilisateur_VEILLE_FK` (`idVeille`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `statut`, `idVeille`, `login`, `mdp`) VALUES
(2, 'Laurain', 'Yoan', 'admin', 1, 'ylaurain', '03806f268e34cf63ef9440ae24cf4580');

-- --------------------------------------------------------

--
-- Structure de la table `veille`
--

DROP TABLE IF EXISTS `veille`;
CREATE TABLE IF NOT EXISTS `veille` (
  `idVeille` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`idVeille`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `veille`
--

INSERT INTO `veille` (`idVeille`, `nom`, `description`) VALUES
(1, 'AQL', 'Assurance Qualite Logiciel');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `ARTICLE_VEILLE_FK` FOREIGN KEY (`idVeille`) REFERENCES `veille` (`idVeille`);

--
-- Contraintes pour la table `cursus`
--
ALTER TABLE `cursus`
  ADD CONSTRAINT `CURSUS_ANNEESCOLAIRE0_FK` FOREIGN KEY (`Annee`) REFERENCES `anneescolaire` (`Annee`),
  ADD CONSTRAINT `CURSUS_FILIERE1_FK` FOREIGN KEY (`idFiliere`) REFERENCES `filiere` (`idFiliere`),
  ADD CONSTRAINT `CURSUS_utilisateur_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `PROJETS_utilisateur_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_VEILLE_FK` FOREIGN KEY (`idVeille`) REFERENCES `veille` (`idVeille`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
