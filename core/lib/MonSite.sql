-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 29 Mai 2015 à 21:18
-- Version du serveur :  5.6.24-0ubuntu2
-- Version de PHP :  5.6.4-4ubuntu6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `MonSite`
--

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `fk_idsource` int(11) DEFAULT NULL,
  `source_link` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `background` varchar(255) DEFAULT NULL,
  `icons` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `titre`, `contenu`, `fk_idsource`, `source_link`, `date`, `background`, `icons`) VALUES
(1, 'Le premier article', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque risus ex, volutpat at nunc at, dignissim tempor tortor. Praesent hendrerit, mauris id finibus venenatis, metus enim porttitor tortor, ac pharetra dolor felis in leo. Proin blandit non ipsum non dignissim. Integer ut molestie ante, eget dictum tellus. Nulla id sapien ex. Maecenas lacinia aliquam sagittis. Sed ultricies facilisis elit, quis imperdiet diam ullamcorper vitae. Fusce urna mauris, interdum vitae erat a, elementum auctor erat.\r\nPellentesque mauris quam, scelerisque eget congue in, pulvinar a massa. Sed vitae elit ac sapien luctus mattis. Suspendisse potenti. In vitae arcu ac ligula finibus scelerisque. Fusce fringilla imperdiet lectus, ac pellentesque velit euismod vitae. Morbi eu faucibus enim. Aliquam blandit lacus ex, nec suscipit ex fringilla in. Nulla consequat nibh vel feugiat gravida. Duis dictum, tellus non congue egestas, felis tortor tristique turpis, in dapibus justo purus nec urna. Sed et consectetur turpis. Nam commodo augue finibus malesuada eleifend. Etiam mi est, venenatis tincidunt convallis imperdiet, semper id erat. Aliquam leo est, aliquet ac odio vitae, semper feugiat ante. Integer iaculis vehicula lorem, et dictum nulla hendrerit in. Phasellus pharetra, ipsum id dapibus molestie, orci est dignissim augue, id congue sapien felis et lacus. Vivamus quis accumsan purus, gravida consequat tortor.\r\nNunc molestie dolor eu interdum venenatis. Etiam ex nisi, efficitur id pellentesque ac, dignissim et quam. Integer pretium, urna et efficitur maximus, libero nisl facilisis ipsum, eget ultrices nunc mauris a massa. Aenean viverra ante magna, non faucibus odio faucibus eget. Duis at condimentum tellus. In mollis lectus eu ipsum ullamcorper, vel efficitur enim pretium. Phasellus gravida elementum eros in mattis. Maecenas consectetur, magna id suscipit aliquam, libero tellus hendrerit nisi, eget consectetur mi turpis a justo. Nulla magna nibh, condimentum porta mattis et, dignissim et nisi. Phasellus mattis nisl in nulla vulputate, sed tempor nisi egestas. Morbi facilisis a velit in tincidunt. Aliquam facilisis sollicitudin eros quis consectetur. Praesent sit amet leo quis lorem semper pulvinar quis vitae velit.\r\nCras porttitor augue sed urna feugiat consequat sit amet nec libero. Duis urna augue, semper sed odio imperdiet, interdum ultricies urna. Quisque consequat risus purus, nec euismod dui laoreet et. Nam imperdiet ut odio quis hendrerit. Aenean dictum justo eget velit hendrerit euismod. In non velit vel elit dignissim porta in eu nisl. Vivamus ac quam lacinia, faucibus felis vel, tristique lorem. Donec non tempus quam. Aliquam tincidunt nunc id ligula consequat interdum. Vestibulum id tempus ex. Maecenas facilisis vehicula interdum. Proin non magna sapien. Ut non imperdiet arcu. Fusce convallis egestas nulla, at aliquet justo dictum ut. Integer et congue leo, et euismod purus.\r\n', NULL, '', '2015-05-28 22:07:09', 'flash.jpg', 'ico_epingle.png'),
(2, 'Linux : découverte d''un bug sur le système de fichiers EXT4', 'Un bug sur Linux a été découvert récemment. Il toucherait le système de fichiers EXT4 RAID et pourrait causer une perte massive de données.\r\n\r\nLe bug serait apparu sur les distributions Debian, Fedora et Arch Linux, et ne se serait manifesté que sur les versions 4.x du noyau. Toutefois, Lukas Czerner explique sur la Mailing List du Kernel Linux que le bug pourrait exister depuis la version 3.12 ainsi que toutes les versions stables qui l’ont suivi.\r\nEric Work qui avait détecté le bug le dimanche dernier avait expliqué sur bugzilla qu’il commença à remarquer la présence d’une corruption de données après une mise à jour du noyau récente sur Fedora 21. « Finalement, le système n''a pas pu démarrer en raison de ce problème de corruption » déclare-t-il, « plus tard, il est avéré que les fichiers corrompus avaient une taille et un horodatage corrects, mais ils étaient remplis de zéros. Parfois des répertoires entiers se vidaient après fsck ».\r\nLe commit qui avait corrigé cette erreur déclarait dans la description que la raison était due à une erreur de calcul de RAID0. Neil Brown, l’auteur de ce commit, explique que « La variable "sector" dans "raid0_make_request()" n’a pas été correctement modifiée par l’appel à "sector_div()" qui modifie son premier argument à la place. Le commit [précèdent] restaurait cette variable après l’appel pour une utilisation ultérieure. Malheureusement la restauration a été effectuée après que la variable "bio" a été avancée ». Cela aurait conduit à ce que la valeur originale et la valeur restaurée de la variable concernée divergent. Pour corriger cette erreur, il aurait suffi de déplacer la ligne responsable de cette modification.\r\nCependant, ce commit n’a pas encore été intégré dans le code du noyau Linux. En effet, Neil Brown avait écrit hier que « le patch a été ajouté aujourd’hui à mon arbre Git. Je vais l’envoyer demain à Linus alors il devrait apparaître lors de la prochaine RC ». En attendant les utilisateurs qui utiliseraient EXT4 RAID0 pourraient éviter le problème en restaurant le noyau à la version 4.0 le temps que la correction du bug soit intégrée.', 1, 'actu/85653/Linux-decouverte-d-un-bug-sur-le-systeme-de-fichiers-EXT4-qui-pourrait-causer-une-importante-perte-de-donnees/', '2015-05-29 17:48:08', NULL, 'linux.gif');

-- --------------------------------------------------------

--
-- Structure de la table `source`
--

CREATE TABLE IF NOT EXISTS `source` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `urlSite` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `source`
--

INSERT INTO `source` (`id`, `name`, `urlSite`) VALUES
(1, '', ''),
(2, 'developpez.com', 'http://www.developpez.com');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`), ADD KEY `date` (`date`), ADD KEY `CT_FK_idsource` (`fk_idsource`);

--
-- Index pour la table `source`
--
ALTER TABLE `source`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `source`
--
ALTER TABLE `source`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
ADD CONSTRAINT `CT_FK_idsource` FOREIGN KEY (`fk_idsource`) REFERENCES `source` (`id`);

ALTER TABLE `news`
DROP FOREIGN KEY `CT_FK_idsource`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
