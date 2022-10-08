-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 30 jan. 2022 à 08:17
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_tdw`
--

-- --------------------------------------------------------

--
-- Structure de la table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `admin_id` int(11) NOT NULL,
  `adminname` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adminlogin`
--

INSERT INTO `adminlogin` (`admin_id`, `adminname`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `Id_annonce` int(20) NOT NULL,
  `User_id` int(20) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL,
  `Start` int(10) NOT NULL,
  `End` int(10) NOT NULL,
  `Type` int(11) NOT NULL,
  `Weight` int(11) NOT NULL,
  `Volume` int(11) NOT NULL,
  `Transport` int(11) NOT NULL,
  `Views` int(11) NOT NULL DEFAULT 0,
  `Price` double NOT NULL,
  `guarantee` tinyint(1) NOT NULL,
  `etat` varchar(10) NOT NULL DEFAULT 'non_valide'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`Id_annonce`, `User_id`, `Title`, `Description`, `image`, `Start`, `End`, `Type`, `Weight`, `Volume`, `Transport`, `Views`, `Price`, `guarantee`, `etat`) VALUES
(1, 24, '3 Paquets de taille moyenne dans une car', 'Salam, je liverer mes paquets avec le minnimum de prix possible.', '../assets/img/an2.jpg', 2, 5, 2, 2, 2, 1, 27570, 3320, 1, 'valide'),
(2, 24, '3 Paquets de taille moyenne dans une car', 'Prefer your coffee black? Then you probably like dark, bitter chocolate, according to new research identifying a genetic basis for those preferences. If that\'s you, then congratulations -- you are the lucky genetic winner of a trait that may offer you a boost toward good health, according to caffeine researcher Marilyn Cornelis.', '../assets/img/an1.jpg', 2, 5, 1, 2, 2, 1, 27516, 3320, 1, 'valide'),
(3, 24, '3 Paquets de taille moyenne dans une car', 'Salam, je liverer mes paquets avec le minnimum de prix possible.', '../assets/img/an3.jpg', 2, 5, 2, 2, 2, 2, 27672, 3320, 1, 'non_valide'),
(4, 24, '3 Paquets de taille moyenne dans une car', 'Salam, je liverer mes paquets avec le minnimum de prix possible.', '../assets/img/an4.jpg', 2, 5, 2, 2, 2, 1, 27514, 3320, 1, 'non_valide'),
(5, 24, '3 Paquets de taille moyenne dans une car', 'Salam, je liverer mes paquets avec le minnimum de prix possible.', '../assets/img/an5.jpg', 2, 5, 2, 2, 2, 1, 27516, 3320, 1, 'affecte'),
(6, 24, '3 Paquets de taille moyenne dans une car', 'Salam, je liverer mes paquets avec le minnimum de prix possible.', '../assets/img/an6.jpg', 2, 5, 2, 2, 2, 1, 27512, 3320, 1, 'affecte'),
(7, 24, '3 Paquets de taille moyenne dans une car', 'Salam, je liverer mes paquets avec le minnimum de prix possible.', '../assets/img/an7.jpg', 2, 5, 2, 2, 2, 1, 27522, 3320, 1, 'valide'),
(8, 27, '3 Paquets de taille moyenne dans une car', 'Salam, je liverer mes paquets avec le minnimum de prix possible.', '../assets/img/an8.jpg', 2, 5, 2, 2, 2, 1, 27512, 3320, 1, 'valide'),
(30, 27, 'Lettre', 'dfbvn sdfv  dsfvjlsdfkvnskdf vnd fvj sdflv lsdfn svkfv ksdf ', '../assets/imgenveloppe.jpg', 1, 16, 1, 1, 1, 1, 8, 13462, 1, 'non_valide');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `Id_contact` int(11) NOT NULL,
  `location` varchar(80) NOT NULL,
  `phone` int(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `link_fb` varchar(50) NOT NULL,
  `link_link` varchar(50) NOT NULL,
  `link_twit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`Id_contact`, `location`, `phone`, `mail`, `link_fb`, `link_link`, `link_twit`) VALUES
(1, 'VTC livraison, Alger, 16029 Birkhadem', 23939132, 'vtc_contact@vtc-company.dz', 'www.facebook.com', 'www.linkedin.com', 'www.twitter.com');

-- --------------------------------------------------------

--
-- Structure de la table `copyrights`
--

CREATE TABLE `copyrights` (
  `Copyrights` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `copyrights`
--

INSERT INTO `copyrights` (`Copyrights`) VALUES
('© 2022 VTC. All rights reserved.');

-- --------------------------------------------------------

--
-- Structure de la table `diaporama`
--

CREATE TABLE `diaporama` (
  `Id_image` int(11) NOT NULL,
  `Src` varchar(100) NOT NULL,
  `Link` varchar(100) NOT NULL DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `diaporama`
--

INSERT INTO `diaporama` (`Id_image`, `Src`, `Link`) VALUES
(1, '../assets/img/image1.jpg', 'https://talents.esi.dz/scolar/index'),
(2, '../assets/img/image2.jpg', 'https://talents.esi.dz/scolar/index'),
(3, '../assets/img/image3.jpg', 'https://talents.esi.dz/scolar/index'),
(4, '../assets/img/image4.jpg', 'https://talents.esi.dz/scolar/index');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `Id_item_menu` int(20) NOT NULL,
  `Nom_item_menu` varchar(100) NOT NULL,
  `Link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`Id_item_menu`, `Nom_item_menu`, `Link`) VALUES
