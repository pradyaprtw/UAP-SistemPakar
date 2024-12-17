-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 23, 2022 at 03:56 PM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaius`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dname` varchar(100) COLLATE utf16_bin NOT NULL,
  `demail` varchar(100) COLLATE utf16_bin NOT NULL,
  `pname` varchar(100) COLLATE utf16_bin NOT NULL,
  `pemail` varchar(100) COLLATE utf16_bin NOT NULL,
  `remark` varchar(100) COLLATE utf16_bin NOT NULL,
  `apdate` varchar(100) COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `dname`, `demail`, `pname`, `pemail`, `remark`, `apdate`) VALUES
(1, 'Emeka Daniel', 'emeza@gmail.com', 'Jethro Adamu', 'smithjaph@gmail.com', 'Please I need your help', '22-12-2022');

-- --------------------------------------------------------

--
-- Table structure for table `backend`
--

DROP TABLE IF EXISTS `backend`;
CREATE TABLE IF NOT EXISTS `backend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) COLLATE utf16_bin NOT NULL,
  `pword` varchar(50) COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `backend`
--

INSERT INTO `backend` (`id`, `uname`, `pword`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

DROP TABLE IF EXISTS `diagnosis`;
CREATE TABLE IF NOT EXISTS `diagnosis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf16_bin NOT NULL,
  `heart_failure1` varchar(100) COLLATE utf16_bin NOT NULL,
  `heart_failure2` varchar(100) COLLATE utf16_bin NOT NULL,
  `heart_failure3` varchar(200) COLLATE utf16_bin NOT NULL,
  `heart_failure4` varchar(100) COLLATE utf16_bin NOT NULL,
  `heart_failure5` varchar(200) COLLATE utf16_bin NOT NULL,
  `stroke1` varchar(200) COLLATE utf16_bin NOT NULL,
  `stroke2` varchar(200) COLLATE utf16_bin NOT NULL,
  `stroke3` varchar(200) COLLATE utf16_bin NOT NULL,
  `stroke4` varchar(100) COLLATE utf16_bin NOT NULL,
  `stroke7` varchar(100) COLLATE utf16_bin NOT NULL,
  `Cor_pulmonale1` varchar(100) COLLATE utf16_bin NOT NULL,
  `Cor_pulmonale2` varchar(200) COLLATE utf16_bin NOT NULL,
  `Cor_pulmonale3` varchar(100) COLLATE utf16_bin NOT NULL,
  `Cor_pulmonale4` varchar(200) COLLATE utf16_bin NOT NULL,
  `Cor_pulmonale5` varchar(100) COLLATE utf16_bin NOT NULL,
  `Cor_pulmonale6` varchar(100) COLLATE utf16_bin NOT NULL,
  `Cor_pulmonale7` varchar(200) COLLATE utf16_bin NOT NULL,
  `Cor_pulmonale8` varchar(100) COLLATE utf16_bin NOT NULL,
  `Cor_pulmonale9` varchar(200) COLLATE utf16_bin NOT NULL,
  `Cor_pulmonale10` varchar(100) COLLATE utf16_bin NOT NULL,
  `coronary_heart_disease1` varchar(100) COLLATE utf16_bin NOT NULL,
  `coronary_heart_disease3` varchar(200) COLLATE utf16_bin NOT NULL,
  `coronary_heart_disease4` varchar(100) COLLATE utf16_bin NOT NULL,
  `coronary_heart_disease6` varchar(100) COLLATE utf16_bin NOT NULL,
  `coronary_heart_disease7` varchar(100) COLLATE utf16_bin NOT NULL,
  `coronary_heart_disease8` varchar(200) COLLATE utf16_bin NOT NULL,
  `cardiac_dysrhythmia` varchar(100) COLLATE utf16_bin NOT NULL,
  `recommendation` varchar(200) COLLATE utf16_bin NOT NULL,
  `binfo` varchar(6000) COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `email`, `heart_failure1`, `heart_failure2`, `heart_failure3`, `heart_failure4`, `heart_failure5`, `stroke1`, `stroke2`, `stroke3`, `stroke4`, `stroke7`, `Cor_pulmonale1`, `Cor_pulmonale2`, `Cor_pulmonale3`, `Cor_pulmonale4`, `Cor_pulmonale5`, `Cor_pulmonale6`, `Cor_pulmonale7`, `Cor_pulmonale8`, `Cor_pulmonale9`, `Cor_pulmonale10`, `coronary_heart_disease1`, `coronary_heart_disease3`, `coronary_heart_disease4`, `coronary_heart_disease6`, `coronary_heart_disease7`, `coronary_heart_disease8`, `cardiac_dysrhythmia`, `recommendation`, `binfo`) VALUES
(12, 'literallycustoms@gmail.com', '20', '0', '10', '5', '0', '0', '20', '30', '10', '0', '20', '0', '0', '0', '0', '30', '0', '0', '20', '0', '0', '30', '0', '10', '0', '0', '0', 'Slight Chances of Cor-Pulmonale, Try see a doctor', ''),
(13, 'smithjaph@gmail.com', '20', '0', '10', '0', '0', '0', '20', '30', '10', '10', '0', '10', '0', '0', '0', '0', '30', '0', '0', '20', '30', '0', '0', '10', '0', '30', '100', 'High Chances of Cardiac Dysrhythmia  & Stroke  (100/70)', '<span>Stroke: </span> Stroke occurs when the blood supply to part of the brain is interrupted or reduced, preventing brain tissue from getting oxygen.<br><span>Cardiac Dysrhythmia: </span> Improper beating of the heart, whether irregular, too fast or too slow.');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

