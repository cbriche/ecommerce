-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 17 Avril 2015 à 17:48
-- Version du serveur: 5.5.41-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT COMMENT 'idauto',
  `nom_categorie` varchar(45) DEFAULT NULL,
  `descrip_catego` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`, `descrip_catego`) VALUES
(1, 'Transport', 'Pour vous transporter'),
(2, 'Informatique', 'Pour surfer et téléphoner'),
(3, 'Poussette', 'Pour transporter les bébés'),
(4, 'Voiture', 'Pour transporter la famille'),
(5, 'Interieur', 'Les produits d''intérieur'),
(6, 'Exterieur', 'Les produits d''extérieur');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id commentaire auto',
  `auteur_comment` varchar(45) DEFAULT NULL COMMENT 'qui a rédigé l''article',
  `contenu_comment` text COMMENT 'contenu du commentaire\n',
  `note_comment` float DEFAULT NULL COMMENT 'note donné par l''internaute\n',
  `id_produitDScomment` int(11) NOT NULL,
  `Date_comment` datetime DEFAULT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `fk_commentaire_produit_idx` (`id_produitDScomment`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id_comment`, `auteur_comment`, `contenu_comment`, `note_comment`, `id_produitDScomment`, `Date_comment`) VALUES
(1, 'Lea', 'dsfqsdfqsdf', 3, 3, '2015-04-13 14:38:36'),
(2, 'Toto', 'bla bla bla\r\navec une note 2', 2, 1, '2015-04-13 14:41:31'),
(3, 'corinne', 'commentaire sur fiche 1 avec note de 5', 5, 1, '2015-04-13 16:03:14'),
(4, 'Thomas', 'dsfqdfqsdfqdf', 4, 1, '2015-04-13 16:28:20'),
(5, 'corinne', 'dsfqdfqsdfqdf', 3, 1, '2015-04-13 16:36:24'),
(6, 'corinne', 'dsmflkqsmdlkf', 2, 1, '2015-04-13 16:39:36'),
(7, 'Isabelle', 'sdfqsdfsdf', 3, 1, '2015-04-13 16:53:33'),
(8, 'thomas', 'qsldfmqdfmqmdf', 3, 1, '2015-04-13 16:55:57'),
(9, 'jhljkl', 'knljkl', 4, 1, '2015-04-15 14:14:40'),
(10, 'corrrection', 'sdfqfsdf', 2, 1, '2015-04-15 14:15:23');

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE IF NOT EXISTS `marque` (
  `id_marque` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id auto marque',
  `nom_marque` varchar(45) DEFAULT NULL COMMENT 'nom de la marque',
  `descrip_marque` text COMMENT 'description de la marque',
  `logo_marque` varchar(250) DEFAULT NULL COMMENT 'logo de la marque',
  PRIMARY KEY (`id_marque`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `marque`
--

INSERT INTO `marque` (`id_marque`, `nom_marque`, `descrip_marque`, `logo_marque`) VALUES
(1, 'RED CASTLE', 'Au plus proche des besoins des enfants - et de ceux de leurs parents, Red Castle est attentive depuis l’origine à créer des produits irréprochables. Notre engagement est construit autour de trois grands fondamentaux : La qualité, L''innovation et la sécurité. Les produits sont fabriqués avec des matériaux hauts de gamme comme le tissu Fleur de Coton®, collection 100% coton bio, Collection cachemire, dans le respect de l’environnement, ceux-ci garantissent à votre enfant un confort et un bien-être inégalés. Tous les articles sont fabriqués selon les normes de sécurité les plus strictes en vigueur dans les pays où ils sont distribués. Faire toujours mieux pour vos enfants, c’est le cœur de leur engagement.', 'logo_redcastle.png'),
(2, 'GRACO', 'Lancée en septembre 1997, Graco Europe s''est forgée une réputation dans le domaine des produits innovants, sûrs et économiques. L''équipe Recherche et Développement de Graco travaille sans cesse sur des produits qui répondent réellement au style de vie, à l''environnement et au budget des parents d''aujourd''hui. C''est cette combinaison imbattable de qualité, d''innovation et de rapport qualité/prix qui a permis à Graco de devenir le numéro un des fabricants de poussettes et le numéro deux des fabricants de sièges auto au Royaume-Uni. La gamme de produits Graco comprend des sièges auto, des poussettes, le Travel System, des lits pliants, des balancelles et des jouets.', 'logo-Graco.png'),
(3, 'MINILAND BABY', 'Miniland Babyoffre la technologie la plus avancée et la plus sûre pour s’occuper du bébé tout en fournissant le divertissement le plus sain et le plus éducatif. Leur désir est de convertir l’expérience de parents en une expérience inoubliable et agréable. Ils font donc tout pour que les premières expériences des plus petits de la maison soient toujours merveilleuses. Chaque produit imaginé chez Miniland Baby naît avec un seul objectif: arriver un jour dans une maison, rencontrer un bébé et apporter de la sécurité et du bien-être à toute la famille.', 'logo_miniland.jpg'),
(4, 'Hewlett-Packard', 'Hewlett-Packard Company, officiellement abrégée en HP, est une entreprise multinationale américaine initialement d’électronique et d''instrumentation qui a évolué vers l''informatique, les imprimantes, les Serveurs & Réseaux et le multimédia.', 'logo_hp.jpg'),
(5, 'DACIA', 'Dacia est un constructeur d''automobiles roumain, filiale du groupe français Renault. Son nom correspond à la forme roumaine ou latine du nom du territoire occupé par les ancêtres traditionnels des Roumain', 'logo_dacia.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `auteur_message` varchar(45) DEFAULT NULL,
  `contenu_message` text,
  `date_message` datetime DEFAULT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id_message`, `auteur_message`, `contenu_message`, `date_message`) VALUES
(1, 'corinne', 'ceci est un message de chat', '2015-04-16 12:00:00'),
(2, 'julian', 'ceci est un message de chat 2', '2015-04-15 16:00:25'),
(10, 'ajout d''un message', 'dsfqdfqdf', '2015-04-17 14:11:07'),
(11, 'corinne', 'ajout message suite redirect index', '2015-04-17 14:12:53'),
(12, 'corinne 2', 'ajout message suite redirect chat', '2015-04-17 14:13:39'),
(13, 'julian', 'toto l''haricot', '2015-04-17 14:19:01'),
(14, 'julian', 'dfqsdfqdfqdsfqdsf', '2015-04-17 14:19:26'),
(15, 'dfsdfqsf', 'sdfqsdfqdf', '2015-04-17 14:44:16'),
(16, 'avec le die', 'dldldldlld', '2015-04-17 16:49:53'),
(26, 'dfqsdf', 'dfqsdfqsdf', '2015-04-17 17:42:25'),
(27, 'dsfqsdf', 'sdfqsdfqsdf', '2015-04-17 17:43:32'),
(28, 'dfqdsf', 'sdfqsdfqsd', '2015-04-17 17:43:54'),
(29, 'test', 'hello', '2015-04-17 17:48:05');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT COMMENT '	id auto',
  `titre_produit` varchar(100) DEFAULT NULL COMMENT 'nom du produit',
  `descrip_produit` text COMMENT 'description',
  `prix_produit` float DEFAULT NULL COMMENT 'prix ht de vente',
  `image_produit` varchar(100) DEFAULT NULL COMMENT 'visuel du produit',
  `id_marqueDSproduit` int(11) NOT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `fk_produit_marque1_idx` (`id_marqueDSproduit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `titre_produit`, `descrip_produit`, `prix_produit`, `image_produit`, `id_marqueDSproduit`) VALUES
(1, 'Poussette Nano Noir/rouge MOUTAIN BUGGY', 'L’art de voyager léger La nano de Mountain Buggy est la compagne de voyage idéale\r\nElle garantit commodité, longévité, la facilité et la manœuvrabilité d''une véritable expérience Mountain Buggy ainsi qu''une innovation irréprochable en matière de sécurité', 249, 'poussette-nano-noir-rouge-moutain-buggy.jpg', 1),
(2, 'Chambre Blue Mountains lit 60 x 120 cm NOUKIE', 'Contenu du pack :\r\n1 Lit Blue Mountains 60 X 120 cm Noukie''s\r\n1 Commode Blue Mountains NOUKIE''S\r\n1 Armoire Blue Mountains NOUKIE''S', 1253.25, 'chambre-blue-mountains-lit-60-x-120-cm-noukie-s.jpg', 2),
(3, 'Combinaison Troïka Feather Light rose clair m', 'Intérieur ouatiné en jersey de coton\r\nCapuche en imitation de fourrure amovible afin d''allier chaleur et élégance\r\nDeux longues fermetures éclair pour faciliter l''installation de bébé\r\nUtilisable en siège-auto harnais 3 ou 5 points, passage prévue pour la sangle entre-jambes\r\nRevers des mains repliables pour se transformer en moufles\r\nTissu plume : 100% polyamide, déperlant et respirant\r\nLongueur 65cm sans la capuche\r\nLavable en machine à 30°, sans fourrure', 54.25, 'combinaison-troika-feather-light-rose-clair-mat-red-castle.jpg', 1),
(4, 'Ordinateur Portable ASUS X205TA + Office 365 inclus', 'Atom Bay Trail Z3735 - 2.Go - 32.Go - Ecran 11.6.pouces - Windows 8.1 Bing', 213, 'ordinateur.jpg', 4),
(5, 'DACIA SANDERO', 'La berline avec 5 vraies places à prix futé', 8080, 'Dacia-Sandero-10-ans-vignet.jpg', 5),
(6, 'SAMSUNG Galaxy Core Prime Argent', 'Compatible tous opérateurs - Ecran tactile TFT 4,5’’ WVGA 480x800 - Densité de pixels : 207 ppi - Micro SIM - 4G - Android 4.4 KitKat - Interface utilisateur Samsung TouchWiz - Processeur Qualcomm MSM8916 Snapdragon 410 Quadri-Coeur 1,2 GHz - GPU Adreno 306 - Mémoire Intégrée (ROM) 8 Go - Mémoire Vive (RAM) 1 Go - Mémoire extensible par carte Micro SD (Jusqu''à 64 Go) - Appareil photo 5 mégapixels - Flash LED - Enregistreur vidéo 720p - Appareil photo frontal 2 mégapixels - Batterie 2000 mAh - Radio FM - Bluetooth 4.0 - NFC - GPS - Wi-Fi et Wi-Fi Direct - 3G / 4G', 146.99, 'samsung.jpg', 4),
(7, 'Poussette double duet chilli version 2.5', 'La poussette côte à côte tout-terrain la \r\nplus compacte au monde jamais conçue!', 699, 'poussette-2.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit_has_categorie`
--

CREATE TABLE IF NOT EXISTS `produit_has_categorie` (
  `produit_id_produit` int(11) NOT NULL,
  `categorie_id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`produit_id_produit`,`categorie_id_categorie`),
  KEY `fk_produit_has_categorie_categorie1_idx` (`categorie_id_categorie`),
  KEY `fk_produit_has_categorie_produit1_idx` (`produit_id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='table de liasion de catégo et produit (une catégo peut avoir plusieurs produit et un produit peut etre dans plusieurs catégories)';

--
-- Contenu de la table `produit_has_categorie`
--

INSERT INTO `produit_has_categorie` (`produit_id_produit`, `categorie_id_categorie`) VALUES
(1, 1),
(3, 1),
(5, 1),
(7, 1),
(4, 2),
(6, 2),
(1, 3),
(7, 3),
(5, 4),
(2, 5),
(4, 5),
(6, 5),
(1, 6),
(3, 6),
(5, 6),
(6, 6),
(7, 6);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentaire_produit` FOREIGN KEY (`id_produitDScomment`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_produit_marque1` FOREIGN KEY (`id_marqueDSproduit`) REFERENCES `marque` (`id_marque`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produit_has_categorie`
--
ALTER TABLE `produit_has_categorie`
  ADD CONSTRAINT `fk_produit_has_categorie_categorie1` FOREIGN KEY (`categorie_id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produit_has_categorie_produit1` FOREIGN KEY (`produit_id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
