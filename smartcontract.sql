-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 04 mars 2022 à 09:44
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `smartcontract`
--

-- --------------------------------------------------------

--
-- Structure de la table `tblapprobateur`
--

DROP TABLE IF EXISTS `tblapprobateur`;
CREATE TABLE IF NOT EXISTS `tblapprobateur` (
  `ID_APPROBATEUR` int(11) NOT NULL,
  `NOM_COMPLET` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `TELEPHONE` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `CREATIONDATE` datetime DEFAULT NULL,
  `UPDATIONDATE` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_APPROBATEUR`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tblcommentaire`
--

DROP TABLE IF EXISTS `tblcommentaire`;
CREATE TABLE IF NOT EXISTS `tblcommentaire` (
  `ID_CONTRAT` int(11) NOT NULL,
  `ID_FOURNISSEUR` int(11) NOT NULL,
  `ID_REDACTEUR` int(11) NOT NULL,
  `ID_APPROBATEUR` int(11) NOT NULL,
  `ID_RESPONSABLE_REVUE` int(11) NOT NULL,
  `LIBELLE` varchar(34463) DEFAULT NULL,
  `CREATIONDATE` datetime DEFAULT NULL,
  `UPDATIONDATE` datetime DEFAULT NULL,
  `ID_COMMENTAIRE` int(11) NOT NULL,
  PRIMARY KEY (`ID_COMMENTAIRE`),
  KEY `I_FK_TBLCOMMENTAIRE_TBLCONTRAT` (`ID_CONTRAT`),
  KEY `I_FK_TBLCOMMENTAIRE_TBLFOURNISSEUR` (`ID_FOURNISSEUR`),
  KEY `I_FK_TBLCOMMENTAIRE_TBLREDACTEUR` (`ID_REDACTEUR`),
  KEY `I_FK_TBLCOMMENTAIRE_TBLAPPROBATEUR` (`ID_APPROBATEUR`),
  KEY `I_FK_TBLCOMMENTAIRE_TBLRESPONSABLEREVUE` (`ID_RESPONSABLE_REVUE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tblcontrat`
--

DROP TABLE IF EXISTS `tblcontrat`;
CREATE TABLE IF NOT EXISTS `tblcontrat` (
  `ID_CONTRAT` int(11) NOT NULL,
  `ID_MONITEUR` int(11) NOT NULL,
  `ID_TYPE_CONTRAT` int(11) NOT NULL,
  `ID_RESPONSABLE_REVUE` int(11) NOT NULL,
  `ID_LISTE_ACTEUR` int(11) NOT NULL,
  `ID_APPROBATEUR` int(11) NOT NULL,
  `ID_INITIATEUR` int(11) NOT NULL,
  `NUM_CONTRAT` varchar(255) DEFAULT NULL,
  `DESIGNATION` varchar(255) DEFAULT NULL,
  `LISTE_CONTRIBUTEURS` varchar(255) DEFAULT NULL,
  `DELAI_TRAITEMENT` bigint(4) DEFAULT NULL,
  `PIECE_JOINTE` varchar(255) DEFAULT NULL,
  `OBSERVATIONS` varchar(255) DEFAULT NULL,
  `CREATION_DATE` datetime DEFAULT NULL,
  `UPDATION_DATE` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_CONTRAT`),
  KEY `I_FK_TBLCONTRAT_TBLMONITEUR` (`ID_MONITEUR`),
  KEY `I_FK_TBLCONTRAT_TBLTYPECONTRAT` (`ID_TYPE_CONTRAT`),
  KEY `I_FK_TBLCONTRAT_TBLRESPONSABLEREVUE` (`ID_RESPONSABLE_REVUE`),
  KEY `I_FK_TBLCONTRAT_TBLLISTEACTEUR` (`ID_LISTE_ACTEUR`),
  KEY `I_FK_TBLCONTRAT_TBLAPPROBATEUR` (`ID_APPROBATEUR`),
  KEY `I_FK_TBLCONTRAT_TBLINITIATEUR` (`ID_INITIATEUR`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tblfonction`
--

DROP TABLE IF EXISTS `tblfonction`;
CREATE TABLE IF NOT EXISTS `tblfonction` (
  `ID_FONCTION` int(11) NOT NULL,
  `LIBELLE_FONCTION` varchar(9999) DEFAULT NULL,
  PRIMARY KEY (`ID_FONCTION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tblfournisseur`
--

DROP TABLE IF EXISTS `tblfournisseur`;
CREATE TABLE IF NOT EXISTS `tblfournisseur` (
  `ID_FOURNISSEUR` int(11) NOT NULL,
  `RS_FOURNISSEUR` varchar(255) DEFAULT NULL,
  `TELEPHONE` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `ADRESSE` varchar(255) DEFAULT NULL,
  `PAYS` varchar(255) DEFAULT NULL,
  `VILLE` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `CREATIONDATE` datetime DEFAULT NULL,
  `UPDATIONDATE` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_FOURNISSEUR`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tblinitiateur`
--

DROP TABLE IF EXISTS `tblinitiateur`;
CREATE TABLE IF NOT EXISTS `tblinitiateur` (
  `ID_INITIATEUR` int(11) NOT NULL,
  `NOM_COMPLET` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `TELEPHONE` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `CREATIONDATE` datetime DEFAULT NULL,
  `UPDATIONDATE` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_INITIATEUR`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbllisteacteur`
--

DROP TABLE IF EXISTS `tbllisteacteur`;
CREATE TABLE IF NOT EXISTS `tbllisteacteur` (
  `ID_LISTE_ACTEUR` int(11) NOT NULL,
  `ACTEURS` varchar(34463) DEFAULT NULL,
  PRIMARY KEY (`ID_LISTE_ACTEUR`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tblmodel`
--

DROP TABLE IF EXISTS `tblmodel`;
CREATE TABLE IF NOT EXISTS `tblmodel` (
  `ID_MODEL` int(11) NOT NULL,
  `NOM_MODEL` varchar(999) DEFAULT NULL,
  PRIMARY KEY (`ID_MODEL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tblmoniteur`
--

DROP TABLE IF EXISTS `tblmoniteur`;
CREATE TABLE IF NOT EXISTS `tblmoniteur` (
  `ID_MONITEUR` int(11) NOT NULL,
  `NOM_COMPLET` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `TELEPHONE` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `CREATIONDATE` datetime DEFAULT NULL,
  `UPDATIONDATE` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_MONITEUR`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tblredacteur`
--

DROP TABLE IF EXISTS `tblredacteur`;
CREATE TABLE IF NOT EXISTS `tblredacteur` (
  `ID_REDACTEUR` int(11) NOT NULL,
  `ID_FONCTION` int(11) NOT NULL,
  `NOM_COMPLET` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `TELEPHONE` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `CREATIONDATE` datetime DEFAULT NULL,
  `UPDATIONDATE` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_REDACTEUR`),
  KEY `I_FK_TBLREDACTEUR_TBLFONCTION` (`ID_FONCTION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tblresponsablerevue`
--

DROP TABLE IF EXISTS `tblresponsablerevue`;
CREATE TABLE IF NOT EXISTS `tblresponsablerevue` (
  `ID_RESPONSABLE_REVUE` int(11) NOT NULL,
  `NOM_COMPLET` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `TELEPHONE` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `CREATIONDATE` datetime DEFAULT NULL,
  `UPDATIONDATE` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_RESPONSABLE_REVUE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbltypecontrat`
--

DROP TABLE IF EXISTS `tbltypecontrat`;
CREATE TABLE IF NOT EXISTS `tbltypecontrat` (
  `ID_TYPE_CONTRAT` int(11) NOT NULL,
  `ID_MODEL` int(11) NOT NULL,
  `LIBELLE_TYPE_CONTRAT` varchar(999) DEFAULT NULL,
  PRIMARY KEY (`ID_TYPE_CONTRAT`),
  KEY `I_FK_TBLTYPECONTRAT_TBLMODEL` (`ID_MODEL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `user_email`, `password`) VALUES
(1, 'seini abaya', 'seiniabaya@gmail.com', 'seiniabaya'),
(2, 'tchuente joslin', 'tchuente@gmail.com', 'tchuentejoslin'),
(3, 'takam junior', 'takam@gmail.com', 'takamjunior'),
(4, 'zoleko cesar', 'cesar@gmail.com', 'zolekocesar');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