DROP TABLE IF EXISTS `disease`;
CREATE TABLE IF NOT EXISTS `disease` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `symptom` mediumtext COLLATE utf16_bin,
  `disease` varchar(2000) COLLATE utf16_bin DEFAULT NULL,
  `status` varchar(50) COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`id`, `symptom`, `disease`, `status`) VALUES
(20, 'Wheezing', 'Cor pulmonale ', 'Cor_pulmonale1'),
(21, 'Chest pain', 'stroke', 'stroke1'),
(22, 'Shortness of breath', 'heart failure ', 'heart_failure1'),
(23, 'Hypertension', 'coronary heart disease', 'coronary_heart_disease1'),
(24, 'High blood pressure', 'stroke', 'stroke3'),
(25, 'Chronic wet cough', 'Cor pulmonale', 'Cor_pulmonale2'),
(26, 'Diabetes', 'stroke', 'stroke2'),
(27, 'Fatigue', 'heart failure', 'heart_failure2'),
(28, 'Obesity', 'coronary heart disease', 'coronary_heart_disease2'),
(29, 'Abnormal awareness of heartbeat', 'cardiac dysrhythmia', 'cardiac_dysrhythmia1'),
(30, 'Swelling of the abdomen with fluid', 'Cor pulmonale', 'Cor_pulmonale3'),
(31, 'low heart pels', 'stroke', 'stroke4'),
(32, 'Feet swelling, ankles swelling', 'heart failure', 'heart_failure3'),
(33, 'High alcohol level', 'coronary heart disease', 'coronary_heart_disease3'),
(34, 'Palpitations', 'cardiac dysrhythmia', 'cardiac_dysrhythmia2'),
(35, 'Swelling of the ankles and feet', 'Cor pulmonale', 'Cor_pulmonale4'),
(36, 'Headache', 'stroke', 'stroke5'),
(37, 'Increased fat around the middle', 'heart failure', 'heart_failure4'),
(38, 'anxroxy', 'cardiac dysrhythmia', 'cardiac_dysrhythmia3');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf16_bin NOT NULL,
  `gsm` varchar(100) COLLATE utf16_bin NOT NULL,
  `address` varchar(100) COLLATE utf16_bin NOT NULL,
  `email` varchar(100) COLLATE utf16_bin NOT NULL,
  `state` varchar(100) COLLATE utf16_bin NOT NULL,
  `lga` varchar(100) COLLATE utf16_bin NOT NULL,
  `pword` varchar(100) COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `gsm`, `address`, `email`, `state`, `lga`, `pword`) VALUES
(3, 'Abdulazeez Sani', '09066691043', 'No. 234 U/Zawu', 'abdul@gmail.com', 'Kaduna', 'Sabon Gari', '123456'),
(2, 'Gaius Jaba', '07037435536', 'Fort Pierce, Florida', 'gaius@gmail.com', 'Kaduna', 'Kaduna North', '123456'),
(4, 'Daniel Kah', '09066691043', 'Fort Pierce, Florida', 'dsx@gmail.com', 'Kaduna', 'Kajuru', '123456'),
(5, 'Emeka Daniel', '08084348312', 'No. 234 U/Zawu', 'emeza@gmail.com', 'Kaduna', 'Igabi', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

DROP TABLE IF EXISTS `treatment`;
CREATE TABLE IF NOT EXISTS `treatment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disease` varchar(200) COLLATE utf16_bin DEFAULT NULL,
  `treatment` varchar(2000) COLLATE utf16_bin DEFAULT NULL,
  `medication` varchar(2000) COLLATE utf16_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`id`, `disease`, `treatment`, `medication`) VALUES
(1, 'heart failure', 'Coronary Angioplasty\r\nCoronary Artery Bypass Graft Surgery\r\n', 'clotbusters (should be administered as soon as possible for certain types of heart failure)'),
(2, 'stroke', 'Carotid Endarterectomy', 'clotbusters (must be administered within 3 hours from onset of stroke symptoms for certain types of strokes'),
(3, 'coronary heart disease', 'Aspirin is one of the cornerstones of coronary artery disease treatment. It prevents platelets from clumping together when blood becomes turbulent, like when it flows past a narrowing in an artery.', 'Beta blockers like carvedilol (Coreg)'),
(4, 'cardiac dysrhythmia', 'Treatments may include physical maneuvers, medications, electricity conversion, or electro or cryo cautery.', 'aspirin'),
(5, 'Cor pulmonale', 'treated with anticoagulants.', 'may include medication (conservative treatment) or iatrogenic/implanted pacemakers for slow heart rates, heart transplant for the severe case.'),
(6, 'go and see a doctor', 'go and see a doctor for professional advice and counsel ', 'your condition needs doctor\'s attention');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf16_bin NOT NULL,
  `gsm` varchar(100) COLLATE utf16_bin NOT NULL,
  `address` varchar(100) COLLATE utf16_bin NOT NULL,
  `age` varchar(100) COLLATE utf16_bin NOT NULL,
  `state` varchar(100) COLLATE utf16_bin NOT NULL,
  `lga` varchar(100) COLLATE utf16_bin NOT NULL,
  `email` varchar(100) COLLATE utf16_bin NOT NULL,
  `pword` varchar(100) COLLATE utf16_bin NOT NULL,
  `status` varchar(11) COLLATE utf16_bin NOT NULL,
  `booked` varchar(100) COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gsm`, `address`, `age`, `state`, `lga`, `email`, `pword`, `status`, `booked`) VALUES
(1, 'Jethro Adamu', '09066691043', 'No. 234 U/Zawu', '25', 'Kaduna', 'Kaduna North', 'literallycustoms@gmail.com', '123456', 'DIAGNOSED', ''),
(2, 'Jethro Adamu', '3169742594', 'No. 234 U/Zawu', '34', 'Kaduna', 'Chikun', 'smithjaph@gmail.com', '123456', 'DIAGNOSED', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
