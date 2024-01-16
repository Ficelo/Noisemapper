-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 16 jan. 2024 à 14:44
-- Version du serveur : 10.5.20-MariaDB
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id21587557_noisemapper`
--

-- --------------------------------------------------------

--
-- Structure de la table `Avis`
--

CREATE TABLE `Avis` (
  `idAvis` int(11) NOT NULL,
  `Note` int(11) DEFAULT NULL,
  `Commentaire` varchar(45) DEFAULT NULL,
  `User_idUser` int(11) NOT NULL,
  `Concert_idConcert` int(11) NOT NULL,
  `Concert_Salle_idSalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Capteur`
--

CREATE TABLE `Capteur` (
  `idCapteur` int(11) NOT NULL,
  `Position_x` int(11) DEFAULT NULL,
  `Position_y` int(11) DEFAULT NULL,
  `Salle_idSalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `CGU`
--

CREATE TABLE `CGU` (
  `idCGU` int(11) NOT NULL,
  `Text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `CGU`
--

INSERT INTO `CGU` (`idCGU`, `Text`) VALUES
(1, 'Date de la dernière mise à jour : Janvier 2024\r\n\r\nBienvenue sur Noisemapper, le site web dédié à l\'univers des concerts et des événements musicaux !\r\n\r\nEn utilisant ce site web, vous acceptez les conditions générales d\'utilisation énoncées ci-dessous. Si vous n\'acceptez pas ces conditions, veuillez ne pas utiliser ce site.\r\n\r\n1. Utilisation du site\r\n\r\n1.1 En accédant à ce site web, vous vous engagez à ne pas utiliser le contenu à des fins illégales ou interdites par ces conditions.\r\n\r\n1.2 Vous acceptez de ne pas interférer avec la sécurité du site ni d\'entraver son bon fonctionnement.\r\n\r\n2. Contenu du site\r\n\r\n2.1 Le contenu de ce site est fourni à titre informatif uniquement. Nous ne garantissons pas l\'exactitude, l\'exhaustivité ou la pertinence du contenu.\r\n\r\n2.2 Nous nous réservons le droit de modifier, suspendre ou interrompre le site à tout moment, sans préavis.\r\n\r\n3. Inscription et compte utilisateur\r\n\r\n3.1 Pour accéder à certaines fonctionnalités du site, vous pourriez être amené à créer un compte utilisateur.\r\n\r\n3.2 Vous êtes responsable de la confidentialité de vos informations d\'identification et de toute activité qui se produit sous votre compte.\r\n\r\n4. Billetterie et événements\r\n\r\n4.1 Noisemapper propose des informations sur des concerts et des événements. Les informations sur la billetterie sont fournies à titre indicatif et peuvent être sujettes à des changements.\r\n\r\n4.2 Nous ne sommes pas responsables des transactions liées à l\'achat de billets. Ces transactions sont soumises aux conditions générales de vente des fournisseurs de billets.\r\n\r\n5. Propriété intellectuelle\r\n\r\n5.1 Le contenu du site, y compris les textes, images, logos, etc., est protégé par des droits d\'auteur et d\'autres lois sur la propriété intellectuelle.\r\n\r\n5.2 Vous ne pouvez pas reproduire, distribuer ou créer des œuvres dérivées à partir du contenu sans notre autorisation écrite.\r\n\r\n6. Limitation de responsabilité\r\n\r\n6.1 Noisemapper n\'est pas responsable des dommages directs, indirects, spéciaux, consécutifs ou punitifs résultant de l\'utilisation ou de l\'incapacité d\'utiliser ce site.\r\n\r\n7. Modifications des CGU\r\n\r\n7.1 Nous nous réservons le droit de modifier ces CGU à tout moment. Les modifications prendront effet dès leur publication sur le site.\r\n\r\nEn utilisant Noisemapper, vous acceptez d\'être lié par ces conditions. Si vous ne les acceptez pas, veuillez ne pas utiliser le site.\r\n\r\nPour toute question concernant ces CGU, veuillez nous contacter à [votre adresse e-mail].\r\n\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `Concert`
--

CREATE TABLE `Concert` (
  `idConcert` int(11) NOT NULL,
  `Durée` int(11) DEFAULT NULL,
  `Nom` varchar(45) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Description` varchar(45) DEFAULT NULL,
  `Classique` tinyint(4) DEFAULT NULL,
  `Placement` varchar(45) DEFAULT NULL,
  `Salle_idSalle` int(11) NOT NULL,
  `User_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Concert`
--

INSERT INTO `Concert` (`idConcert`, `Durée`, `Nom`, `Date`, `Description`, `Classique`, `Placement`, `Salle_idSalle`, `User_idUser`) VALUES
(1, 120, 'Black Eyed Peas', '2023-12-13 22:24:02', 'Tournée mondiale du groupe', 0, NULL, 1, 5),
(2, 60, 'Gazo', '2023-12-27 00:08:05', 'Concert évènement', 0, NULL, 1, 5),
(3, 240, 'MIMI MATI', '2023-12-13 22:24:02', 'Tournée mondiale de la dame', 0, NULL, 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `Contacts`
--

CREATE TABLE `Contacts` (
  `idContacts` int(11) NOT NULL,
  `AdresseMail` varchar(45) DEFAULT NULL,
  `NumeroTel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `FAQ`
--

CREATE TABLE `FAQ` (
  `idFAQ` int(11) NOT NULL,
  `Question` text DEFAULT NULL,
  `Reponse` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `FAQ`
--

INSERT INTO `FAQ` (`idFAQ`, `Question`, `Reponse`) VALUES
(1, 'Comment peut-on connaitre le placement idéal pour chaque concerts?', 'Il suffit de vous rendre dans l\'espace \"Mon profil\" pour trouver la carte de placement.'),
(2, 'Quel est le prix pour un utilisateur?', 'La solution est gratuite pour chaque utilisateur. ');

-- --------------------------------------------------------

--
-- Structure de la table `instruments`
--

CREATE TABLE `instruments` (
  `instrument` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Mentions_legales`
--

CREATE TABLE `Mentions_legales` (
  `idMentions` int(11) NOT NULL,
  `Text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Mentions_legales`
--

INSERT INTO `Mentions_legales` (`idMentions`, `Text`) VALUES
(1, '1. Éditeur du site\r\n\r\nNoisemapper\r\n28 rue Notre-Dame-des-Champs\r\nNoisemapper\r\ncontact@noisemapper.fr\r\n\r\n2. Directeur de la publication\r\n\r\nGroove 4 Everyone\r\ncontact@g4e.fr\r\n\r\n3. Hébergement du site\r\n\r\nLe site Noisemapper est hébergé par 000webhost.com, propriété de Hostinger\r\n\r\n4. Propriété intellectuelle\r\n\r\n4.1 Le contenu du site, y compris les textes, images, logos, etc., est protégé par des droits d\'auteur et d\'autres lois sur la propriété intellectuelle.\r\n\r\n4.2 Toute reproduction, distribution ou utilisation du contenu sans autorisation écrite est strictement interdite.\r\n\r\n5. Collecte et traitement des données personnelles\r\n\r\n5.1 Noisemapper collecte des données personnelles dans le cadre de son fonctionnement. Pour plus d\'informations sur la collecte et le traitement des données, veuillez consulter notre Politique de Confidentialité.\r\n\r\n6. Cookies\r\n\r\n6.1 Noisemapper utilise des cookies pour améliorer l\'expérience de l\'utilisateur. Pour plus d\'informations sur l\'utilisation des cookies, veuillez consulter notre Politique de Cookies.\r\n\r\n7. Responsabilité\r\n\r\n7.1 Noisemapper ne peut être tenu responsable des dommages résultant de l\'utilisation ou de l\'incapacité d\'utiliser le site.\r\n\r\n8. Liens externes\r\n\r\n8.1 Ce site peut contenir des liens vers des sites externes. Noisemapper n\'est pas responsable du contenu de ces sites externes.\r\n\r\n9. Contact\r\n\r\nPour toute question concernant le site ou ces mentions légales, veuillez nous contacter à l\'adresse suivante : g4E@gmail.com .\r\n\r\n10. Loi applicable et juridiction compétente\r\n\r\nCes mentions légales sont régies par la loi RGPD et tout litige relatif à ces conditions d\'utilisation sera porté devant les tribunaux compétents de Paris.\r\n\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `Mesure`
--

CREATE TABLE `Mesure` (
  `idMesure` int(11) NOT NULL,
  `Temps` int(11) DEFAULT NULL,
  `Valeur` int(11) DEFAULT NULL,
  `Capteur_idCapteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Question`
--

CREATE TABLE `Question` (
  `idQuestion` int(11) NOT NULL,
  `Date` datetime DEFAULT NULL,
  `Texte` text DEFAULT NULL,
  `User_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Question`
--

INSERT INTO `Question` (`idQuestion`, `Date`, `Texte`, `User_idUser`) VALUES
(1, '2023-12-13 22:24:02', 'Comment savoir ou se placer pour profiter un maximum du concert sans s\'abimer les tympans?', 1),
(12, '2024-01-12 14:23:18', 'Est-ce que le positionnement prends en compte chaque utilisateur?', 1),
(13, '2024-01-12 14:29:56', 'Hello World', 1),
(17, '2024-01-12 15:56:32', 'Quelle sont les concerts disponibles sur ce site Web?', 1),
(18, '2024-01-12 19:33:49', 'Super', 44),
(19, '2024-01-12 19:35:50', 'Ça ne serait pas de la faute des Arabes?', 44);

-- --------------------------------------------------------

--
-- Structure de la table `Réponse`
--

CREATE TABLE `Réponse` (
  `idRéponse` int(11) NOT NULL,
  `Date` datetime DEFAULT NULL,
  `Texte` text DEFAULT NULL,
  `Question_idQuestion` int(11) NOT NULL,
  `User_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Réponse`
--

INSERT INTO `Réponse` (`idRéponse`, `Date`, `Texte`, `Question_idQuestion`, `User_idUser`) VALUES
(3, '2024-01-12 14:27:45', 'Oui', 12, 1),
(4, '2024-01-12 14:27:57', 'Il faut regarder', 1, 1),
(5, '2024-01-12 19:40:18', 'Je ne pense pas', 19, 1),
(6, '2024-01-12 21:49:06', 'OUI OUI', 1, 13),
(7, '2024-01-13 17:37:20', 'Ah bon?\r\n', 19, 1),
(8, '2024-01-13 17:37:31', 'Non', 19, 1),
(9, '2024-01-13 17:37:34', 'Non', 19, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Salle`
--

CREATE TABLE `Salle` (
  `idSalle` int(11) NOT NULL,
  `Lieu` varchar(45) DEFAULT NULL,
  `Nom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Salle`
--

INSERT INTO `Salle` (`idSalle`, `Lieu`, `Nom`) VALUES
(1, '8 Bd de Bercy 75012 Paris', 'Accor Hotel Arena'),
(3, '28 Bd des Capucines, 75009 Paris', 'L\'Olympia'),
(4, '99 Jard. de l\'Arche, 92000 Nanterre', 'U Arena La Defense'),
(5, 'Stade de France, 93200 Saint-Denis', 'Stade de France'),
(6, '2 Pl de la Prte Maillot, 75017 Paris', 'Palais des Congrès de Paris'),
(7, '120 Bd de Rochechouart, 75018 Paris', 'La Cigale'),
(8, '1 Bd Poissonnière, 75002 Paris', 'Le Grand Rex');

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `idUser` int(11) NOT NULL,
  `Nom` varchar(45) DEFAULT NULL,
  `Prenom` varchar(45) DEFAULT NULL,
  `MotDePasse` varchar(255) DEFAULT NULL,
  `Mail` varchar(45) DEFAULT NULL,
  `Role` int(11) DEFAULT 2,
  `PhotoProfil` varchar(45) DEFAULT 'data/pp/default.png',
  `PrefCouleur` int(11) DEFAULT 0,
  `Langue` varchar(45) DEFAULT 'fr'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`idUser`, `Nom`, `Prenom`, `MotDePasse`, `Mail`, `Role`, `PhotoProfil`, `PrefCouleur`, `Langue`) VALUES
(1, 'Lemaigre-Dubreuil', 'Florent', '$2y$10$uLv5alL8cBTcQBxa89LHVOMBqsqRpMiCi6fEHKpeFxNP8Hc7GC1/G', 'florent.lema@sfr.fr', 0, 'data/pp/florenTE.jpg', 0, 'fr'),
(5, 'Doe', 'John', '$2y$10$b8C/q34XP2B3FcS4juyqxezDWsx/C0fB2CJbTNo8AkHJT2iX12Nmu', 'john.doe@example.com', 1, 'data/pp/default.png', 0, 'fr'),
(6, 'Doe', 'Patrick', 'password123', 'patrick.doe@example.com', 1, 'data/pp/patrick.jpeg', 1, 'en'),
(7, 'Debin', 'Antoine', 'motdepasse', 'antoine.debin@gmail.com', 0, 'data/pp/default.png', 1, 'fr'),
(8, 'de Kerdrel', 'Edouard', '$2y$10$kg7wVojs/z0eYNq4kOx0ReM4M0HOuycaW5kvunZvdLb7EUiBBU6HS', 'edouard@gmail.com', 1, 'data/pp/default.png', 1, 'fr'),
(9, 'Tadros', 'Arsany', '$2y$10$OvXawvFQQZIhErfttQZ7yOWHsb1CrqioqGRf2z63LZSzlhasWPNge', 'arsata@gmail.com', 0, 'data/pp/arsa.jpg', 0, 'fr'),
(10, 'Lema', 'Florent', 'motdepasse', 'florentfloflo330@gmail.com', 2, 'data/pp/default.png', NULL, NULL),
(13, 'ESSIMA', 'Remy', 'Aa123456', 'essimaglen@gmail.com', 2, 'data/pp/default.png', NULL, NULL),
(16, 'hert', 'ehr', 'motdepasse', 'florent.leeyrtma@sfr.fr', 2, 'data/pp/default.png', 0, 'fr'),
(17, 'gre', 'regz', 'mot', 'florent.lemahrs@sfr.fr', 2, 'data/pp/default.png', 0, 'fr'),
(24, 'kestane', 'evan', '7', 'arsatfrva@gmail.com', 2, 'data/pp/default.png', 0, 'fr'),
(25, 'Bergeron', 'Wandrille', 'a', 'moa@gmail.com', 0, 'data/pp/default.png', 0, 'fr'),
(33, 'arthur', 'arthur', 'A', 'arthur@gmail.com', 2, 'data/pp/default.png', 0, 'fr'),
(36, 'ayg', 'a', 'a', 'florent.leaaamaa@sfr.fr', 2, 'data/pp/default.png', 0, 'fr'),
(37, 'Einstein', 'Albert ', 'a', 'florent.lema@sfr.jhfh', 1, 'data/pp/default.png', 0, 'fr'),
(42, 'anselme', 'hugo', 'a', 'hugo@gmailcom', 1, 'data/pp/default.png', 0, 'fr'),
(43, 'lecompte', 'cleophee', 'a', 'cleo@gmail.com', 2, 'data/pp/default.png', 0, 'fr'),
(44, 'Praud', 'Pascal', 'a', 'florent.lemaaa@sfr.fr', 2, 'data/pp/default.png', 0, 'fr'),
(45, 'Lemaigre', 'Florent', '$2y$10$Nez5D2TAZQn2Ghn6Am4ql.ljNbDZah5N5Vfd7eLn719DeSSJXXn06', 'florent@gmail.com', 0, 'data/pp/default.png', 0, 'fr'),
(49, 'a', 'a', '$2y$10$wP/LFP.yZwLWQ9xVuRgfiO3RGo2PSJuxjxUeXAqA/kV9jCF6aVnDa', 'floaaarent.lema@sfr.fr', 2, 'data/pp/default.png', 0, 'fr'),
(50, 'a', 'a', '$2y$10$ABDT/zwtlxVKJasmWgtRA.Q0x7kzhC9Mi9zpn/lefUbA6sKxInBpy', 'a.lema@sfr.fr', 2, 'data/pp/default.png', 0, 'fr'),
(51, 'a', 'a', '$2y$10$tEL1OmYdP5ALXYBAksNQCeO/nh9YE9tXSjc2XD7dd2bRy0tjil.tO', 'florent.lezzma@sfr.fr', 2, 'data/pp/default.png', 0, 'fr');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Avis`
--
ALTER TABLE `Avis`
  ADD PRIMARY KEY (`idAvis`,`Concert_idConcert`,`Concert_Salle_idSalle`),
  ADD KEY `fk_Avis_User_idx` (`User_idUser`),
  ADD KEY `fk_Avis_Concert1_idx` (`Concert_idConcert`,`Concert_Salle_idSalle`);

--
-- Index pour la table `Capteur`
--
ALTER TABLE `Capteur`
  ADD PRIMARY KEY (`idCapteur`,`Salle_idSalle`),
  ADD KEY `fk_Capteur_Salle1_idx` (`Salle_idSalle`);

--
-- Index pour la table `CGU`
--
ALTER TABLE `CGU`
  ADD PRIMARY KEY (`idCGU`);

--
-- Index pour la table `Concert`
--
ALTER TABLE `Concert`
  ADD PRIMARY KEY (`idConcert`,`Salle_idSalle`),
  ADD KEY `fk_Concert_Salle1_idx` (`Salle_idSalle`),
  ADD KEY `fk_Concert_User1_idx` (`User_idUser`);

--
-- Index pour la table `Contacts`
--
ALTER TABLE `Contacts`
  ADD PRIMARY KEY (`idContacts`);

--
-- Index pour la table `FAQ`
--
ALTER TABLE `FAQ`
  ADD PRIMARY KEY (`idFAQ`);

--
-- Index pour la table `Mentions_legales`
--
ALTER TABLE `Mentions_legales`
  ADD PRIMARY KEY (`idMentions`);

--
-- Index pour la table `Mesure`
--
ALTER TABLE `Mesure`
  ADD PRIMARY KEY (`idMesure`),
  ADD KEY `fk_Mesure_Capteur1_idx` (`Capteur_idCapteur`);

--
-- Index pour la table `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`idQuestion`),
  ADD KEY `fk_Question_User1_idx` (`User_idUser`);

--
-- Index pour la table `Réponse`
--
ALTER TABLE `Réponse`
  ADD PRIMARY KEY (`idRéponse`,`Question_idQuestion`,`User_idUser`),
  ADD KEY `fk_Réponse_Question1_idx` (`Question_idQuestion`),
  ADD KEY `fk_Réponse_User1_idx` (`User_idUser`);

--
-- Index pour la table `Salle`
--
ALTER TABLE `Salle`
  ADD PRIMARY KEY (`idSalle`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Avis`
--
ALTER TABLE `Avis`
  MODIFY `idAvis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Capteur`
--
ALTER TABLE `Capteur`
  MODIFY `idCapteur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `CGU`
--
ALTER TABLE `CGU`
  MODIFY `idCGU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Concert`
--
ALTER TABLE `Concert`
  MODIFY `idConcert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Contacts`
--
ALTER TABLE `Contacts`
  MODIFY `idContacts` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `FAQ`
--
ALTER TABLE `FAQ`
  MODIFY `idFAQ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Mentions_legales`
--
ALTER TABLE `Mentions_legales`
  MODIFY `idMentions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Mesure`
--
ALTER TABLE `Mesure`
  MODIFY `idMesure` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Question`
--
ALTER TABLE `Question`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `Réponse`
--
ALTER TABLE `Réponse`
  MODIFY `idRéponse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `Salle`
--
ALTER TABLE `Salle`
  MODIFY `idSalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Avis`
--
ALTER TABLE `Avis`
  ADD CONSTRAINT `fk_Avis_Concert1` FOREIGN KEY (`Concert_idConcert`,`Concert_Salle_idSalle`) REFERENCES `Concert` (`idConcert`, `Salle_idSalle`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Avis_User` FOREIGN KEY (`User_idUser`) REFERENCES `User` (`idUser`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `Capteur`
--
ALTER TABLE `Capteur`
  ADD CONSTRAINT `fk_Capteur_Salle1` FOREIGN KEY (`Salle_idSalle`) REFERENCES `Salle` (`idSalle`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `Concert`
--
ALTER TABLE `Concert`
  ADD CONSTRAINT `fk_Concert_Salle1` FOREIGN KEY (`Salle_idSalle`) REFERENCES `Salle` (`idSalle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Concert_User1` FOREIGN KEY (`User_idUser`) REFERENCES `User` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Mesure`
--
ALTER TABLE `Mesure`
  ADD CONSTRAINT `fk_Mesure_Capteur1` FOREIGN KEY (`Capteur_idCapteur`) REFERENCES `Capteur` (`idCapteur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Question`
--
ALTER TABLE `Question`
  ADD CONSTRAINT `fk_Question_User1` FOREIGN KEY (`User_idUser`) REFERENCES `User` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Réponse`
--
ALTER TABLE `Réponse`
  ADD CONSTRAINT `fk_Réponse_Question1` FOREIGN KEY (`Question_idQuestion`) REFERENCES `Question` (`idQuestion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Réponse_User1` FOREIGN KEY (`User_idUser`) REFERENCES `User` (`idUser`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
