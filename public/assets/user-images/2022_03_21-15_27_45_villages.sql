-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 18 mars 2022 à 17:24
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mamairie`
--

-- --------------------------------------------------------

--
-- Structure de la table `villages`
--

DROP TABLE IF EXISTS `villages`;
CREATE TABLE IF NOT EXISTS `villages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `arrondissement` varchar(20) DEFAULT NULL,
  `quartier` varchar(31) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=166 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `villages`
--

INSERT INTO `villages` (`id`, `arrondissement`, `quartier`) VALUES
(1, '1er Arrondissement', 'Avotrou Aïmonlonfidé'),
(2, '1er Arrondissement', 'Avotrou Gbègo'),
(3, '1er Arrondissement', 'Avotrou Houézèkomè'),
(4, '1er Arrondissement', 'Dandji'),
(5, '1er Arrondissement', 'Dandji Hokanmè'),
(6, '1er Arrondissement', 'Donaten'),
(7, '1er Arrondissement', 'Finagnon'),
(8, '1er Arrondissement', 'N’vènamèdé'),
(9, '1er Arrondissement', 'Suru Léré'),
(10, '1er Arrondissement', 'Tanto'),
(11, '1er Arrondissement', 'Tchanhounkpamè'),
(12, '1er Arrondissement', 'Tokplégbé'),
(13, '1er Arrondissement', 'Yagbé'),
(14, '2ème Arrondissement', 'Ahouassa'),
(15, '2ème Arrondissement', 'Djèdjè-Layé'),
(16, '2ème Arrondissement', 'Gankpodo'),
(17, '2ème Arrondissement', 'Irédé'),
(18, '2ème Arrondissement', 'Kowégbo'),
(19, '2ème Arrondissement', 'Kpondéhou'),
(20, '2ème Arrondissement', 'Kpondéhou Tchémè'),
(21, '2ème Arrondissement', 'Lom-Nava'),
(22, '2ème Arrondissement', 'Minontchou'),
(23, '2ème Arrondissement', 'Sènandé'),
(24, '2ème Arrondissement', 'Sènadé Sékou'),
(25, '2ème Arrondissement', 'Yénawa'),
(26, '2ème Arrondissement', 'Yénawa Daho'),
(27, '3ème Arrondissement', 'Adjégounlè'),
(28, '3ème Arrondissement', 'Adogléta'),
(29, '3ème Arrondissement', 'Agbato'),
(30, '3ème Arrondissement', 'Agbodjèdo'),
(31, '3ème Arrondissement', 'Ayélawadjè'),
(32, '3ème Arrondissement', 'Ayélawadjè Agongomè'),
(33, '3ème Arrondissement', 'Fifatin'),
(34, '3ème Arrondissement', 'Gbénonkpo'),
(35, '3ème Arrondissement', 'Hlacomey'),
(36, '3ème Arrondissement', 'Kpankpan'),
(37, '3ème Arrondissement', 'Midombo'),
(38, '3ème Arrondissement', 'Sègbèya Nord'),
(39, '3ème Arrondissement', 'Sègbèya Sud'),
(40, '4ème Arrondissement', 'Abokicodji Centre'),
(41, '4ème Arrondissement', 'Abokicodji Lagune'),
(42, '4ème Arrondissement', 'Akpakpa Dodomè'),
(43, '4ème Arrondissement', 'Dédokpo'),
(44, '4ème Arrondissement', 'Enagnon'),
(45, '4ème Arrondissement', 'Fifadji Houto'),
(46, '4ème Arrondissement', 'Gbèdjèwin'),
(47, '4ème Arrondissement', 'Missessin'),
(48, '4ème Arrondissement', 'Ohe'),
(49, '4ème Arrondissement', 'Sodjèatinmè Centre'),
(50, '4ème Arrondissement', 'Sodjèatinmè Est'),
(51, '4ème Arrondissement', 'Sodjèatinmè Ouest'),
(52, '5ème Arrondissement', 'Avlékété Jonquet'),
(53, '5ème Arrondissement', 'Bocossi Tokpa'),
(54, '5ème Arrondissement', 'Dota'),
(55, '5ème Arrondissement', 'Gbédokpo'),
(56, '5ème Arrondissement', 'Gbéto'),
(57, '5ème Arrondissement', 'Guinkomey'),
(58, '5ème Arrondissement', 'Mifongou'),
(59, '5ème Arrondissement', 'Missèbo'),
(60, '5ème Arrondissement', 'Missité'),
(61, '5ème Arrondissement', 'Nouveau Pont'),
(62, '5ème Arrondissement', 'Tokpa Hoho'),
(63, '5ème Arrondissement', 'Xwlacodji Kpodji'),
(64, '5ème Arrondissement', 'Xwlacodji Plage'),
(65, '5ème Arrondissement', 'Zongo Ehuzu'),
(66, '5ème Arrondissement', 'Zongo Nima'),
(67, '6ème Arrondissement', 'Ahouansori Agata'),
(68, '6ème Arrondissement', 'Ahouansori Agué'),
(69, '6ème Arrondissement', 'Ahouansori Ladji'),
(70, '6ème Arrondissement', 'Ahouansori Towéta'),
(71, '6ème Arrondissement', 'Ahouansori Towéta Kpota'),
(72, '6ème Arrondissement', 'Aidjèdo'),
(73, '6ème Arrondissement', 'Aidjèdo Ahito'),
(74, '6ème Arrondissement', 'Aidjèdo Gbègo'),
(75, '6ème Arrondissement', 'Aidjèdo Vignon'),
(76, '6ème Arrondissement', 'Dantokpa'),
(77, '6ème Arrondissement', 'Djidjè'),
(78, '6ème Arrondissement', 'Djidjè Aïchédji'),
(79, '6ème Arrondissement', 'Gbèdjromèdé'),
(80, '6ème Arrondissement', 'Gbèdjromèdé Sud'),
(81, '6ème Arrondissement', 'Hindé Nord'),
(82, '6ème Arrondissement', 'Hindé Sud'),
(83, '6ème Arrondissement', 'Jéricho Nord'),
(84, '6ème Arrondissement', 'Jéricho Sud'),
(85, '6ème Arrondissement', 'Vossa'),
(86, '7ème Arrondissement', 'Dagbédji-Sikê'),
(87, '7ème Arrondissement', 'Enagnon-Sikê'),
(88, '7ème Arrondissement', 'Fignon-Sikê'),
(89, '7ème Arrondissement', 'Gbèdomidji'),
(90, '7ème Arrondissement', 'Gbènan'),
(91, '7ème Arrondissement', 'Missité-Sikê'),
(92, '7ème Arrondissement', 'Sèdami'),
(93, '7ème Arrondissement', 'Sèdjro Saint Michel'),
(94, '7ème Arrondissement', 'Sèhogan-Sikê'),
(95, '7ème Arrondissement', 'Todoté'),
(96, '7ème Arrondissement', 'Yévèdo'),
(97, '8ème Arrondissement', 'Agbodjèdo Ste Rita'),
(98, '8ème Arrondissement', 'Agontinkon'),
(99, '8ème Arrondissement', 'Gbèdagba'),
(100, '8ème Arrondissement', 'Houéhoun'),
(101, '8ème Arrondissement', 'Houénoussou Ste Rita'),
(102, '8ème Arrondissement', 'Mèdédjro'),
(103, '8ème Arrondissement', 'Minonkpo Wologuèdè'),
(104, '8ème Arrondissement', 'Tonato'),
(105, '9ème Arrondissement', 'Fifadji'),
(106, '9ème Arrondissement', 'Kindonou'),
(107, '9ème Arrondissement', 'Mènontin'),
(108, '9ème Arrondissement', 'Vossa-Kpodji'),
(109, '9ème Arrondissement', 'Zogbo'),
(110, '9ème Arrondissement', 'Zogbohouè'),
(111, '10ème Arrondissement', 'Agounvocodji'),
(112, '10ème Arrondissement', 'Gbénonkpo'),
(113, '10ème Arrondissement', 'Kouhounou'),
(114, '10ème Arrondissement', 'Midédji'),
(115, '10ème Arrondissement', 'Missèkplé'),
(116, '10ème Arrondissement', 'Missogbé'),
(117, '10ème Arrondissement', 'Sètovi'),
(118, '10ème Arrondissement', 'Vèdoko'),
(119, '10ème Arrondissement', 'Yénawa-Fifadji'),
(120, '11ème Arrondissement', 'Gbèdiga Guêdêhoungue'),
(121, '11ème Arrondissement', 'Gbégamey Ahito'),
(122, '11ème Arrondissement', 'Gbégamey Centre'),
(123, '11ème Arrondissement', 'Gbégamey Dodo Ayidjè'),
(124, '11ème Arrondissement', 'Gbégamey Gbagoudo'),
(125, '11ème Arrondissement', 'Gbégamey Mifongou'),
(126, '11ème Arrondissement', 'Houéyiho'),
(127, '11ème Arrondissement', 'Houéyiho Tanou'),
(128, '11ème Arrondissement', 'Saint Jean Gbèdiga'),
(129, '11ème Arrondissement', 'Vodjè Allobatin'),
(130, '11ème Arrondissement', 'Vodjè Ayidoté'),
(131, '11ème Arrondissement', 'Vodjè Centre'),
(132, '11ème Arrondissement', 'Vodjè Finagnon'),
(133, '12ème Arrondissement', 'Ahouanlèko'),
(134, '12ème Arrondissement', 'Aibatin dodo'),
(135, '12ème Arrondissement', 'Akogbato'),
(136, '12ème Arrondissement', 'Cadjèhoun Agonga'),
(137, '12ème Arrondissement', 'Cadjèhoun Aupiais'),
(138, '12ème Arrondissement', 'Cadjèhoun Azalokogon'),
(139, '12ème Arrondissement', 'Cadjèhoun Détinsa'),
(140, '12ème Arrondissement', 'Cadjèhoun Gare'),
(141, '12ème Arrondissement', 'Cadjèhoun Kpota'),
(142, '12ème Arrondissement', 'Fidjrossè Centre'),
(143, '12ème Arrondissement', 'Fidjrossè Kpota'),
(144, '12ème Arrondissement', 'Fiyégnon Houta'),
(145, '12ème Arrondissement', 'Fiyégnon Jacquot'),
(146, '12ème Arrondissement', 'Gbodjètin'),
(147, '12ème Arrondissement', 'Haie Vive'),
(148, '12ème Arrondissement', 'Hlazounto'),
(149, '12ème Arrondissement', 'Les Cocotiers'),
(150, '12ème Arrondissement', 'Vodjè kpota'),
(151, '12ème Arrondissement', 'Yémicodji'),
(152, '13ème Arrondissement', 'Adjaha- Cité'),
(153, '13ème Arrondissement', 'Agla-Agongbomey'),
(154, '13ème Arrondissement', 'Agla-Akplomey'),
(155, '13ème Arrondissement', 'Agla-Figaro'),
(156, '13ème Arrondissement', 'Agla-Finafa'),
(157, '13ème Arrondissement', 'Agla-les Pylônes'),
(158, '13ème Arrondissement', 'Agla-Petit Château'),
(159, '13ème Arrondissement', 'Agla-Sud'),
(160, '13ème Arrondissement', 'Ahogbohouè-Cité de l’expérience'),
(161, '13ème Arrondissement', 'Ahogbohouè-Cité Eucaristie'),
(162, '13ème Arrondissement', 'Aibatin Kpota'),
(163, '13ème Arrondissement', 'Gbèdégbé'),
(164, '13ème Arrondissement', 'Houénoussou'),
(165, '13ème Arrondissement', 'Missité');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