(1, 'Accueil', 'accueil.php'),
(2, 'Présentation', 'presentation.php'),
(3, 'News', 'news.php'),
(4, 'Inscription', 'inscription.php'),
(5, 'Statistique', 'statistics.php'),
(6, 'Contact', 'contact.php');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `Id_message` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`Id_message`, `name`, `email`, `message`, `date`) VALUES
(1, 'Wail', 'ia_srairi@esi.dz', 'Je veux envoyer un message', '2022-01-30');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `Id` int(11) NOT NULL,
  `Image` varchar(30) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` varchar(10000) NOT NULL,
  `Date` date DEFAULT NULL,
  `Views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`Id`, `Image`, `Title`, `Description`, `Date`, `Views`) VALUES
(1, '../assets/img/news1.jpg', 'A fan of black coffee and dark chocolate? It\'s in your genes, a new study says', 'Prefer your coffee black? Then you probably like dark, bitter chocolate, according to new research identifying a genetic basis for those preferences.\r\n      If that\'s you, then congratulations -- you are the lucky genetic winner of a trait that may offer you a boost toward good health, according to caffeine researcher Marilyn Cornelis, an associate professor of preventive medicine at Northwestern University Feinberg School of Medicine.\r\n      \"I tell people my cup of tea is coffee research,\" Cornelis said. \"It\'s a hot topic.\"\r\n      Why hot? Because studies find moderate amounts of black coffee -- between 3 and 5 cups daily -- has been shown to lower the risk of certain diseases, including Parkinson\'s, heart diseases, Type 2 diabetes and several types of cancer.\r\n      But those benefits are likely to be more pronounced if the coffee is free of all of the milks, sugars and other fattening flavorings we tend to add.\r\n      \"We know there\'s growing evidence suggesting there\'s a beneficial impact of coffee consumption on health. But reading between the lines, anyone advising someone to consume coffee would typically advise them to consume black coffee due to the difference between consuming black coffee and coffee with milk and sugar,\" Cornelis said.\r\n      \"One is naturally calorie free. The second can add possibly hundreds of calories to your coffee, and the health benefits could be quite different,\" she added.', '2022-01-28', 5484),
(3, '../assets/img/news2.jpg', 'Sergio Mattarella: At 80, Italy president re-elected on amid successor rows', 'Italian President Sergio Mattarella has agreed to serve a second term after coalition parties failed to agree on a compromise candidate for the office.\r\nThe 80 year old emerged as the most popular choice after six days of often tense voting in Rome.\r\nHe had expressed a desire to leave office, but local media reported Prime Minister Mario Draghi had convinced him to stay for the stability of Italy.\r\nHe was formally reelected on Saturday, following an eighth round of voting.\r\nSpeaking after Saturday evenings vote, Mr Mattarella that he felt a sense of responsibility to remain in office in light of the health and economic challenges facing the country.\r\nThe former Constitutional Court judge added that duty to the nation must prevail over my own personal choices.', '2022-01-30', 1);

