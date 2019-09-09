-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 28 Novembre 2016 à 01:03
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `photoforyoupons`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `dernier_inscrit`()
BEGIN
 DECLARE done INT DEFAULT 0;
    DECLARE v_idUser int;
    DECLARE v_type varchar(32);
    DECLARE v_nom varchar(32);
    DECLARE v_prenom varchar(32);
    DECLARE v_pseudo varchar(32);
    DECLARE v_mail varchar(100);
    DECLARE v_nbCredit int;
    DECLARE v_nbImage int;
    DECLARE curseur1 CURSOR FOR SELECT idUser, type, nom, prenom, pseudo, mail, nbCredit, nbImage FROM users WHERE idUser IN (SELECT MAX(idUser) FROM users);
    DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET done= 1;
    
    OPEN curseur1;
    
    REPEAT 
  FETCH curseur1 INTO v_idUser, v_type, v_nom, v_prenom, v_pseudo, v_mail, v_nbCredit, v_nbImage;
        IF done=0 THEN
    SELECT idUser, type, nom, prenom, pseudo, mail, nbCredit, nbImage FROM users WHERE idUser IN (SELECT MAX(idUser) FROM users);
  END IF;
        UNTIL done
 END REPEAT;
        
        CLOSE curseur1;
   
END$$

--
-- Fonctions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `InitCap`(`my_chaine` VARCHAR(40)) RETURNS varchar(40) CHARSET latin1
begin
return ( concat(upper(substr(my_chaine,1,1)),
lower(substr(my_chaine,2,length(my_chaine)-1))) );
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sans_credit`() RETURNS int(4)
BEGIN
DECLARE credit int;
	SELECT DISTINCT COUNT(*) into credit
    FROM users
    WHERE nbCredit=0;
    RETURN credit;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `nomMenu` varchar(100) NOT NULL,
  `Lien` varchar(100) NOT NULL,
  `connecte` int(11) NOT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`idMenu`, `nomMenu`, `Lien`, `connecte`) VALUES
(1, 'Acheter des credits', 'achatcredits.php', 0),
(2, 'Acheter des images', 'achatimages.php', 0),
(3, 'Nous contacter', 'contacts.php', 2),
(4, 'Connexion', 'connexion.php', 1),
(5, 'S’inscrire', 'inscription.php', 1),
(7, 'Panneau de configuration', 'configuration.php', 3),
(8, 'Ajouter des photos', 'addPhoto.php', 4),
(9, 'Mes ventes', 'historique.php', 4),
(10, 'Ma galerie', 'galerie.php', 4),
(11, 'Banque de photos', 'banque.php', 5),
(12, 'Se déconnecter', 'transfertDeco.php', 6);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `idPhoto` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `nbPxLargeur` int(11) NOT NULL,
  `nbPxLongueur` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `taille` float NOT NULL,
  PRIMARY KEY (`idPhoto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `poster`
--

CREATE TABLE IF NOT EXISTS `poster` (
  `idUser` int(11) NOT NULL,
  `idPhoto` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idPhoto`),
  KEY `idPhoto_idx` (`idPhoto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `type` varchar(21) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nbCredit` int(11) NOT NULL,
  `nbImage` int(11) NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `prenom`, `nom`, `pseudo`, `type`, `mail`, `password`, `nbCredit`, `nbImage`) VALUES
(3, 'Hakim', 'Makhtour', 'Hakimono', 'Admin', 'sio.maktour@gmail.com', 'admin', 0, 0),
(6, 'Aude', 'Makhtour', 'PetitNem', 'Client', 'sio.ponsa@gmail.com', 'b03e6c8474904244d72f', 0, 0),
(7, 'Mélanie', 'Pereira', 'Blabla', 'Photographe', 'blabla@gmail.com', 'df5ea29924d39c3be878', 0, 0),
(8, 'Hakim', 'LeBG', 'Hakimono', 'Admin', 'sio.makhtour@gmail.com', '21232f297a57a5a74389', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `vendreacheter`
--

CREATE TABLE IF NOT EXISTS `vendreacheter` (
  `idPhoto` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idUser2` int(11) NOT NULL,
  `cout` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPhoto`,`idUser`,`idUser2`),
  KEY `idUser_idx` (`idUser`),
  KEY `idUser2_idx` (`idUser2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
