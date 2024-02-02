-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 02 fév. 2024 à 11:34
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
  `dateModif` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `idUser`, `idProduit`, `marqueProduit`, `pictoEmballage`, `emballagePEE`, `packagingTrompeur`, `ingredientPEE`, `ecolabel`, `scannerAvec`, `dateModif`) VALUES
(120, 1, 1, 'ljfshdgkljfdshglkj', 'jgj', 0, 0, 0, 0, 'Quelcosmetic', '2024-02-02 12:25:07'),
(121, 1, 2, 'hgfh', 'yay', 0, 1, 1, 0, 'Yuka', '2024-02-02 10:52:05'),
(122, 1, 3, 'dqsdqs', 'coucou', 1, 1, 1, 1, 'Scan4chem', '2024-02-02 10:48:08'),
(123, 1, 4, 'ngfn', 'bvf', 1, 1, 1, 1, 'Scan4chem', '2024-02-01 03:46:44'),
(124, 1, 5, 'hfdhjfdhj', 'qsqsdqs', 0, 0, 0, 1, 'Yuka', '2024-02-02 10:47:34'),
(125, 1, 6, 'qsdqs', '', 1, 1, 1, 1, 'INCIBeauty', '2024-02-02 12:24:47'),
(126, 1, 7, '', 'qs', 0, 1, 0, 1, 'Quelcosmetic', '2024-02-02 12:24:47'),
(127, 1, 8, 'qsdqsd', 'ndfngfn', 0, 0, 0, 0, 'INCIBeauty', '2024-02-01 10:32:34'),
(128, 1, 9, '', 'qsdqsd', 1, 1, 1, 1, 'Yuka', '2024-02-02 12:24:47'),
(129, 1, 10, 'qsdqsd', '', 0, 1, 1, 0, 'INCIBeauty', '2024-02-02 12:24:47'),
(130, 1, 11, '', '', 0, 0, 0, 0, 'Quelcosmetic', '2024-02-02 12:24:47'),
(131, 1, 12, 'dgdfgdf', 'gdfgdfgd', 0, 1, 0, 1, 'Quelcosmetic', '2024-02-02 11:43:31'),
(132, 1, 13, 'fdgdfgdg', '', 0, 0, 1, 0, 'Yuka', '2024-02-02 12:01:41'),
(133, 1, 14, 'dfgdfgdfg', '', 1, 0, 0, 0, 'INCIBeauty', '2024-02-02 12:01:41'),
(134, 1, 15, '', 'dfgdfgfdg', 0, 1, 0, 1, 'Quelcosmetic', '2024-02-02 12:01:41'),
(135, 1, 16, '', '', 0, 0, 0, 0, 'Scan4chem', '2024-02-02 12:01:41'),
(136, 1, 17, 'dfgdfgdfg', '', 0, 1, 1, 0, 'Yuka', '2024-02-02 12:01:41'),
(137, 1, 18, 'dfgdfgdf', '', 0, 0, 0, 0, 'INCIBeauty', '2024-02-02 12:01:41'),
(138, 1, 19, '', 'fdgfgdfgd', 1, 0, 0, 0, 'Quelcosmetic', '2024-02-02 12:01:41'),
(139, 1, 20, 'dfgdfgdf', 'dgdfgdfgdf', 0, 0, 1, 0, 'Yuka', '2024-02-02 11:43:31');

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