-- --------------------------------------------------------

--
-- Structure de la table `presentation`
--

CREATE TABLE `presentation` (
  `Id_presentation` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Description` longtext NOT NULL,
  `Image` varchar(30) NOT NULL,
  `Video` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `presentation`
--

INSERT INTO `presentation` (`Id_presentation`, `Title`, `Description`, `Image`, `Video`) VALUES
(1, 'Comment cela fonctionne', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non odit illo iusto voluptatum voluptas inventore dolor, labore temporibus ratione tempora eos deserunt voluptates corrupti culpa! Repellat nobis sed sit quasi! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa officiis deleniti perferendis natus, fuga tenetur sint ducimus reiciendis sapiente, distinctio aspernatur ipsam ex illum architecto sunt sit? Animi, ea nostrum!Loremm', '../assets/img/presentation.jpg', '../assets/img/video.mp4');

-- --------------------------------------------------------

--
-- Structure de la table `states`
--

CREATE TABLE `states` (
  `Id_state` int(11) NOT NULL,
  `State` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `states`
--

INSERT INTO `states` (`Id_state`, `State`) VALUES
(1, 'Non_certifié'),
(2, 'En_Attente'),
(3, 'Certifié');

-- --------------------------------------------------------

--
-- Structure de la table `statistics`
--

CREATE TABLE `statistics` (
  `Users_number` int(11) NOT NULL,
  `Annonce_number` int(11) NOT NULL,
  `Transaction_number` int(11) NOT NULL,
  `Vsitor_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statistics`
--

INSERT INTO `statistics` (`Users_number`, `Annonce_number`, `Transaction_number`, `Vsitor_number`) VALUES
(502487, 235888, 212025, 50222498);

-- --------------------------------------------------------

--
-- Structure de la table `titre_page`
--

CREATE TABLE `titre_page` (
  `Id_titre` int(11) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `Titre_page` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `titre_page`
--

INSERT INTO `titre_page` (`Id_titre`, `Role`, `Titre_page`) VALUES
(1, 'Accueil', 'VTC - Meilleur expérience'),
(2, 'Presentation', 'Découvrir comment le site se fonctionne..!'),
(3, 'News', 'tous les nouveautés..!'),
(4, 'Inscription', 'Soyez un de nous..!'),
(5, 'Statistique', 'Statistique'),
(6, 'Contact', 'Contactez nous..!');

-- --------------------------------------------------------

--
-- Structure de la table `transport`
--

CREATE TABLE `transport` (
  `Id_transport` int(11) NOT NULL,
  `Transport` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `transport`
--

INSERT INTO `transport` (`Id_transport`, `Transport`) VALUES
(1, 'Camion'),
(2, 'Voiture'),
(3, 'Fourgon'),
(4, 'Avion');

-- --------------------------------------------------------

--
-- Structure de la table `transp_wilaya`
--

CREATE TABLE `transp_wilaya` (
  `Id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Wilaya_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `transp_wilaya`
--

INSERT INTO `transp_wilaya` (`Id`, `User_id`, `Wilaya_id`) VALUES
(1, 0, 1),
(2, 0, 5),
(3, 0, 1),
(4, 0, 5),
(5, 0, 1),
(6, 0, 5),
(7, 9, 1),
(8, 9, 5),
(9, 10, 1),
(10, 10, 4),
(11, 11, 5),
(12, 11, 3),
(13, 16, 3),
(14, 16, 1),
(15, 16, 7),
(16, 20, 1),
(17, 21, 1),
(18, 21, 3),
(19, 22, 1),
(20, 22, 3),
(21, 23, 1),
(22, 23, 4),
(23, 23, 7);

-- --------------------------------------------------------

--
-- Structure de la table `type_transport`
--

CREATE TABLE `type_transport` (
  `Id_type` int(11) NOT NULL,
  `Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_transport`
--

INSERT INTO `type_transport` (`Id_type`, `Type`) VALUES
(1, 'Lettre'),
(2, 'Colis'),
(3, 'Meuble'),
(4, 'Electroménager'),
(5, 'Déménagement');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `Id_user` int(20) NOT NULL,
  `Role` varchar(10) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Adress` varchar(40) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Certification` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Id_user`, `Role`, `First_Name`, `Last_Name`, `Phone`, `Adress`, `Email`, `Password`, `Certification`) VALUES
(11, 'transporte', 'Moussa', 'Khan', '+213552698745', 'ESi', 'im_oukerimi@esi.dz', 'dxfgf', 1),
(15, 'transporte', 'Ilyas', 'Khan', '0552279875', 'sdvgsd', 'ga_mazrou@esi.dz', 'llikjhui', 2),
(16, 'transporte', 'Moussa', 'Oukerimi', '+213552698745', 'ESI', 'im_oukerimi@esi.dz', 'kiolkiuj,', 1),
(20, 'transporte', 'stik', 'taw', '2547896325', 'bouraoui', 'bouraoui@gmail.com', 'bouraouibest', 1),
(21, 'transporte', 'test2', 'test', '578523168', 'jholvks', 'jhdg@gmail.com', 'jkfbdvln', 1),
(22, 'transporte', 'test2', 'test', '578523168', 'jholvks', 'jhdg@gmail.com', 'jkfbdvln', 3),
(23, 'transporte', 'Moussa', 'Moussa', '257365276', 'kjhfgklv:nmj', 'jhvf@gmail.com', 'jhvf@gmail.com', 1),
(24, 'client', 'Lamouri', 'Nabil', '+213552459632', 'ESI-Labo', 'n_lamouri@esi.dz', 'n_lamouri@esi.dz', NULL),
(27, 'client', 'Chibane', 'Ahmed', '0551458799', 'Cité Rabia B2', 'a_chibane@gmail.com', 'a_chibane', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `volume`
--

CREATE TABLE `volume` (
  `Id_volume` int(11) NOT NULL,
  `Volume` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `volume`
--

INSERT INTO `volume` (`Id_volume`, `Volume`) VALUES
(1, '0 - 100 cm'),
(2, '100 - 1000 cm'),
(3, '1 - 5 m'),
(4, '5 - 15 m'),
(5, '15 - 50 m'),
(6, '+50 m');

-- --------------------------------------------------------

--
-- Structure de la table `weights`
--

CREATE TABLE `weights` (
  `Id_type` int(11) NOT NULL,
  `Weight` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `weights`
--

INSERT INTO `weights` (`Id_type`, `Weight`) VALUES
(1, '0 - 100 gr'),
(2, '100 - 1000 gr'),
(3, '1 - 5 kg'),
(4, '5 - 10 kg'),
(5, '+ 10 kg');

-- --------------------------------------------------------

--
-- Structure de la table `wilayas`
--

CREATE TABLE `wilayas` (
  `id` int(10) NOT NULL,
  `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `wilayas`
--

INSERT INTO `wilayas` (`id`, `code`, `nom`) VALUES
(1, '01', 'Adrar'),
(2, '02', 'Chlef'),
(3, '03', 'Laghouat'),
(4, '04', 'Oum El Bouaghi'),
(5, '05', 'Batna'),
(6, '06', 'Béjaïa'),
(7, '07', 'Biskra'),
(8, '08', 'Béchar'),
(9, '09', 'Blida'),
(10, '10', 'Bouira'),
(11, '11', 'Tamanrasset'),
(12, '12', 'Tébessa'),
(13, '13', 'Tlemcen'),
(14, '14', 'Tiaret'),
(15, '15', 'Tizi Ouzou'),
(16, '16', 'Alger'),
(17, '17', 'Djelfa'),
(18, '18', 'Jijel'),
(19, '19', 'Sétif'),
(20, '20', 'Saïda'),
(21, '21', 'Skikda'),
(22, '22', 'Sidi Bel Abbès'),
(23, '23', 'Annaba'),
(24, '24', 'Guelma'),
(25, '25', 'Constantine'),
(26, '26', 'Médéa'),
(27, '27', 'Mostaganem'),
(28, '28', 'M\'Sila'),
(29, '29', 'Mascara'),
(30, '30', 'Ouargla'),
(31, '31', 'Oran'),
(32, '32', 'El Bayadh'),
(33, '33', 'Illizi'),
(34, '34', 'Bordj Bou Arreridj'),
(35, '35', 'Boumerdès'),
(36, '36', 'El Tarf'),
(37, '37', 'Tindouf'),
(38, '38', 'Tissemsilt'),
(39, '39', 'El Oued'),
(40, '40', 'Khenchela'),
(41, '41', 'Souk Ahras'),
(42, '42', 'Tipaza'),
(43, '43', 'Mila'),
(44, '44', 'Aïn Defla'),
(45, '45', 'Naâma'),
(46, '46', 'Aïn Témouchent'),
(47, '47', 'Ghardaïa'),
(48, '48', 'Relizane');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`Id_annonce`),
  ADD KEY `annonce_weight` (`Weight`),
  ADD KEY `depart_annonce` (`Start`),
  ADD KEY `arrive_annonce` (`End`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Id_contact`);

--
-- Index pour la table `diaporama`
--
ALTER TABLE `diaporama`
  ADD PRIMARY KEY (`Id_image`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Id_item_menu`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`Id_message`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `presentation`
--
ALTER TABLE `presentation`
  ADD PRIMARY KEY (`Id_presentation`);

--
-- Index pour la table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`Id_state`);

--
-- Index pour la table `titre_page`
--
ALTER TABLE `titre_page`
  ADD PRIMARY KEY (`Id_titre`);

--
-- Index pour la table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`Id_transport`);

