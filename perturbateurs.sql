-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 30 jan. 2024 à 14:45
-- Version du serveur : 8.2.0
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `perturbateurs`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `typeProduit` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `nomProduit` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2055 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `typeProduit`, `nomProduit`) VALUES
(1, 'Aliments', 'Canette de sodas'),
(2, 'Aliments', 'Chocolat en poudre'),
(3, 'Aliments', 'Haricots en conserve'),
(4, 'Aliments', 'Mais en conserve'),
(5, 'Aliments', 'Thon en conserve'),
(6, 'Aliments', 'Salade en sachet'),
(7, 'Aliments', 'Pâte à tartiner type Nutella'),
(8, 'Aliments', 'Salade de fruits en conserve'),
(9, 'Aliments', 'Yaourt au soja'),
(10, 'Aliments', 'Compotes à boire'),
(11, 'Aliments', 'Bouteille d\'eau en plastique'),
(12, 'Cosmétiques et produits hygiène', 'Shampoing'),
(13, 'Cosmétiques et produits hygiène', 'Après-shampoing'),
(14, 'Cosmétiques et produits hygiène', 'Dentifrice'),
(15, 'Cosmétiques et produits hygiène', 'Gel-douche'),
(16, 'Cosmétiques et produits hygiène', 'Crème de jour'),
(17, 'Cosmétiques et produits hygiène', 'Crème de nuit'),
(18, 'Cosmétiques et produits hygiène', 'Déodorant'),
(19, 'Cosmétiques et produits hygiène', 'Serviettes hygiéniques'),
(20, 'Cosmétiques et produits hygiène', 'Couches'),
(21, 'Produits ménagers', 'Déodorisant pour toilette'),
(22, 'Produits ménagers', 'Produit-vaisselle'),
(23, 'Produits ménagers', 'Produit de nettoyage multi-usage'),
(24, 'Produits ménagers', 'Lessive'),
(25, 'Poêles antiadhésives', 'PFOA'),
(26, 'Poêles antiadhésives', 'PFOS'),
(27, 'Mon balcon/mon jardin', 'Herbicides'),
(28, 'Mon balcon/mon jardin', 'Mélanges avec engrais');

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

DROP TABLE IF EXISTS `questionnaire`;
CREATE TABLE IF NOT EXISTS `questionnaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idUser` int NOT NULL,
  `idProduit` int NOT NULL,
  `marqueProduit` varchar(128) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pictoEmballage` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emballagePEE` tinyint(1) DEFAULT NULL,
  `packagingTrompeur` tinyint(1) DEFAULT NULL,
  `ingredientPEE` tinyint(1) DEFAULT NULL,
  `ecolabel` tinyint(1) DEFAULT NULL,
  `scannerAvec` enum('INCIBeauty','Yuka','Scan4chem','Quelcosmetic') COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `idUser`, `idProduit`, `marqueProduit`, `pictoEmballage`, `emballagePEE`, `packagingTrompeur`, `ingredientPEE`, `ecolabel`, `scannerAvec`) VALUES
(120, 1, 1, 'qzdsqd', 'test wew', 1, 1, 1, 1, 'INCIBeauty'),
(121, 1, 2, '', '', 1, 1, 1, 1, 'INCIBeauty'),
(122, 1, 3, 'dqsdqs', '', 1, 1, 1, 1, 'INCIBeauty'),
(123, 1, 4, '', '', 1, 1, 1, 1, 'INCIBeauty'),
(124, 1, 5, '', 'qsqsdqs', 1, 1, 1, 1, 'INCIBeauty'),
(125, 1, 6, 'qsdqs', '', 1, 1, 1, 1, 'INCIBeauty'),
(126, 1, 7, '', 'qsdqsdqs', 1, 1, 1, 1, 'INCIBeauty'),
(127, 1, 8, 'qsdqsd', '', 1, 1, 1, 1, 'INCIBeauty'),
(128, 1, 9, '', 'qsdqsd', 1, 1, 1, 1, 'INCIBeauty'),
(129, 1, 10, 'qsdqsd', '', 1, 1, 1, 1, 'INCIBeauty'),
(130, 1, 11, 'qsdqsd', 'qsdqsd', 1, 1, 1, 1, 'INCIBeauty');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`) VALUES
(1, 'Doe', 'John');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
