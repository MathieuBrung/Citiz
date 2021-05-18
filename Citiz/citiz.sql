-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 18 mai 2021 à 13:45
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `citiz`
--
CREATE DATABASE IF NOT EXISTS `citiz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `citiz`;

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

CREATE TABLE `booking` (
  `BookingId` int(11) NOT NULL,
  `BookingDate` date NOT NULL,
  `BookingMileage` int(6) NOT NULL,
  `BookingStartingDate` date NOT NULL,
  `BookingEndingDate` date NOT NULL,
  `BookingVehicleCondition` tinyint(1) NOT NULL,
  `BookingVehicleCleanliness` char(1) NOT NULL,
  `BookingPrice` int(11) DEFAULT NULL,
  `VehicleId` int(11) NOT NULL,
  `SubscriberId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `distance`
--

CREATE TABLE `distance` (
  `DistanceName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `distance`
--

INSERT INTO `distance` (`DistanceName`) VALUES
('<=100 km'),
('>100 km');

-- --------------------------------------------------------

--
-- Structure de la table `distance_price`
--

CREATE TABLE `distance_price` (
  `DPInf100Km` float NOT NULL,
  `DPSup100Km` float NOT NULL,
  `VCCode` char(5) NOT NULL,
  `DistanceName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `distance_price`
--

INSERT INTO `distance_price` (`DPInf100Km`, `DPSup100Km`, `VCCode`, `DistanceName`) VALUES
(0.37, 0, 'L', '<=100 km'),
(0.37, 0.19, 'L', '>100 km'),
(0.37, 0, 'M', '<=100 km'),
(0.37, 0.19, 'M', '>100 km'),
(0.37, 0, 'S', '<=100 km'),
(0.37, 0.19, 'S', '>100 km'),
(0.47, 0, 'XL', '<=100 km'),
(0.47, 0.24, 'XL', '>100 km'),
(0.47, 0, 'XXL', '<=100 km'),
(0.47, 0.24, 'XXL', '>100 km');

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `DocumentDirectoryPath` varchar(255) NOT NULL,
  `DocumentDriverLicense` tinyint(1) NOT NULL,
  `DocumentBankDetails` tinyint(1) NOT NULL,
  `DocumentProofOfAdress` tinyint(1) NOT NULL,
  `DocumentInsuranceSituation` tinyint(1) NOT NULL,
  `DocumentGuaranteeDeposit` tinyint(1) NOT NULL,
  `SubscriberId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `driver_license_information`
--

CREATE TABLE `driver_license_information` (
  `DLINumber` varchar(12) NOT NULL,
  `DLIObtainingPlace` varchar(255) NOT NULL,
  `DLIObtainingDate` date NOT NULL,
  `SubscriberId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `duration`
--

CREATE TABLE `duration` (
  `DurationName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `duration`
--

INSERT INTO `duration` (`DurationName`) VALUES
('1 heure'),
('24 heures'),
('7 jours');

-- --------------------------------------------------------

--
-- Structure de la table `duration_price`
--

CREATE TABLE `duration_price` (
  `DP` float NOT NULL,
  `FormulaName` varchar(50) NOT NULL,
  `VCCode` char(5) NOT NULL,
  `DurationName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `duration_price`
--

INSERT INTO `duration_price` (`DP`, `FormulaName`, `VCCode`, `DurationName`) VALUES
(4, 'Classique', 'L', '1 heure'),
(40, 'Classique', 'L', '24 heures'),
(220, 'Classique', 'L', '7 jours'),
(3.5, 'Classique', 'M', '1 heure'),
(35, 'Classique', 'M', '24 heures'),
(192, 'Classique', 'M', '7 jours'),
(3, 'Classique', 'S', '1 heure'),
(30, 'Classique', 'S', '24 heures'),
(165, 'Classique', 'S', '7 jours'),
(4.5, 'Classique', 'XL', '1 heure'),
(45, 'Classique', 'XL', '24 heures'),
(247, 'Classique', 'XL', '7 jours'),
(5, 'Classique', 'XXL', '1 heure'),
(50, 'Classique', 'XXL', '24 heures'),
(275, 'Classique', 'XXL', '7 jours'),
(3, 'Fréquence', 'L', '1 heure'),
(30, 'Fréquence', 'L', '24 heures'),
(165, 'Fréquence', 'L', '7 jours'),
(2.5, 'Fréquence', 'M', '1 heure'),
(25, 'Fréquence', 'M', '24 heures'),
(137, 'Fréquence', 'M', '7 jours'),
(2, 'Fréquence', 'S', '1 heure'),
(20, 'Fréquence', 'S', '24 heures'),
(110, 'Fréquence', 'S', '7 jours'),
(3.5, 'Fréquence', 'XL', '1 heure'),
(35, 'Fréquence', 'XL', '24 heures'),
(192, 'Fréquence', 'XL', '7 jours'),
(4, 'Fréquence', 'XXL', '1 heure'),
(40, 'Fréquence', 'XXL', '24 heures'),
(220, 'Fréquence', 'XXL', '7 jours'),
(5.5, 'Mini', 'L', '1 heure'),
(55, 'Mini', 'L', '24 heures'),
(275, 'Mini', 'L', '7 jours'),
(5, 'Mini', 'M', '1 heure'),
(50, 'Mini', 'M', '24 heures'),
(250, 'Mini', 'M', '7 jours'),
(4.5, 'Mini', 'S', '1 heure'),
(45, 'Mini', 'S', '24 heures'),
(225, 'Mini', 'S', '7 jours'),
(6, 'Mini', 'XL', '1 heure'),
(60, 'Mini', 'XL', '24 heures'),
(300, 'Mini', 'XL', '7 jours'),
(6.5, 'Mini', 'XXL', '1 heure'),
(65, 'Mini', 'XXL', '24 heures'),
(325, 'Mini', 'XXL', '7 jours');

-- --------------------------------------------------------

--
-- Structure de la table `formula`
--

CREATE TABLE `formula` (
  `FormulaName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formula`
--

INSERT INTO `formula` (`FormulaName`) VALUES
('Classique'),
('Fréquence'),
('Mini');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `InscriptionName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`InscriptionName`) VALUES
('Coopérative'),
('Standard');

-- --------------------------------------------------------

--
-- Structure de la table `near`
--

CREATE TABLE `near` (
  `SVId` int(11) NOT NULL,
  `TSName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `near`
--

INSERT INTO `near` (`SVId`, `TSName`) VALUES
(1, 'Terres Neuves'),
(2, 'Place du Palais'),
(3, 'CAPC'),
(4, 'Barrière Saint-Genès'),
(5, 'Thiers-Benauge'),
(6, 'Bergonié'),
(7, 'La Cité du Vin'),
(8, 'Barrière du Médoc'),
(9, 'Place Paul Doumer'),
(10, 'CAPC'),
(11, 'Jardin Botanique'),
(12, 'Grand Théâtre'),
(13, 'Mériadeck'),
(14, 'Gare Saint-Jean'),
(15, 'Belcier'),
(16, 'Hôtel de Police'),
(17, 'Berges du Lac'),
(18, 'Place de la Bourse'),
(19, 'Gare Saint-Jean'),
(20, 'Musée d\'Aquitaine'),
(21, 'Mériadeck'),
(22, 'Bergonié'),
(23, 'Hôpital Pellegrin'),
(24, 'Hôtel de Ville'),
(25, 'Camille Godard'),
(26, 'Porte de Bourgogne'),
(27, 'Quinconces'),
(28, 'Place Ravezies'),
(29, 'Sainte-Croix'),
(30, 'Stalingrad'),
(31, 'Quinconces'),
(32, 'Victoire'),
(33, 'Victoire'),
(34, 'Sainte-Catherine'),
(35, 'Ausone'),
(36, 'Cenon Gare'),
(37, 'Mérignac Centre'),
(38, 'Pessac Centre'),
(39, 'Forum'),
(40, 'Peixotto'),
(41, 'Barrière Saint-Genès');

-- --------------------------------------------------------

--
-- Structure de la table `parking`
--

CREATE TABLE `parking` (
  `ParkingId` int(11) NOT NULL,
  `ParkingAdress` varchar(50) NOT NULL,
  `ParkingSpacesNumber` int(10) NOT NULL,
  `SVId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `parking`
--

INSERT INTO `parking` (`ParkingId`, `ParkingAdress`, `ParkingSpacesNumber`, `SVId`) VALUES
(1, '20 Quai des Chartrons', 2, 10),
(2, '38 Rue Edmond Michelet', 1, 13),
(3, '32 Rue Claude Bonnier', 3, 21),
(4, '17 Place Pey Berland', 3, 24),
(5, '31 Allées de Chartres', 4, 27),
(6, '10 Place de la Victoire', 1, 33),
(7, '7 Place de la Ferme Richemont', 5, 34);

-- --------------------------------------------------------

--
-- Structure de la table `payment_information`
--

CREATE TABLE `payment_information` (
  `PIId` int(11) NOT NULL,
  `PIIBAN` varchar(27) NOT NULL,
  `PIBIC` varchar(11) NOT NULL,
  `PIHolderLastName` varchar(50) NOT NULL,
  `PIHolderFirstName` varchar(50) NOT NULL,
  `PIBankName` varchar(255) NOT NULL,
  `SubscriberId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `payment_mode`
--

CREATE TABLE `payment_mode` (
  `PMCode` char(3) NOT NULL,
  `PMName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `payment_mode`
--

INSERT INTO `payment_mode` (`PMCode`, `PMName`) VALUES
('CB', 'Carte bleue'),
('PP', 'PayPal'),
('VIR', 'Virement');

-- --------------------------------------------------------

--
-- Structure de la table `road`
--

CREATE TABLE `road` (
  `RoadId` int(11) NOT NULL,
  `RoadAdress` varchar(50) NOT NULL,
  `RoadSpacesNumber` int(10) NOT NULL,
  `SVId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `road`
--

INSERT INTO `road` (`RoadId`, `RoadAdress`, `RoadSpacesNumber`, `SVId`) VALUES
(1, '25 Rue Robert Schuman', 2, 1),
(2, '6 Cours d\'Alsace-et-Lorraine', 2, 2),
(3, '9 Cours Xavier Arnozan', 2, 3),
(4, '1 Rue de Ségur', 1, 4),
(5, '235 Rue de la Benauge', 2, 5),
(6, '164 Cours de l\'Argonne', 3, 6),
(7, '77 Quai de Bacalan', 2, 7),
(8, '14 Avenue Carnot', 3, 8),
(9, '11 Place du Marché Chartrons', 2, 9),
(10, '86 Quai des Queyries', 2, 11),
(11, '16 Cours Georges Clemenceau', 2, 12),
(12, '4 Rue Saint-Vincent-de-Paul', 2, 14),
(13, '31 Rue Sarrette', 2, 15),
(14, '145 Rue Général de Larminat', 3, 16),
(15, '29 Cours de Québec', 1, 17),
(16, '2 Place Jean Jaurès', 2, 18),
(17, '90 Rue Malbec', 2, 19),
(18, '14 Cours Pasteur', 2, 20),
(19, '222 Cours de l\'Yser', 2, 22),
(20, '6 Rue de Canolle', 2, 23),
(21, '69 Rue Borie', 2, 25),
(22, '11 Cours Victor Hugo', 2, 26),
(23, '4 Allée de Boutaut', 2, 28),
(24, '2bis Rue des Étables', 3, 29),
(25, '1 Allée Serr', 2, 30),
(26, '1 Rue Huguerie', 3, 31),
(27, '68 Rue Henri IV', 2, 32),
(28, '5 Allée de la Salamandre', 5, 35),
(29, '71 Avenue Jean Jaurès', 1, 36),
(30, '21 Avenue du Maréchal Leclerc', 2, 37),
(31, '27 Avenue Eugène et Marc Dulout', 3, 38),
(32, '310 Cours de la Libération', 2, 39),
(33, '15 Rue du Professeur Arnozan', 1, 40),
(34, '72 Rue Victor Hugo', 1, 41);

-- --------------------------------------------------------

--
-- Structure de la table `serve`
--

CREATE TABLE `serve` (
  `TLCode` varchar(5) NOT NULL,
  `TSName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `serve`
--

INSERT INTO `serve` (`TLCode`, `TSName`) VALUES
('A', 'Alfred de Vigny'),
('A', 'Bois Fleuri'),
('A', 'Buttinière'),
('A', 'Carnot-Mairie de Cenon'),
('A', 'Carriet'),
('A', 'Cenon Gare'),
('A', 'Floirac Dravemont'),
('A', 'Fontaine d\'Arlac'),
('A', 'François Mitterrand'),
('A', 'Frères Robinson'),
('A', 'Galin'),
('A', 'Gaviniès'),
('A', 'Gravières'),
('A', 'Hôpital Pellegrin'),
('A', 'Hôtel de Police'),
('A', 'Hôtel de Ville'),
('A', 'Hôtel de ville de Mérignac'),
('A', 'Iris'),
('A', 'Jardin Botanique'),
('A', 'Jean Jaurès'),
('A', 'Jean Zay'),
('A', 'Lauriers'),
('A', 'La Gardette Bassens Carbon Blanc'),
('A', 'La Marègue'),
('A', 'La Morlette'),
('A', 'Les Pins'),
('A', 'Le Haillan Rostand'),
('A', 'Lycées de Mérignac'),
('A', 'Mairie de Lormont'),
('A', 'Mériadeck'),
('A', 'Mérignac Centre'),
('A', 'Palais de Justice'),
('A', 'Palmer'),
('A', 'Pelletan'),
('A', 'Peychotte'),
('A', 'Pierre Mendès France'),
('A', 'Pin Galant'),
('A', 'Place du Palais'),
('A', 'Porte de Bourgogne'),
('A', 'Quatre Chemins'),
('A', 'Saint-Augustin'),
('A', 'Sainte-Catherine'),
('A', 'St-Bruno - Hôtel de Région'),
('A', 'Stade Chaban Delmas'),
('A', 'Stalingrad'),
('A', 'Thiers-Benauge'),
('B', 'Arts et Métiers'),
('B', 'Barrière Saint-Genès'),
('B', 'Berges de la Garonne'),
('B', 'Bergonié'),
('B', 'Béthanie'),
('B', 'Bougnard'),
('B', 'Brandenburg'),
('B', 'Camponac Médiathèque'),
('B', 'CAPC'),
('B', 'Cap Métiers'),
('B', 'Chartrons'),
('B', 'Châtaigneraie'),
('B', 'Claveau'),
('B', 'Cours du Médoc'),
('B', 'Doyen Brus'),
('B', 'Forum'),
('B', 'François Bordes'),
('B', 'Gambetta - MADD'),
('B', 'Gare Pessac Alouette'),
('B', 'Grand Théâtre'),
('B', 'Hôpital Haut-Lévêque'),
('B', 'Hôtel de Ville'),
('B', 'La Cité du Vin'),
('B', 'Les Hangars'),
('B', 'Montaigne-Montesquieu'),
('B', 'Musée d\'Aquitaine'),
('B', 'New York'),
('B', 'Peixotto'),
('B', 'Pessac France Alouette'),
('B', 'Pessac Centre'),
('B', 'Quinconces'),
('B', 'Roustaing'),
('B', 'Rue Achard'),
('B', 'Saige'),
('B', 'Saint-Nicolas'),
('B', 'Unitec'),
('B', 'Victoire'),
('C', 'Ausone'),
('C', 'Belcier'),
('C', 'Berges du Lac'),
('C', 'Calais Centujean'),
('C', 'Camille Godard'),
('C', 'Carle Vernet'),
('C', 'Cracovie'),
('C', 'Émile Counord'),
('C', 'Frankton'),
('C', 'Gare de Bègles'),
('C', 'Gare de Blanquefort'),
('C', 'Gare de Bruges'),
('C', 'Gare Saint-Jean'),
('C', 'Grand Parc'),
('C', 'Jardin Public'),
('C', 'La Belle Rose'),
('C', 'La Vache'),
('C', 'Les Aubiers'),
('C', 'Lycée Václav Havel'),
('C', 'Palais des Congrès'),
('C', 'Parc des expostions - Stade Matmut Atlantique'),
('C', 'Parc de Mussonville'),
('C', 'Place de la Bourse'),
('C', 'Place Paul Doumer'),
('C', 'Place Ravezies'),
('C', 'Porte de Bourgogne'),
('C', 'Quarante Journaux'),
('C', 'Quinconces'),
('C', 'Saint-Michel'),
('C', 'Sainte-Croix'),
('C', 'Stade Musard'),
('C', 'Tauzia'),
('C', 'Terres Neuves'),
('C', 'Villenave Centre - Pont de la Maye'),
('C', 'Villenave Pyrénées'),
('D', 'Barrière du Médoc'),
('D', 'Belcier'),
('D', 'Calypso'),
('D', 'Cantinolle'),
('D', 'Carle Vernet'),
('D', 'Champ de courses-Treulon'),
('D', 'Courbet'),
('D', 'Croix de Seguey'),
('D', 'Eysines Centre'),
('D', 'Fondaudège Muséum'),
('D', 'Gare Saint-Jean'),
('D', 'Hippodrome'),
('D', 'Les Écus'),
('D', 'Les Sources'),
('D', 'Mairie du Bouscat'),
('D', 'Picot'),
('D', 'Place de la Bourse'),
('D', 'Porte de Bourgogne'),
('D', 'Quinconces'),
('D', 'Saint-Michel'),
('D', 'Sainte-Croix'),
('D', 'Sainte-Germaine'),
('D', 'Simone Veil'),
('D', 'Tauzia');

-- --------------------------------------------------------

--
-- Structure de la table `station_vehicle`
--

CREATE TABLE `station_vehicle` (
  `SVId` int(11) NOT NULL,
  `SVCity` varchar(50) NOT NULL,
  `SVPlace` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `station_vehicle`
--

INSERT INTO `station_vehicle` (`SVId`, `SVCity`, `SVPlace`) VALUES
(1, 'Bègles', 'Terres-Neuves'),
(2, 'Bordeaux', 'Alsace-Lorraine (Agence Citiz)'),
(3, 'Bordeaux', 'Arnozan'),
(4, 'Bordeaux', 'Barrière de Pessac (Ségur)'),
(5, 'Bordeaux', 'Benauge'),
(6, 'Bordeaux', 'Bergonié'),
(7, 'Bordeaux', 'Cap Sciences'),
(8, 'Bordeaux', 'Carnot (Parc Bordelais)'),
(9, 'Bordeaux', 'Chartrons'),
(10, 'Bordeaux', 'Cité Mondiale (METPARK-Parcub)'),
(11, 'Bordeaux', 'Darwin'),
(12, 'Bordeaux', 'Gambetta (Clémenceau)'),
(13, 'Bordeaux', 'Gambetta (METPARK-Parcub)'),
(14, 'Bordeaux', 'Gare Saint-Jean'),
(15, 'Bordeaux', 'Gare-Belcier'),
(16, 'Bordeaux', 'Gavinies'),
(17, 'Bordeaux', 'Ginko'),
(18, 'Bordeaux', 'Jean-Jaurès'),
(19, 'Bordeaux', 'Malbec'),
(20, 'Bordeaux', 'Musée d\'Aquitaine'),
(21, 'Bordeaux', 'Mériadeck (METPARK-Parcub)'),
(22, 'Bordeaux', 'Nansouty (Yser)'),
(23, 'Bordeaux', 'Pellegrin'),
(24, 'Bordeaux', 'Pey-Berland (METPARK-Parcub St Christoly)'),
(25, 'Bordeaux', 'Picard'),
(26, 'Bordeaux', 'Porte de Bourgogne'),
(27, 'Bordeaux', 'Quinconces Parc des Allées de Chartres (METPARK-Parcub)'),
(28, 'Bordeaux', 'Ravezies'),
(29, 'Bordeaux', 'Sainte-Croix (Étables)'),
(30, 'Bordeaux', 'Stalingrad (Serr)'),
(31, 'Bordeaux', 'Tourny (Huguerie)'),
(32, 'Bordeaux', 'Victoire (Henri IV)'),
(33, 'Bordeaux', 'Victoire (METPARK-Parcub)'),
(34, 'Bordeaux', 'Victor-Hugo (METPARK-Parcub)'),
(35, 'Bruges', 'Ausone Imagin'),
(36, 'Cenon', 'Gare de Cenon'),
(37, 'Mérignac', 'Mérignac Centre'),
(38, 'Pessac', 'Gare de Pessac'),
(39, 'Talence', 'Forum'),
(40, 'Talence', 'Mairie de Talence'),
(41, 'Talence', 'Rue Victor Hugo');

-- --------------------------------------------------------

--
-- Structure de la table `subscriber`
--

CREATE TABLE `subscriber` (
  `SubscriberId` int(11) NOT NULL,
  `SubscriberDateOfBirth` date NOT NULL,
  `SubscriberGender` varchar(5) NOT NULL,
  `SubscriberStreet` varchar(100) NOT NULL,
  `SubscriberAdressDetails` varchar(255) NOT NULL,
  `SubscriberCity` varchar(100) NOT NULL,
  `SubscriberPostalCode` varchar(5) NOT NULL,
  `PMCode` char(3) NOT NULL,
  `InscriptionName` varchar(50) NOT NULL,
  `FormulaName` varchar(50) NOT NULL,
  `UserEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `subscription_price`
--

CREATE TABLE `subscription_price` (
  `SPMonthly` float NOT NULL,
  `SPMembership` float NOT NULL,
  `SPGuaranteeDeposit` float NOT NULL,
  `SPSocialPart` float NOT NULL,
  `FormulaName` varchar(50) NOT NULL,
  `InscriptionName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `subscription_price`
--

INSERT INTO `subscription_price` (`SPMonthly`, `SPMembership`, `SPGuaranteeDeposit`, `SPSocialPart`, `FormulaName`, `InscriptionName`) VALUES
(4, 0, 0, 500, 'Classique', 'Coopérative'),
(8, 40, 150, 0, 'Classique', 'Standard'),
(8, 0, 0, 500, 'Fréquence', 'Coopérative'),
(16, 40, 150, 0, 'Fréquence', 'Standard'),
(0, 0, 0, 500, 'Mini', 'Coopérative'),
(0, 40, 150, 0, 'Mini', 'Standard');

-- --------------------------------------------------------

--
-- Structure de la table `tram_line`
--

CREATE TABLE `tram_line` (
  `TLCode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tram_line`
--

INSERT INTO `tram_line` (`TLCode`) VALUES
('A'),
('B'),
('C'),
('D');

-- --------------------------------------------------------

--
-- Structure de la table `tram_stop`
--

CREATE TABLE `tram_stop` (
  `TSName` varchar(50) NOT NULL,
  `TSCity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tram_stop`
--

INSERT INTO `tram_stop` (`TSName`, `TSCity`) VALUES
('Alfred de Vigny', 'Mérignac'),
('Arts et Métiers', 'Talence'),
('Ausone', 'Bruges'),
('Barrière du Médoc', 'Bordeaux'),
('Barrière Saint-Genès', 'Bordeaux'),
('Belcier', 'Bordeaux'),
('Berges de la Garonne', 'Bordeaux'),
('Berges du Lac', 'Bordeaux'),
('Bergonié', 'Bordeaux'),
('Béthanie', 'Talence'),
('Bois Fleuri', 'Lormont'),
('Bougnard', 'Pessac'),
('Brandenburg', 'Bordeaux'),
('Buttinière', 'Cenon'),
('Calais Centujean', 'Bègles'),
('Calypso', 'Bordeaux'),
('Camille Godard', 'Bordeaux'),
('Camponac Médiathèque', 'Pessac'),
('Cantinolle', 'Eysines'),
('CAPC', 'Bordeaux'),
('Cap Métiers', 'Pessac'),
('Carle Vernet', 'Bordeaux'),
('Carnot-Mairie de Cenon', 'Cenon'),
('Carriet', 'Lormont'),
('Cenon Gare', 'Cenon'),
('Champ de courses-Treulon', 'Le Bouscat'),
('Chartrons', 'Bordeaux'),
('Châtaigneraie', 'Pessac'),
('Claveau', 'Bordeaux'),
('Courbet', 'Bordeaux'),
('Cours du Médoc', 'Bordeaux'),
('Cracovie', 'Bordeaux'),
('Croix de Seguey', 'Bordeaux'),
('Doyen Brus', 'Pessac'),
('Émile Counord', 'Bordeaux'),
('Eysines Centre', 'Eysines'),
('Floirac Dravemont', 'Floirac'),
('Fondaudège Muséum', 'Bordeaux'),
('Fontaine d\'Arlac', 'Mérignac'),
('Forum', 'Talence'),
('François Bordes', 'Pessac'),
('François Mitterrand', 'Mérignac'),
('Frankton', 'Blanquefort'),
('Frères Robinson', 'Mérignac'),
('Galin', 'Bordeaux'),
('Gambetta - MADD', 'Bordeaux'),
('Gare de Bègles', 'Bègles'),
('Gare de Blanquefort', 'Blanquefort'),
('Gare de Bruges', 'Bruges'),
('Gare Pessac Alouette', 'Pessac'),
('Gare Saint-Jean', 'Bordeaux'),
('Gaviniès', 'Bordeaux'),
('Grand Parc', 'Bordeaux'),
('Grand Théâtre', 'Bordeaux'),
('Gravières', 'Lormont'),
('Hippodrome', 'Eysines'),
('Hôpital Haut-Lévêque', 'Pessac'),
('Hôpital Pellegrin', 'Bordeaux'),
('Hôtel de Police', 'Bordeaux'),
('Hôtel de Ville', 'Bordeaux'),
('Hôtel de ville de Mérignac', 'Mérignac'),
('Iris', 'Lormont'),
('Jardin Botanique', 'Bordeaux'),
('Jardin Public', 'Bordeaux'),
('Jean Jaurès', 'Cenon'),
('Jean Zay', 'Cenon'),
('Lauriers', 'Lormont'),
('La Belle Rose', 'Bègles'),
('La Cité du Vin', 'Bordeaux'),
('La Gardette Bassens Carbon Blanc', 'Lormont'),
('La Marègue', 'Cenon'),
('La Morlette', 'Cenon'),
('La Vache', 'Bruges'),
('Les Aubiers', 'Bordeaux'),
('Les Écus', 'Le Bouscat'),
('Les Hangars', 'Bordeaux'),
('Les Pins', 'Mérignac'),
('Les Sources', 'Eysines'),
('Le Haillan Rostand', 'Mérignac'),
('Lycées de Mérignac', 'Mérignac'),
('Lycée Václav Havel', 'Bègles'),
('Mairie de Lormont', 'Lormont'),
('Mairie du Bouscat', 'Le Bouscat'),
('Mériadeck', 'Bordeaux'),
('Mérignac Centre', 'Mérignac'),
('Montaigne-Montesquieu', 'Pessac'),
('Musée d\'Aquitaine', 'Bordeaux'),
('New York', 'Bordeaux'),
('Palais des Congrès', 'Bordeaux'),
('Palais de Justice', 'Bordeaux'),
('Palmer', 'Cenon'),
('Parc des expostions - Stade Matmut Atlantique', 'Bordeaux'),
('Parc de Mussonville', 'Bègles'),
('Peixotto', 'Talence'),
('Pelletan', 'Cenon'),
('Pessac France Alouette', 'Pessac'),
('Pessac Centre', 'Pessac'),
('Peychotte', 'Mérignac'),
('Picot', 'Eysines'),
('Pierre Mendès France', 'Mérignac'),
('Pin Galant', 'Mérignac'),
('Place de la Bourse', 'Bordeaux'),
('Place du Palais', 'Bordeaux'),
('Place Paul Doumer', 'Bordeaux'),
('Place Ravezies', 'Bordeaux'),
('Porte de Bourgogne', 'Bordeaux'),
('Quarante Journaux', 'Bordeaux'),
('Quatre Chemins', 'Mérignac'),
('Quinconces', 'Bordeaux'),
('Roustaing', 'Talence'),
('Rue Achard', 'Bordeaux'),
('Saige', 'Pessac'),
('Saint-Augustin', 'Bordeaux'),
('Saint-Michel', 'Bordeaux'),
('Saint-Nicolas', 'Bordeaux'),
('Sainte-Catherine', 'Bordeaux'),
('Sainte-Croix', 'Bordeaux'),
('Sainte-Germaine', 'Le Bouscat'),
('Simone Veil', 'Eysines'),
('St-Bruno - Hôtel de Région', 'Bordeaux'),
('Stade Chaban Delmas', 'Bordeaux'),
('Stade Musard', 'Bègles'),
('Stalingrad', 'Bordeaux'),
('Tauzia', 'Bordeaux'),
('Terres Neuves', 'Bègles'),
('Thiers-Benauge', 'Bordeaux'),
('Unitec', 'Pessac'),
('Victoire', 'Bordeaux'),
('Villenave Centre - Pont de la Maye', 'Villenave d\'Ornon'),
('Villenave Pyrénées', 'Villenave d\'Ornon');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `UserEmail` varchar(100) NOT NULL,
  `UserLastName` varchar(50) NOT NULL,
  `UserFirstName` varchar(50) NOT NULL,
  `UserPhoneNumber` varchar(12) NOT NULL,
  `UserPassword` varchar(255) NOT NULL,
  `UTCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`UserEmail`, `UserLastName`, `UserFirstName`, `UserPhoneNumber`, `UserPassword`, `UTCode`) VALUES
('abonne@gmail.com', 'Abonne', 'Abonne', '', 'f14258cb168c8e0446da542ed7818d49', 4),
('epreuvee4@gmail.com', 'Epreuve', 'Réussi', '', '3e922bd9dce4c4a193c66478dd1220ef', 4),
('manager@gmail.com', 'Manager', 'Manager', '', '0fb3045d0abab8f5fe94d3bd2a5e0658', 4),
('secretaire@gmail.com', 'Secretaire', 'Secretaire', '', 'd96c5b5896796682bba91ba3f0249f31', 4);

-- --------------------------------------------------------

--
-- Structure de la table `user_type`
--

CREATE TABLE `user_type` (
  `UTCode` int(11) NOT NULL,
  `UTName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_type`
--

INSERT INTO `user_type` (`UTCode`, `UTName`) VALUES
(1, 'Abonné'),
(2, 'Secrétaire'),
(3, 'Responsable'),
(4, 'Utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `vehicle`
--

CREATE TABLE `vehicle` (
  `VehicleId` int(11) NOT NULL,
  `VehicleRegistration` varchar(9) NOT NULL,
  `VehicleMileage` int(6) NOT NULL,
  `VSName` varchar(25) NOT NULL,
  `VCCode` char(5) NOT NULL,
  `SVId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vehicle`
--

INSERT INTO `vehicle` (`VehicleId`, `VehicleRegistration`, `VehicleMileage`, `VSName`, `VCCode`, `SVId`) VALUES
(1, 'LY-848-JY', 29327, 'Disponible', 'M', 1),
(2, 'SP-819-AD', 14817, 'Indisponible', 'M', 1),
(3, 'IX-770-DY', 17566, 'Disponible', 'M', 2),
(4, 'YJ-901-FV', 20445, 'Maintenance', 'XL', 2),
(5, 'JO-136-JE', 27429, 'Disponible', 'M', 3),
(6, 'QI-231-BD', 24618, 'Disponible', 'L', 3),
(7, 'NM-302-PD', 26279, 'Disponible', 'M', 4),
(8, 'KI-389-AD', 15496, 'Disponible', 'M', 5),
(9, 'ZG-939-LW', 13134, 'Disponible', 'L', 5),
(10, 'AJ-957-OV', 5662, 'Disponible', 'M', 6),
(11, 'KZ-883-JG', 10234, 'Disponible', 'L', 6),
(12, 'GH-883-YF', 18908, 'Disponible', 'XXL', 6),
(13, 'HU-843-WO', 10753, 'Disponible', 'M', 7),
(14, 'OI-377-DT', 21480, 'Disponible', 'XL', 7),
(15, 'PX-685-MY', 7193, 'Indisponible', 'S', 8),
(16, 'FS-301-AH', 12365, 'Maintenance', 'M', 8),
(17, 'DB-488-CQ', 15587, 'Disponible', 'XL', 8),
(18, 'LZ-570-DE', 12074, 'Disponible', 'M', 9),
(19, 'WN-605-RQ', 22796, 'Disponible', 'M', 9),
(20, 'FO-203-FN', 26521, 'Disponible', 'S', 10),
(21, 'UO-677-CP', 24889, 'Disponible', 'M', 10),
(22, 'ME-819-KL', 26063, 'Disponible', 'M', 11),
(23, 'FE-237-JJ', 15870, 'Disponible', 'M', 11),
(24, 'ZN-014-GR', 15408, 'Disponible', 'M', 12),
(25, 'AI-624-BL', 13889, 'Disponible', 'L', 12),
(26, 'ES-547-IH', 5672, 'Disponible', 'L', 13),
(27, 'WK-864-EW', 25977, 'Disponible', 'M', 14),
(28, 'NN-651-DF', 23421, 'Disponible', 'L', 14),
(29, 'YD-161-MC', 22756, 'Disponible', 'M', 15),
(30, 'ND-748-CE', 6819, 'Disponible', 'L', 15),
(31, 'RS-639-JD', 6465, 'Disponible', 'S', 16),
(32, 'QY-529-PU', 8782, 'Disponible', 'M', 16),
(33, 'HE-493-AJ', 25071, 'Disponible', 'L', 16),
(34, 'BK-569-JZ', 20784, 'Disponible', 'M', 17),
(35, 'HK-161-VZ', 9972, 'Disponible', 'M', 18),
(36, 'AB-688-TB', 15291, 'Disponible', 'L', 18),
(37, 'NX-950-QA', 10670, 'Disponible', 'M', 19),
(38, 'EP-147-SX', 6042, 'Disponible', 'L', 19),
(39, 'MM-379-MY', 21116, 'Disponible', 'S', 20),
(40, 'GK-114-AZ', 14260, 'Disponible', 'M', 20),
(41, 'GC-364-IG', 27195, 'Disponible', 'M', 21),
(42, 'FZ-795-PD', 6686, 'Disponible', 'M', 21),
(43, 'SF-556-PL', 9880, 'Disponible', 'XL', 21),
(44, 'YI-058-GG', 23593, 'Disponible', 'S', 22),
(45, 'RF-988-VL', 25520, 'Disponible', 'M', 22),
(46, 'MZ-266-LD', 6259, 'Disponible', 'S', 23),
(47, 'YF-503-CT', 15476, 'Disponible', 'L', 23),
(48, 'HK-321-GT', 23873, 'Disponible', 'S', 24),
(49, 'KI-874-ZL', 29949, 'Disponible', 'M', 24),
(50, 'YW-491-PU', 9247, 'Disponible', 'M', 24),
(51, 'FM-020-WO', 14187, 'Disponible', 'S', 25),
(52, 'FD-015-RY', 18567, 'Disponible', 'L', 25),
(53, 'WY-083-VD', 22976, 'Disponible', 'M', 26),
(54, 'DJ-733-TG', 13124, 'Disponible', 'L', 26),
(55, 'DQ-246-PI', 17015, 'Disponible', 'S', 27),
(56, 'VM-571-VN', 8187, 'Disponible', 'M', 27),
(57, 'II-445-YN', 29886, 'Disponible', 'M', 27),
(58, 'RZ-081-DV', 23683, 'Disponible', 'L', 27),
(59, 'BZ-824-GI', 14900, 'Disponible', 'S', 28),
(60, 'QT-715-MJ', 14999, 'Disponible', 'M', 28),
(61, 'GZ-853-FG', 14642, 'Disponible', 'M', 29),
(62, 'CZ-910-MR', 28968, 'Disponible', 'L', 29),
(63, 'FF-628-TM', 24413, 'Disponible', 'L', 29),
(64, 'QQ-612-AP', 6212, 'Disponible', 'M', 30),
(65, 'WV-883-DU', 20440, 'Disponible', 'XL', 30),
(66, 'IG-235-AV', 6174, 'Disponible', 'M', 31),
(67, 'KQ-427-DY', 13407, 'Disponible', 'M', 31),
(68, 'SD-758-AG', 6171, 'Disponible', 'L', 31),
(69, 'CD-903-QH', 26520, 'Disponible', 'M', 32),
(70, 'LG-708-YF', 15328, 'Disponible', 'L', 32),
(71, 'AD-946-CS', 21465, 'Disponible', 'M', 33),
(72, 'LR-989-PE', 22465, 'Disponible', 'S', 34),
(73, 'VQ-886-TO', 14440, 'Disponible', 'M', 34),
(74, 'JJ-948-AJ', 23420, 'Disponible', 'M', 34),
(75, 'QH-110-FE', 10498, 'Disponible', 'M', 34),
(76, 'TQ-504-FG', 11993, 'Disponible', 'M', 34),
(77, 'WD-510-ZF', 10815, 'Disponible', 'S', 35),
(78, 'CM-175-IH', 9522, 'Disponible', 'M', 35),
(79, 'JX-866-LT', 7062, 'Disponible', 'M', 35),
(80, 'ZT-858-LV', 13189, 'Disponible', 'L', 35),
(81, 'NB-035-IV', 13091, 'Disponible', 'XL', 35),
(82, 'EB-582-YX', 24360, 'Disponible', 'M', 36),
(83, 'JO-846-JR', 28551, 'Disponible', 'S', 37),
(84, 'VL-311-KK', 8502, 'Disponible', 'M', 37),
(85, 'QY-610-AU', 11025, 'Disponible', 'S', 38),
(86, 'MD-688-NI', 5885, 'Disponible', 'M', 38),
(87, 'GC-549-RU', 12099, 'Disponible', 'L', 38),
(88, 'IJ-721-IG', 22892, 'Disponible', 'M', 39),
(89, 'UY-393-SG', 24927, 'Disponible', 'XL', 39),
(90, 'SP-769-YR', 21339, 'Disponible', 'S', 40),
(91, 'KZ-086-NJ', 15584, 'Disponible', 'M', 41);

-- --------------------------------------------------------

--
-- Structure de la table `vehicle_category`
--

CREATE TABLE `vehicle_category` (
  `VCCode` char(5) NOT NULL,
  `VCName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vehicle_category`
--

INSERT INTO `vehicle_category` (`VCCode`, `VCName`) VALUES
('L', 'Spacieuses'),
('M', 'Polyvalentes'),
('S', 'Citadines'),
('XL', 'Monospaces'),
('XXL', 'Minibus');

-- --------------------------------------------------------

--
-- Structure de la table `vehicle_status`
--

CREATE TABLE `vehicle_status` (
  `VSName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vehicle_status`
--

INSERT INTO `vehicle_status` (`VSName`) VALUES
('Disponible'),
('Indisponible'),
('Maintenance');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingId`),
  ADD KEY `SubscriberId` (`SubscriberId`),
  ADD KEY `VehicleId` (`VehicleId`);

--
-- Index pour la table `distance`
--
ALTER TABLE `distance`
  ADD PRIMARY KEY (`DistanceName`);

--
-- Index pour la table `distance_price`
--
ALTER TABLE `distance_price`
  ADD PRIMARY KEY (`VCCode`,`DistanceName`),
  ADD KEY `DistanceName` (`DistanceName`);

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`DocumentDirectoryPath`),
  ADD KEY `SubscriberId` (`SubscriberId`);

--
-- Index pour la table `driver_license_information`
--
ALTER TABLE `driver_license_information`
  ADD PRIMARY KEY (`DLINumber`),
  ADD KEY `SubscriberId` (`SubscriberId`);

--
-- Index pour la table `duration`
--
ALTER TABLE `duration`
  ADD PRIMARY KEY (`DurationName`);

--
-- Index pour la table `duration_price`
--
ALTER TABLE `duration_price`
  ADD PRIMARY KEY (`FormulaName`,`VCCode`,`DurationName`),
  ADD KEY `VCCode` (`VCCode`),
  ADD KEY `DurationName` (`DurationName`);

--
-- Index pour la table `formula`
--
ALTER TABLE `formula`
  ADD PRIMARY KEY (`FormulaName`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`InscriptionName`);

--
-- Index pour la table `near`
--
ALTER TABLE `near`
  ADD PRIMARY KEY (`SVId`,`TSName`),
  ADD KEY `TSName` (`TSName`);

--
-- Index pour la table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`ParkingId`),
  ADD KEY `SVId` (`SVId`);

--
-- Index pour la table `payment_information`
--
ALTER TABLE `payment_information`
  ADD PRIMARY KEY (`PIId`),
  ADD KEY `SubscriberId` (`SubscriberId`);

--
-- Index pour la table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD PRIMARY KEY (`PMCode`);

--
-- Index pour la table `road`
--
ALTER TABLE `road`
  ADD PRIMARY KEY (`RoadId`),
  ADD KEY `SVId` (`SVId`);

--
-- Index pour la table `serve`
--
ALTER TABLE `serve`
  ADD PRIMARY KEY (`TLCode`,`TSName`),
  ADD KEY `TSName` (`TSName`);

--
-- Index pour la table `station_vehicle`
--
ALTER TABLE `station_vehicle`
  ADD PRIMARY KEY (`SVId`);

--
-- Index pour la table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`SubscriberId`),
  ADD KEY `PMCode` (`PMCode`),
  ADD KEY `FormulaName` (`FormulaName`),
  ADD KEY `UserEmail` (`UserEmail`),
  ADD KEY `InscriptionName` (`InscriptionName`);

--
-- Index pour la table `subscription_price`
--
ALTER TABLE `subscription_price`
  ADD PRIMARY KEY (`FormulaName`,`InscriptionName`),
  ADD KEY `InscriptionName` (`InscriptionName`);

--
-- Index pour la table `tram_line`
--
ALTER TABLE `tram_line`
  ADD PRIMARY KEY (`TLCode`);

--
-- Index pour la table `tram_stop`
--
ALTER TABLE `tram_stop`
  ADD PRIMARY KEY (`TSName`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserEmail`),
  ADD KEY `UTCode` (`UTCode`);

--
-- Index pour la table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`UTCode`);

--
-- Index pour la table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`VehicleId`),
  ADD KEY `VSName` (`VSName`),
  ADD KEY `VCCode` (`VCCode`),
  ADD KEY `SVId` (`SVId`);

--
-- Index pour la table `vehicle_category`
--
ALTER TABLE `vehicle_category`
  ADD PRIMARY KEY (`VCCode`);

--
-- Index pour la table `vehicle_status`
--
ALTER TABLE `vehicle_status`
  ADD PRIMARY KEY (`VSName`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `parking`
--
ALTER TABLE `parking`
  MODIFY `ParkingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `payment_information`
--
ALTER TABLE `payment_information`
  MODIFY `PIId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `road`
--
ALTER TABLE `road`
  MODIFY `RoadId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `station_vehicle`
--
ALTER TABLE `station_vehicle`
  MODIFY `SVId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `SubscriberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `UTCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `VehicleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`SubscriberId`) REFERENCES `subscriber` (`SubscriberId`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`VehicleId`) REFERENCES `vehicle` (`VehicleId`);

--
-- Contraintes pour la table `distance_price`
--
ALTER TABLE `distance_price`
  ADD CONSTRAINT `distance_price_ibfk_1` FOREIGN KEY (`VCCode`) REFERENCES `vehicle_category` (`VCCode`),
  ADD CONSTRAINT `distance_price_ibfk_2` FOREIGN KEY (`DistanceName`) REFERENCES `distance` (`DistanceName`);

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`SubscriberId`) REFERENCES `subscriber` (`SubscriberId`);

--
-- Contraintes pour la table `driver_license_information`
--
ALTER TABLE `driver_license_information`
  ADD CONSTRAINT `driver_license_information_ibfk_1` FOREIGN KEY (`SubscriberId`) REFERENCES `subscriber` (`SubscriberId`);

--
-- Contraintes pour la table `duration_price`
--
ALTER TABLE `duration_price`
  ADD CONSTRAINT `duration_price_ibfk_1` FOREIGN KEY (`FormulaName`) REFERENCES `formula` (`FormulaName`),
  ADD CONSTRAINT `duration_price_ibfk_2` FOREIGN KEY (`VCCode`) REFERENCES `vehicle_category` (`VCCode`),
  ADD CONSTRAINT `duration_price_ibfk_3` FOREIGN KEY (`DurationName`) REFERENCES `duration` (`DurationName`);

--
-- Contraintes pour la table `near`
--
ALTER TABLE `near`
  ADD CONSTRAINT `near_ibfk_1` FOREIGN KEY (`SVId`) REFERENCES `station_vehicle` (`SVId`),
  ADD CONSTRAINT `near_ibfk_2` FOREIGN KEY (`TSName`) REFERENCES `tram_stop` (`TSName`);

--
-- Contraintes pour la table `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `parking_ibfk_1` FOREIGN KEY (`SVId`) REFERENCES `station_vehicle` (`SVId`);

--
-- Contraintes pour la table `payment_information`
--
ALTER TABLE `payment_information`
  ADD CONSTRAINT `payment_information_ibfk_1` FOREIGN KEY (`SubscriberId`) REFERENCES `subscriber` (`SubscriberId`);

--
-- Contraintes pour la table `road`
--
ALTER TABLE `road`
  ADD CONSTRAINT `road_ibfk_1` FOREIGN KEY (`SVId`) REFERENCES `station_vehicle` (`SVId`);

--
-- Contraintes pour la table `serve`
--
ALTER TABLE `serve`
  ADD CONSTRAINT `serve_ibfk_1` FOREIGN KEY (`TLCode`) REFERENCES `tram_line` (`TLCode`),
  ADD CONSTRAINT `serve_ibfk_2` FOREIGN KEY (`TSName`) REFERENCES `tram_stop` (`TSName`);

--
-- Contraintes pour la table `subscriber`
--
ALTER TABLE `subscriber`
  ADD CONSTRAINT `subscriber_ibfk_1` FOREIGN KEY (`PMCode`) REFERENCES `payment_mode` (`PMCode`),
  ADD CONSTRAINT `subscriber_ibfk_2` FOREIGN KEY (`FormulaName`) REFERENCES `formula` (`FormulaName`),
  ADD CONSTRAINT `subscriber_ibfk_3` FOREIGN KEY (`UserEmail`) REFERENCES `user` (`UserEmail`),
  ADD CONSTRAINT `subscriber_ibfk_4` FOREIGN KEY (`InscriptionName`) REFERENCES `inscription` (`InscriptionName`);

--
-- Contraintes pour la table `subscription_price`
--
ALTER TABLE `subscription_price`
  ADD CONSTRAINT `subscription_price_ibfk_1` FOREIGN KEY (`FormulaName`) REFERENCES `formula` (`FormulaName`),
  ADD CONSTRAINT `subscription_price_ibfk_2` FOREIGN KEY (`InscriptionName`) REFERENCES `inscription` (`InscriptionName`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`UTCode`) REFERENCES `user_type` (`UTCode`);

--
-- Contraintes pour la table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`VSName`) REFERENCES `vehicle_status` (`VSName`),
  ADD CONSTRAINT `vehicle_ibfk_2` FOREIGN KEY (`VCCode`) REFERENCES `vehicle_category` (`VCCode`),
  ADD CONSTRAINT `vehicle_ibfk_3` FOREIGN KEY (`SVId`) REFERENCES `station_vehicle` (`SVId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