--
-- Index pour la table `transp_wilaya`
--
ALTER TABLE `transp_wilaya`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `type_transport`
--
ALTER TABLE `type_transport`
  ADD PRIMARY KEY (`Id_type`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id_user`),
  ADD KEY `certification_state` (`Certification`);

--
-- Index pour la table `volume`
--
ALTER TABLE `volume`
  ADD PRIMARY KEY (`Id_volume`);

--
-- Index pour la table `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`Id_type`);

--
-- Index pour la table `wilayas`
--
ALTER TABLE `wilayas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `Id_annonce` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `Id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `diaporama`
--
ALTER TABLE `diaporama`
  MODIFY `Id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `Id_item_menu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `Id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `Id_presentation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `states`
--
ALTER TABLE `states`
  MODIFY `Id_state` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `titre_page`
--
ALTER TABLE `titre_page`
  MODIFY `Id_titre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `transport`
--
ALTER TABLE `transport`
  MODIFY `Id_transport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `transp_wilaya`
--
ALTER TABLE `transp_wilaya`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `type_transport`
--
ALTER TABLE `type_transport`
  MODIFY `Id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `Id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `volume`
--
ALTER TABLE `volume`
  MODIFY `Id_volume` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `weights`
--
ALTER TABLE `weights`
  MODIFY `Id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `wilayas`
--
ALTER TABLE `wilayas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `certification_state` FOREIGN KEY (`Certification`) REFERENCES `states` (`Id_state`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
