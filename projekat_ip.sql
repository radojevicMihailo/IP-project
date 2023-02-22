-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2023 at 07:29 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekat_ip`
--

-- --------------------------------------------------------

--
-- Table structure for table `administratori`
--

DROP TABLE IF EXISTS `administratori`;
CREATE TABLE IF NOT EXISTS `administratori` (
  `korisnicko_ime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`korisnicko_ime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `administratori`
--

INSERT INTO `administratori` (`korisnicko_ime`, `lozinka`) VALUES
('mihailo', 'Mih@ilo00$');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
CREATE TABLE IF NOT EXISTS `korisnici` (
  `ime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `korisnicko_ime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `slika` text COLLATE utf8_unicode_ci,
  `tip_korisnika` tinyint(4) NOT NULL,
  `lozinka_privremena` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lozinka_trajanje` time DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`korisnicko_ime`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`ime`, `prezime`, `korisnicko_ime`, `lozinka`, `telefon`, `email`, `slika`, `tip_korisnika`, `lozinka_privremena`, `lozinka_trajanje`, `status`) VALUES
('Ana', 'Anic', 'ana_anic', 'Anaa123#', '0641248164', 'ana.anic@gmail.com', 'ana_misic.png', 0, NULL, NULL, 2),
('Djoka', 'Djokic', 'djoka_djokic', 'Djoka123#', '0641445664', 'djoka.djokic@gmail.com', 'download.png', 1, NULL, NULL, 2),
('Jova', 'Jovic', 'jova_jovic', 'Jova123#', '0641234567', 'jova.jovic@gmail.com', 'jova_jovic.png', 1, NULL, NULL, 2),
('Maja', 'Majic', 'maja_majic', 'Maja123#', '0641232964', 'maja.majic@gmail.com', 'maja_majic.jpg', 0, NULL, NULL, 2),
('Mika', 'Mikic', 'mika_mikic', 'Mika123#', '0641762964', 'mika.mikic@gmail.com', 'mika_mikic.png', 0, NULL, NULL, 2),
('Nikola', 'Nikolic', 'nikola_nikolic', 'Nikola123#', '0641234567', 'nikola.nikolic@gmail.com', 'nikola_nikolic.jpg', 1, NULL, NULL, 2),
('Pera', 'Peric', 'pera_peric', 'Pera123#', '0641325647', 'pera.peric@gmail.com', 'pera_peric.png', 1, NULL, NULL, 2),
('Zika', 'Zikic', 'zika_zikic', 'Zika123#', '0641234567', 'zika.zikic@gmail.com', 'zika_zikic.png', 0, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `organizatori`
--

DROP TABLE IF EXISTS `organizatori`;
CREATE TABLE IF NOT EXISTS `organizatori` (
  `korisnicko_ime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `naziv_organizacije` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maticni_broj` int(11) DEFAULT NULL,
  `drzava` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grad` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postanski_broj` int(11) DEFAULT NULL,
  `ulica` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `broj` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`korisnicko_ime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `organizatori`
--

INSERT INTO `organizatori` (`korisnicko_ime`, `naziv_organizacije`, `maticni_broj`, `drzava`, `grad`, `postanski_broj`, `ulica`, `broj`) VALUES
('djoka_djokic', 'Djokina organizacija', 76369210, 'Srbija', 'Beograd', 11000, '', ''),
('jova_jovic', 'Jovina organizacija', 45123652, 'Hrvatska', 'Zagreb', 10000, 'Ulica kneza Branimira', '142'),
('nikola_nikolic', 'Nikolina organizacija', 76543210, 'Srbija', 'Beograd', 11000, 'Bulevar oslobodjenja', '55'),
('pera_peric', 'Perina organizacija', 45174152, 'Bosna i Hercegovina', 'Sarajevo', 71000, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `prijave`
--

DROP TABLE IF EXISTS `prijave`;
CREATE TABLE IF NOT EXISTS `prijave` (
  `id_radionice` int(11) NOT NULL,
  `ki_ucesnika` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `odobri` tinyint(4) NOT NULL,
  `komentar` text COLLATE utf8_unicode_ci,
  `svidjanje` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_radionice`,`ki_ucesnika`),
  KEY `prijave_ibfk_2` (`ki_ucesnika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prijave`
--

INSERT INTO `prijave` (`id_radionice`, `ki_ucesnika`, `odobri`, `komentar`, `svidjanje`) VALUES
(1, 'pera_peric', 1, 'Dobra radioncica', 1),
(1, 'zika_zikic', 2, 'Tooooop', 1),
(2, 'zika_zikic', 1, 'Jako dobro', 1),
(3, 'mika_mikic', 2, NULL, 0),
(8, 'maja_majic', 2, NULL, 0),
(8, 'mika_mikic', 2, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `radionice`
--

DROP TABLE IF EXISTS `radionice`;
CREATE TABLE IF NOT EXISTS `radionice` (
  `id_radionice` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `datum` date NOT NULL,
  `mesto` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kratak_opis` text COLLATE utf8_unicode_ci NOT NULL,
  `slika_glavna` text COLLATE utf8_unicode_ci NOT NULL,
  `duzi_opis` text COLLATE utf8_unicode_ci NOT NULL,
  `mesto_x` double DEFAULT NULL,
  `mesto_y` double DEFAULT NULL,
  `max_br_ucesnika` int(11) NOT NULL,
  `ki_organizacije` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `odobrena` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_radionice`),
  KEY `FOREIGN` (`ki_organizacije`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `radionice`
--

INSERT INTO `radionice` (`id_radionice`, `naziv`, `datum`, `mesto`, `kratak_opis`, `slika_glavna`, `duzi_opis`, `mesto_x`, `mesto_y`, `max_br_ucesnika`, `ki_organizacije`, `odobrena`) VALUES
(1, 'Salvador Dali', '2023-01-26', 'KC Grad', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur eu fermentum lorem.', 'dali.jpeg', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur eu fermentum lorem.Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur eu fermentum lorem.Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur eu fermentum lorem.', NULL, NULL, 10, 'jova_jovic', 2),
(2, 'Art', '2023-02-25', 'Dom omladine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus eget velit id accumsan. Donec quis lobortis velit. Sed a arcu quis velit molestie convallis.', 'art.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus eget velit id accumsan. Donec quis lobortis velit. Sed a arcu quis velit molestie convallis. Aliquam sit amet neque nec ex blandit tincidunt rutrum ornare justo. Sed magna urna, mattis ut auctor sit amet, eleifend vel sapien. Sed in cursus arcu. Sed at volutpat nisi, et interdum velit. Fusce sollicitudin, erat nec accumsan luctus, augue nisl mollis libero, eu volutpat quam lectus quis metus. Fusce vestibulum orci sed aliquam dictum. Vivamus ultrices, nibh ut sagittis ullamcorper, risus ipsum rhoncus nisi, eget imperdiet ligula augue eget neque.', NULL, NULL, 15, 'jova_jovic', 2),
(3, 'da Vinci', '2023-02-27', 'Kulturni centar', 'Ut at tempor ex, sit amet consectetur mi. Nam mattis viverra gravida. Sed a euismod risus, sit amet pharetra est. Mauris sodales ex leo, sed pellentesque erat mattis eget.', 'da_vinci.jpg', 'Nullam a sem consectetur, rhoncus libero nec, convallis augue. Quisque sem purus, efficitur sed elit et, dictum ornare libero. Integer nibh mi, dignissim sollicitudin sapien sit amet, gravida imperdiet tellus. Cras tempus enim vitae purus mattis auctor. Integer gravida dui nec eros ultrices molestie.', NULL, NULL, 12, 'jova_jovic', 2),
(7, 'Picasso', '2023-03-15', 'Atelje', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ullamcorper, magna eget convallis porttitor, lacus lacus tempor augue, ac laoreet orci felis sit amet nulla.', 'picasso.jpeg', 'Duis elementum, nisi nec ultricies finibus, felis mauris sodales est, eget pulvinar enim magna ut eros. Pellentesque dapibus enim id nulla tempus, vel fringilla justo sollicitudin. Cras sit amet lacinia leo, non eleifend quam. Aliquam tempus, ex vel luctus malesuada, eros massa condimentum magna, ac vehicula est enim in nulla. In dignissim a turpis quis eleifend. Etiam bibendum sodales placerat.', NULL, NULL, 12, 'pera_peric', 2),
(8, 'Vajanje', '2023-03-01', 'Deciji atelje', 'In volutpat purus erat, non mattis sapien vestibulum eu. Curabitur dapibus viverra neque, eget dapibus enim pulvinar at. Curabitur porttitor odio sapien, nec viverra metus rutrum id.', 'vajanje.jpeg', 'Aliquam ligula lorem, ullamcorper nec varius sed, tincidunt et velit. Phasellus congue malesuada lobortis. Donec massa ante, euismod sit amet hendrerit a, consectetur vitae mauris. Vivamus ultrices ipsum a odio faucibus blandit. Morbi tincidunt nisl nunc, non suscipit diam rhoncus ac. Cras luctus lacus varius quam dictum elementum.', NULL, NULL, 2, 'nikola_nikolic', 2),
(9, 'Michelangelo', '2023-03-05', 'Dom kulture', 'Duis tristique diam at maximus ultricies. Etiam pharetra diam a lobortis tempus. Nulla facilisi. Sed ut odio condimentum, pharetra neque non, convallis purus.', 'michelangelo.jpg', 'Proin a placerat orci. Aenean rhoncus consequat odio non pellentesque. Quisque egestas elit id enim ornare, non dignissim enim finibus. Sed ac sagittis quam. Ut sit amet rutrum neque. Quisque consectetur, risus vitae suscipit bibendum, dolor mauris blandit tortor, consequat aliquam quam ipsum eget purus. Curabitur sodales enim posuere metus feugiat, non consectetur nunc lobortis. Aliquam tincidunt enim cursus elit tempus lobortis.', NULL, NULL, 8, 'nikola_nikolic', 0),
(13, 'Milic od Macve', '2023-03-10', 'Atelje', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ullamcorper, magna eget convallis porttitor, lacus lacus tempor augue, ac laoreet orci felis sit amet nulla.', 'milic.jpeg', 'Duis elementum, nisi nec ultricies finibus, felis mauris sodales est, eget pulvinar enim magna ut eros. Pellentesque dapibus enim id nulla tempus, vel fringilla justo sollicitudin. Cras sit amet lacinia leo, non eleifend quam. Aliquam tempus, ex vel luctus malesuada, eros massa condimentum magna, ac vehicula est enim in nulla. In dignissim a turpis quis eleifend. Etiam bibendum sodales placerat.', NULL, NULL, 12, 'pera_peric', 0),
(14, 'Vincent van Gogh', '2023-03-08', 'Centar za kulturu Stari grad', 'Duis accumsan ipsum sed enim vulputate, facilisis bibendum diam ornare. Aliquam eget rutrum dui. Donec aliquet mi id viverra congue.', 'van_gogh.jpeg', 'Duis iaculis enim a erat sollicitudin, non luctus arcu auctor. Quisque posuere diam quis tortor porta, eu congue nibh luctus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Praesent tincidunt risus consequat justo bibendum, et efficitur elit porttitor.', NULL, NULL, 9, 'djoka_djokic', 2);

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

DROP TABLE IF EXISTS `slike`;
CREATE TABLE IF NOT EXISTS `slike` (
  `id_slike` int(11) NOT NULL AUTO_INCREMENT,
  `link_putanje` text COLLATE utf8_unicode_ci NOT NULL,
  `datum_upload` date NOT NULL,
  `id_radionice` int(11) NOT NULL,
  PRIMARY KEY (`id_slike`),
  KEY `FOREIGN` (`id_radionice`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`id_slike`, `link_putanje`, `datum_upload`, `id_radionice`) VALUES
(3, 'dali1.jpeg', '2023-01-11', 1),
(4, 'dali2.jpeg', '2023-01-11', 1),
(5, 'dali3.jpeg', '2023-01-11', 1),
(6, 'dali4.jpeg', '2023-01-11', 1),
(7, 'dali5.jpeg', '2023-01-11', 1),
(8, 'art1.jpeg', '2023-02-02', 2),
(9, 'art2.jpeg', '2023-02-02', 2),
(10, 'art3.jpeg', '2023-02-02', 2),
(11, 'art4.jpeg', '2023-02-02', 2),
(12, 'da_vinci1.jpg', '2023-02-12', 3),
(13, 'da_vinci2.jpg', '2023-02-12', 3),
(14, 'da_vinci3.jpg', '2023-02-12', 3),
(15, 'da_vinci4.jpg', '2023-02-12', 3),
(16, 'da_vinci5.jpg', '2023-02-12', 3),
(17, 'art5.jpeg', '2023-02-02', 2),
(18, 'picasso1.jpeg', '2023-02-13', 7),
(19, 'picasso2.jpeg', '2023-02-13', 7),
(20, 'picasso3.jpeg', '2023-02-13', 7),
(21, 'picasso4.jpeg', '2023-02-13', 7),
(22, 'picasso5.jpeg', '2023-02-13', 7),
(23, 'vajanje1.jpeg', '2023-02-15', 8),
(24, 'vajanje2.jpeg', '2023-02-15', 8),
(25, 'vajanje3.jpeg', '2023-02-15', 8),
(26, 'vajanje4.jpeg', '2023-02-15', 8),
(27, 'vajanje5.jpeg', '2023-02-15', 8),
(28, 'michelangelo1.jpg', '2023-02-17', 9),
(29, 'michelangelo2.jpg', '2023-02-17', 9),
(30, 'michelangelo3.jpg', '2023-02-17', 9),
(31, 'michelangelo4.jpg', '2023-02-17', 9),
(32, 'michelangelo5.jpg', '2023-02-17', 9),
(38, 'milic1.jpeg', '2023-02-17', 13),
(39, 'milic2.jpeg', '2023-02-17', 13),
(40, 'milic3.jpeg', '2023-02-17', 13),
(41, 'milic4.jpeg', '2023-02-17', 13),
(42, 'milic5.jpeg', '2023-02-17', 13),
(43, 'van_gogh1.jpeg', '2023-02-17', 14),
(44, 'van_gogh2.jpeg', '2023-02-17', 14),
(45, 'van_gogh3.jpeg', '2023-02-17', 14),
(46, 'van_gogh4.jpeg', '2023-02-17', 14),
(47, 'van_gogh5.jpeg', '2023-02-17', 14);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `organizatori`
--
ALTER TABLE `organizatori`
  ADD CONSTRAINT `organizatori_ibfk_1` FOREIGN KEY (`korisnicko_ime`) REFERENCES `korisnici` (`korisnicko_ime`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prijave`
--
ALTER TABLE `prijave`
  ADD CONSTRAINT `prijave_ibfk_1` FOREIGN KEY (`id_radionice`) REFERENCES `radionice` (`id_radionice`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prijave_ibfk_2` FOREIGN KEY (`ki_ucesnika`) REFERENCES `korisnici` (`korisnicko_ime`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `radionice`
--
ALTER TABLE `radionice`
  ADD CONSTRAINT `radionice_ibfk_1` FOREIGN KEY (`ki_organizacije`) REFERENCES `korisnici` (`korisnicko_ime`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slike`
--
ALTER TABLE `slike`
  ADD CONSTRAINT `slike_ibfk_1` FOREIGN KEY (`id_radionice`) REFERENCES `radionice` (`id_radionice`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
