# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.13)
# Database: mathdept_local
# Generation Time: 2017-05-18 03:02:58 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table activities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `activities`;

CREATE TABLE `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT '1',
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table album
# ------------------------------------------------------------

DROP TABLE IF EXISTS `album`;

CREATE TABLE `album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alnum_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alnum_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alnum_year` int(11) NOT NULL,
  `alnum_created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table bibliography
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bibliography`;

CREATE TABLE `bibliography` (
  `bibtexkey` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `x_bibtex_type` text COLLATE utf8_unicode_ci,
  `author` text COLLATE utf8_unicode_ci,
  `title` text COLLATE utf8_unicode_ci,
  `journal` text COLLATE utf8_unicode_ci,
  `volume` text COLLATE utf8_unicode_ci,
  `number` text COLLATE utf8_unicode_ci,
  `pages` text COLLATE utf8_unicode_ci,
  `year` text COLLATE utf8_unicode_ci,
  `url` text COLLATE utf8_unicode_ci,
  `timestamp` text COLLATE utf8_unicode_ci,
  `biburl` text COLLATE utf8_unicode_ci,
  `bibsource` text COLLATE utf8_unicode_ci,
  `_author` text COLLATE utf8_unicode_ci,
  `doi` text COLLATE utf8_unicode_ci,
  `fjournal` text COLLATE utf8_unicode_ci,
  `issn` text COLLATE utf8_unicode_ci,
  `mrclass` text COLLATE utf8_unicode_ci,
  `mrnumber` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`bibtexkey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `bibliography` WRITE;
/*!40000 ALTER TABLE `bibliography` DISABLE KEYS */;

INSERT INTO `bibliography` (`bibtexkey`, `x_bibtex_type`, `author`, `title`, `journal`, `volume`, `number`, `pages`, `year`, `url`, `timestamp`, `biburl`, `bibsource`, `_author`, `doi`, `fjournal`, `issn`, `mrclass`, `mrnumber`)
VALUES
	('DBLP:journals-combinatorics-BorozanCCFNNV15','article','Valentin Borozan and Gerard Jennhwa Chang and Nathann Cohen and Shinya Fujita and Narayanan Narayanan and Reza Naserasr and Petru Valicov','From Edge-Coloring to Strong Edge-Coloring','Electr. J. Comb.','22','2','P2.9','2015','http://www.combinatorics.org/ojs/index.php/eljc/article/view/v22i2p9','Tue, 19 May 2015 01:00:00 +0200','http://dblp.uni-trier.de/rec/bib/journals/combinatorics/BorozanCCFNNV15','dblp computer science bibliography, http://dblp.org','<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Valentin Borozan</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Gerard Jennhwa Chang</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Nathann Cohen</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Shinya Fujita</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Narayanan Narayanan</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Reza Naserasr</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Petru Valicov</span>',NULL,NULL,NULL,NULL,NULL),
	('DBLP:journals-dm-ChangN13','article','Gerard Jennhwa Chang and N. Narayanan','On a conjecture on the balanced decomposition number','Discrete Mathematics','313','14','1511â€“1514','2013','http://dx.doi.org/10.1016/j.disc.2013.02.012','Mon, 22 Apr 2013 01:00:00 +0200','http://dblp.uni-trier.de/rec/bib/journals/dm/ChangN13','dblp computer science bibliography, http://dblp.org','<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Gerard Jennhwa Chang</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">N. Narayanan</span>','10.1016/j.disc.2013.02.012',NULL,NULL,NULL,NULL),
	('MR3318627','article','Balakrishnan, Kannan and Changat, Manoj and Lakshmikuttyamma, Anandavally K. and Mathew, Joseph and Mulder, Henry Martyn and Narasimha-Shenoi, Prasanth G. and Narayanan, N.','Axiomatic characterization of the interval function of a block graph','Discrete Math.','338','6','885â€“894','2015','http://dx.doi.org/10.1016/j.disc.2015.01.004',NULL,NULL,NULL,'<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Kannan Balakrishnan</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Manoj Changat</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Anandavally K. Lakshmikuttyamma</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Joseph Mathew</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Henry Martyn Mulder</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Prasanth G. Narasimha-Shenoi</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">N. Narayanan</span>','10.1016/j.disc.2015.01.004','Discrete Mathematics','0012-365X','05C12 (05C05)','3318627');

/*!40000 ALTER TABLE `bibliography` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table booking
# ------------------------------------------------------------

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `booking_user_id` int(11) NOT NULL,
  `booking_reasone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `booking_hall_id` int(11) NOT NULL,
  `booking_hall_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `booking_hall_to` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `booking_status` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `timefrom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timeto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;

INSERT INTO `booking` (`id`, `booking_user_id`, `booking_reasone`, `booking_hall_id`, `booking_hall_from`, `booking_hall_to`, `created_at`, `updated_at`, `booking_status`, `timefrom`, `timeto`)
VALUES
	(1,14,'Midsem Disc Mathe',2,'28-09-2015','','2015-09-18 07:00:46','2015-09-18 07:00:46','1','17:00','19:00'),
	(2,14,'test',2,'28-09-2016',NULL,'2016-09-26 18:17:06','2016-09-26 19:20:21','0','17:00','19:00'),
	(3,14,'test',2,'28-09-2016',NULL,'2016-09-26 18:37:58','2016-09-26 19:20:24','0','17:00','19:00'),
	(4,14,'yevr',2,'28-09-2016',NULL,'2016-09-26 18:41:55','2016-09-26 19:20:27','0','17:00','19:00'),
	(5,14,'we',2,'28-09-2016',NULL,'2016-09-26 18:48:56','2016-09-26 19:20:30','0','17:00','19:00'),
	(6,14,'jkj',2,'28-09-2016',NULL,'2016-09-26 19:19:55','2016-09-26 19:19:55','1','16:59','17:00'),
	(7,14,'kjn',2,'28-09-2016',NULL,'2016-09-26 19:22:16','2016-09-26 19:22:16','1','19:00','19:05'),
	(8,14,'wqfe',2,'28-09-2016',NULL,'2016-09-26 19:26:21','2016-09-26 19:26:36','0','17:56','18:56'),
	(9,14,'herbgnoer',2,'28-09-2016',NULL,'2016-09-27 04:12:39','2016-09-27 04:12:39','1','14:40','16:59');

/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table bookpublished
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bookpublished`;

CREATE TABLE `bookpublished` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `book_authors` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `book_publisher` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `book_isbn` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `book_year` int(11) NOT NULL,
  `book_other_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `book_edition` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `added_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `bookpublished` WRITE;
/*!40000 ALTER TABLE `bookpublished` DISABLE KEYS */;

INSERT INTO `bookpublished` (`id`, `book_name`, `book_authors`, `book_publisher`, `book_isbn`, `book_year`, `book_other_details`, `book_edition`, `created_at`, `updated_at`, `added_by`)
VALUES
	(1,'ds','mds,nksdn','j sv ja','12',2014,'poj','12','2016-02-14 23:04:27','2016-02-14 23:15:36',14),
	(3,'aksdnvwe','aoknv','kma dv','lma sdv',2013,'oknerg',' e rgfjn ','2016-09-24 11:28:44','2016-09-24 15:27:57',14),
	(4,'qemrgkn','nerjg','enrj2 n','j ergjn',2014,'k efb wr4','e fbjw e','2016-09-24 13:21:56','2016-09-24 13:21:56',14),
	(6,'jqinwer','j er','konw','km f',2031,'kwf','knmwdc','2016-09-24 15:28:16','2016-09-24 15:28:16',14),
	(7,'onqe ','okerg','kengw ','345',2303,'kmeg','e gwire','2016-09-25 05:59:09','2016-09-25 05:59:09',14),
	(8,'title','author','publisher','isbn',2013,'detail\r\n','1','2016-09-25 07:42:11','2016-09-25 07:42:11',14),
	(9,'Title 1','Authors','Publisher','ISBN',2222,'details','1','2016-09-25 07:43:14','2016-09-25 07:43:14',14);

/*!40000 ALTER TABLE `bookpublished` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table carousel
# ------------------------------------------------------------

DROP TABLE IF EXISTS `carousel`;

CREATE TABLE `carousel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `carousel_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `carousel_image_alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `carousel_image_anytext` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `carousel_image_order` int(11) NOT NULL,
  `carousel_image_uploaded_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `show` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table conference_hall
# ------------------------------------------------------------

DROP TABLE IF EXISTS `conference_hall`;

CREATE TABLE `conference_hall` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `conference_halls_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conference_halls_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conference_halls_incharge` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conference_halls_contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conference_halls_is_free` int(11) NOT NULL,
  `conference_halls_next_available_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `conference_hall` WRITE;
/*!40000 ALTER TABLE `conference_hall` DISABLE KEYS */;

INSERT INTO `conference_hall` (`id`, `conference_halls_name`, `conference_halls_details`, `conference_halls_incharge`, `conference_halls_contact`, `conference_halls_is_free`, `conference_halls_next_available_date`, `created_at`, `updated_at`)
VALUES
	(2,'HSB 357','HSB 357, 3rd Floor, Humanities and Sciences Building','Dr. Narayanan N','naru@iitm.ac.in',0,'','2015-09-18 06:58:25','2015-09-18 06:58:25'),
	(3,'HSB 257','Math Seminar Hall','M T NAIR','mahead@iitm.ac.in',0,'','2016-11-11 05:31:14','2016-11-11 05:31:14'),
	(4,'Madhava Hall','HSB 357','Math Office','maoffice@iitm.ac.in',0,'','2017-03-01 04:11:03','2017-03-01 04:11:03');

/*!40000 ALTER TABLE `conference_hall` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contact
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contact_for` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_details` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_office_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;

INSERT INTO `contact` (`id`, `contact_for`, `contact_details`, `contact_email`, `contact_office_email`, `contact_updated_by`, `created_at`, `updated_at`)
VALUES
	(2,'HEAD OF THE DEPARTMENT','\n					      \n					      <div><span style=\"font-weight: bold;\">The Head, Department of Mathematics,</span></div><div>IIT Madras , Chennai - 600036, INDIA</div><div>Phone: +91 44 22574600 Fax: +91 44 22574602<br>mahead [at] iitm dot ac dot in<br></div>\n					  		                		                		                		                ','','maoffice@iitm.ac.in',14,'0000-00-00 00:00:00','2016-09-26 14:42:30');

/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table course
# ------------------------------------------------------------

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_credit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_program_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_sem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_year` int(11) NOT NULL,
  `course_details` text COLLATE utf8_unicode_ci NOT NULL,
  `course_added_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `courser_reference` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;

INSERT INTO `course` (`id`, `course_no`, `course_name`, `course_credit`, `course_program_id`, `course_sem`, `course_year`, `course_details`, `course_added_by`, `created_at`, `updated_at`, `courser_reference`)
VALUES
	(1,'MA5310','LINEAR ALGEBRA','3','1','1',2015,'Systems of Linear Equations, Matrices and Elementary Row Operations, Row-Reduced Echelon Matrices . Vector Spaces, Subspaces, Bases and Dimension, Ordered basis and coordinates. Linear transformations, Rank-Nullity Theorem, The algebra of linear transformations, Isomorphism, Matrix representation of linear transformations, Linear Functionals, Annihilator, Double dual, Transpose of a linear transformation . Characteristic Values and Characteristic Vectors of linear transformations, Diagonalizability, Minimal polynomial of a linear transformation, Cayley-Hamilton Theorem, Invariant Subspaces, Direct-sum decompositions, Invariant Direct sums, The primary decomposition theorem, Cyclic subspaces and annihilators, Cyclic decomposition, rational, Jordan forms. Inner Product Spaces, Orthonormal Basis, Gram-Schmidt Theorem.',14,'2015-09-17 12:54:40','2015-09-17 12:54:40','1.    I. N. Herstein: Topics in Algebra, 2nd Edition, John-Wiley, 1999.\r\n2.    S. Axler: Linear Algebra Done Right, 2nd Edition, Springer UTM, 1997.\r\n3.    S. Lang: Linear Algebra, Springer Undergraduate Texts in Mathematics, 1989.\r\n4.    S. Kumaresan: Linear Algebra: A Geometric Approach, Prentice-Hall of India, 2004.'),
	(2,'MA7830','ADVANCED ALGEBRA','4','2','1',2015,'Groups: Basics of groups and its representations.   Commutative Rings: Dimension Theory, Regular local ring is a UFD. Hilbert functions.   Modules: The tensor, symmetric and exterior algebras of a module.   Non-commutative Rings: Review of Artin-Wedderburn theory including theorems of Jacobson-Bourbaki, Rieffel and Burnside, Kolchin\'s theorem.   Homological Algebra: Categories and Functors, Abelian categories, Projective and Injective resolutions, Left and Right derived functors, Ext and Tor, Local and Cech homology.  ',14,'2015-09-17 13:02:22','2015-09-17 13:02:22',' \r\nText Books:\r\n1.      S. Lang, Algebra, 3rd Edition, Addison-Wesley, 1999.\r\n2.      M. F. Atiyah, I. G. Macdonald, Introduction to Commutative Algebra. Addison-Wesley, 1969.\r\n3.      W. Fulton, J. Harris, Representation Theory - A First Course, GTM, Readings in Mathematics 129. Springer Verlag (1991).\r\n \r\nReference:\r\n1.      H. Matsumura, Commutative Ring Theory, Second edition,Cambridge Studies in Advanced Mathematics, 8.Cambridge University Press, Cambride 1989.\r\n2.      H. Matsumura, Commutative Algebra. Second edition. Mathematics Lecture Notes Series 56, Benjamin / Cummings Publishing,1980.\r\n3.      M. Artin, Algebra, Prentice Hall, 1994.'),
	(3,'MA5710','Mathematical Modelling in Industry','3','2','1',2015,'Methodology: Models, reality, properties of models, system characterization, steps in building in mathematical models, source of errors, dimensional analysis, model classification and illustration.  Case Studies related to R&D fields (one in each): Simulated Reality [Example: Traffic flow, Motion of Fibers, Behavior of Vehicles - Multi body systems, Behavior of Filters etc]; Optimization and Control [Example: Inverse problems and parameter identification, multi criteria optimization, Optimal shape design etc]; Multiscale models and algorithms [Example: Considering scenes of different scales nano, micro, mezzo and macro, Different algorithms on different scales and combining them]; Risks and decisions [Example: Portfolio optimization, Option pricing etc]; Data, text and Images [Example: Signal processing, Input-Output systems, Discover order in data sets, Image Denoising etc)  Modeling Lab [Thinking with Mathematical Models through Problems): Counting, Estimation, Structuring and Reasoning; Frame work through different mathematical (structural) equations and analysis; Optimization; Probabilities and Stochastic Processes.',14,'2015-09-17 13:04:05','2015-09-17 13:04:05','1. \"Mathematical modeling: Case Studies with Industry\", Alister D.Fitt, CRS & Springer, 2008.\r\n\r\n2. \"Mathematical Modeling - A Case Study Approach\", Reinhard Iliner, C.Sena Bohun, Samanta Mccallum and Thea van Roode, AMS, 2005.\r\n\r\n3. \"Mathematics and Technology\", Christiane Rousseau and Yuan Saint-Aubin, Springer, 2008.\r\n\r\n4. \"Mathematical Models in Biology\", Leah Edelstein-Kesht, SIAM, 2005.\r\n\r\n5. \"Principles of Mathematical Modeling\", Cliev L.Dym, Elsevier, 2004.\r\n\r\n6. \"Mathematical Modeling of Earth\'s Dynamical Systems\", Rudy Slingerland and Lee Kump, Princeton University Press, 2011. 7. \"Mathematical Modeling for the Life Sciences\", Jacques Istas, Springer, 2005'),
	(4,'MA1010','Functions of Several Variables','3','4','1',2015,'Functions of two and three variables:  Regions in plane, level curves and level surfaces, limit, continuity, partial derivatives, directional derivatives and gradient, normal to level curves and tangents, extreme values, Lagrange multipliers, double integral and iterated integral, volume of solids of revolution, approximation of volume, triple integral, change of variables, multiple integrals in cylindrical and spherical coordinates.  Vector calculus:  Gradient, Divergence, Curl, Line integral, conservative fields, Green\'s theorem, surface area of solids of revolution, surface area, surface integral, Triple integrals and Gauss Divergence theorem, Stokes\' theorem.',14,'2015-09-17 13:06:32','2015-09-17 13:06:32','Text:\r\n\r\nG.B. Thomas Jr., M.D. Weir and J.R. Hass, Thomas Calculus, Pearson Education, 2009..\r\n\r\nREFERENCES:\r\n\r\n1. E. Kreyszig, Advanced Engineering Mathematics, 10th Ed., John Willey & Sons, 2010.\r\n\r\n2. N. Piskunov, Differential and Integral Calculus Vol. 1-2, Mir Publishers, 1974.\r\n\r\n3. G. Strang,Calculus, Wellesley-Cambridge Press, 2010.\r\n\r\n4. J.E. Marsden, A.J. Tromba, A. Weinstein, Basic Multivariable Calculus, Springer Verlag, 1993.\r\n'),
	(6,'eng','jqj','3','2','1',2,'23=2g',14,'2016-09-26 11:18:25','2016-09-26 11:18:25','rwt');

/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `events_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `events_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `events_date` date  NOT NULL,
  `events_end_date` date DEFAULT NULL,
  `events_type_id` int(11) NOT NULL,
  `events_show_in_menu` int(11) NOT NULL,
  `events_archive` int(11) NOT NULL,
  `events_created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `externallink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(11) NOT NULL,
  `mainspeaker` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `posterimage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `needpage` int(11) NOT NULL,
  `events_place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `events_starttime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `events_endtime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;

INSERT INTO `events` (`id`, `events_name`, `events_desc`, `events_date`, `events_end_date`, `events_type_id`, `events_show_in_menu`, `events_archive`, `events_created_by`, `created_at`, `updated_at`, `externallink`, `publish`, `mainspeaker`, `posterimage`, `needpage`, `events_place`, `events_starttime`, `events_endtime`)
VALUES
	(1,'It is so obvious it is a puzzle: The axiom of choice.','In this talk, we discuss the Choice Axiom','02-09-2015','02-09-2015',13,1,0,185,'2015-09-18 12:28:50','2017-03-01 04:11:59','http://home.iitm.ac.in/naru/seminar/',1,'Prof R Ramanujam','',1,'4','4:15 PM','5:15 PM'),
	(2,'Erdos Magic','Paul Erdos, the famous wandering mathematician had an uncanny ability to connect problems with people. He also made several conceptual breakthroughs. One of the most talked about this is the \"Probabilistic Method\" aka Erdos Magic.  I will try to be the magician and present you the magic of Erdos.','10-09-2015','',6,1,0,14,'2015-09-18 12:39:13','2015-09-18 12:39:13','http://home.iitm.ac.in/naru/seminar/',1,'Dr. N Narayanan, IIT Madras','',1,'2','3:00 PM','4:00 PM'),
	(3,'Primes are in P','We present the famous proof of AKS that checking whether an integer is prime number or not is in polynomial time.','24-09-2015','',6,1,0,14,'2015-09-18 12:42:39','2015-09-18 12:42:39','',1,'Sounak Mishra','',1,'2','3:00 PM','4:00 PM'),
	(4,'Graph Grammars','An introduction to graph grammars.  Let $G=(V,E)$ be a graph. A grammar on $G$ with vocabulary $\\Sigma$ is a quintuple $(\\Sigma, \\delta, \\omega, x, y)$ such that:','23-09-2015','',13,1,0,14,'2015-09-19 05:27:50','2015-09-19 07:16:41','http://home.iitm.ac.in/naru/seminar/',1,'Prof. R Rama, IIT Madras','',0,'2','4:15 PM','5:15 PM'),
	(5,'ITCDM 2015','Indian Taiwan Conference on Discrete Mathematics','10-07-2015','',7,1,0,14,'2015-09-21 05:17:12','2015-09-21 05:17:12','',1,'','',1,'2','',''),
	(7,'The Magic of Young tableaux ','Young tableaux are certain combinatorial objects introduced in relation with some considerations in algebra. Pairs of Young tableaux with the same \"shape\" are enumerated by n! , that is the number of permutations on n elements. A famous correspondence is the Robinson-Schensted-Knuth algorithm (or RSK) which gives a one-to-one correspondence between these pairs of Young tableaux and permutations. It can be described in various different ways. The equivalence of these different constructions are fascinating. The famous computer scientist Donald Knuth said in 1972 \"The unusual nature of these coincidences might lead us to suspect that some sort of witchcraft is operating behind the scene\". This talk, accessible to every one, illustrates the nowadays style of combinatorial mathematics: visual, concrete, related to deep mathematics and magic.','11-01-2016','',13,1,0,14,'2016-01-08 04:07:39','2016-01-08 04:07:39','',1,'Prof. Xavier Viennot, CNRS Emeritus Research Director, Bordeaux University, France; Adjunct Professor, IMSc, Chennai.','',1,'2','4:00 PM','5:00 PM'),
	(8,'3th35tttttttttttttttttt','4t32th','24-01-2016','26-01-2016',6,1,0,14,'2016-01-24 07:28:03','2016-01-24 07:28:03','',1,'','event_56a47d03da42e.jpg',1,'2','',''),
	(9,'An infinite flock of pigeons.','We take a glimpse of the pigeonhole principle in its infinite avatar. We prove the Bolzano - Weierstrass theorem and some generalisations from analysis using infinite P. H. P. We then use it to prove that circle has the most area among all figures with same perimeter. ','22-02-2016','22-02-2016',13,1,0,185,'2016-02-27 09:07:03','2016-02-27 09:07:03','',1,'Narayanan N','',1,'2','3:00 PM','4:00 PM'),
	(10,'Sisyphus in front of the mirror of Erised','As the myth goes, Sisyphus was cursed to carry a heavy piece of stone to the top of a hill; and as soon as he places it there, the stone rolls back to the ground. Once again he carries it to its intended place. In the mirror of Erised, one is supposed to see one\'s own desires throwing open the casket of bad faith. When Sisyphus looks at the mirror of Erised, in the background of a rich formal system, all sorts of paradoxes appear. We will not enter the labyrinth of paradoxes, for the weird mirror might drive us to insanity. We will rather take help from a small machine \"SisEr\" to walk around the labyrinth. The machine works with just four symbols and poses a puzzle to the arrogant mathematician. We will show how the puzzle crushes the arrogance of the mathematician leading him/her to realize the limitations. The mathematician sees clearly that his/her god called \"proof\" is just incapable of catching the \"truth\". ','19-03-2015','',13,1,0,185,'2017-03-01 03:43:26','2017-03-01 03:43:26','https://home.iitm.ac.in/naru/seminar/',1,'Arindama Singh, IITM','',1,'2','4:00 PM',''),
	(11,'Spectral sequence - 2','','08-03-2017','',12,1,0,186,'2017-03-02 07:32:55','2017-03-02 07:32:55','',1,'Subhajit Chanda','',1,'2','3:00 PM','3:57 PM'),
	(12,'Spectral sequence - 3','','15-03-2017','',12,1,0,186,'2017-03-02 07:33:34','2017-03-02 07:33:34','',1,'Subhajit Chanda','',1,'2','3:00 PM','3:58 PM'),
	(13,'Spectral sequence - 2.5','','13-03-2017','',12,1,0,186,'2017-03-02 07:34:19','2017-03-02 07:34:19','',1,'Subhajit Chanda','',1,'2','2:59 PM','5:59 PM'),
	(14,'Spectral sequence - 2.4','','12-03-2017','',12,1,0,186,'2017-03-02 07:35:33','2017-03-02 07:35:33','',1,'Subhajit Chanda','',1,'2','1:00 PM','2:00 PM');

/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table events_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events_type`;

CREATE TABLE `events_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `events_type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `events_type_created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `events_type` WRITE;
/*!40000 ALTER TABLE `events_type` DISABLE KEYS */;

INSERT INTO `events_type` (`id`, `events_type_name`, `events_type_created_by`, `created_at`, `updated_at`)
VALUES
	(6,'Colloquium',14,'2014-06-20 01:58:42','2014-06-20 01:58:42'),
	(7,'Conferences',14,'2014-06-20 01:59:03','2014-06-20 01:59:03'),
	(9,'Meetings',14,'2014-06-20 01:59:24','2014-06-20 01:59:24'),
	(10,'Department Seminars',105,'2015-01-22 04:54:21','2015-01-22 04:54:21'),
	(11,'Public Lecture',170,'2015-02-12 06:55:33','2015-02-12 06:55:33'),
	(12,'Algebra Seminar Series',14,'2015-09-18 06:49:56','2015-09-18 06:49:56'),
	(13,'Discrete Mathematics Seminar Series',14,'2015-09-18 06:50:09','2016-03-28 00:58:13');

/*!40000 ALTER TABLE `events_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table facultycourse
# ------------------------------------------------------------

DROP TABLE IF EXISTS `facultycourse`;

CREATE TABLE `facultycourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `course_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `course_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `facultycourse` WRITE;
/*!40000 ALTER TABLE `facultycourse` DISABLE KEYS */;

INSERT INTO `facultycourse` (`id`, `course_name`, `course_desc`, `course_link`, `added_by`, `created_at`, `updated_at`)
VALUES
	(8,'Course 12','test','alokation.com',14,'2016-09-21 07:53:51','2016-09-21 02:23:51'),
	(9,'Escape','Escape is a simple app that tracks how many times you open your email, a social network, or other distracting websites. Each day, you’ll get a report letting you know how many times your work was interrupted by a distracting site during the day, as well as how much time lapsed in between each distraction. You can also see which apps are causing the most disturbance to your daily work flow, and adjust your usage accordingly. This is a great tool if you want to track your time better—and use it more wisely in the future.','https://www.producthunt.com/tech/escape',14,'2016-09-11 13:12:52','2016-09-11 13:12:52'),
	(11,'course 2','onwgqiw','nwef',14,'2016-09-25 07:52:30','2016-09-25 07:52:30'),
	(12,'course 3','niwrgiqb','kw efi2bf',14,'2016-09-25 07:52:59','2016-09-25 07:52:59'),
	(13,'Discrete Mathematics','B Tech Elective','http://foo.bar.com',14,'2016-10-27 18:50:07','2016-10-27 18:50:07'),
	(14,'Discrete Mathematics','Set theory, Logic and Graph theory for MSc','https://home.iitm.ac.in/naru/ma5350/',185,'2016-11-13 05:11:43','2016-11-13 05:11:43');

/*!40000 ALTER TABLE `facultycourse` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table footerinfo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `footerinfo`;

CREATE TABLE `footerinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `footerinfo_updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `footerinfo_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table gallery
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_album_id` int(11) NOT NULL,
  `gallery_content_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gallery_content_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gallery_added_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table headerinfo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `headerinfo`;

CREATE TABLE `headerinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `headerinfo_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `headerinfo_dept_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `headerinfo_tag_line` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `headerinfo_background_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `headerinfo_updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table menu_main
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu_main`;

CREATE TABLE `menu_main` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_link_alies` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_order` int(11) NOT NULL,
  `menu_has_child` int(11) NOT NULL,
  `menu_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table menu_sub
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu_sub`;

CREATE TABLE `menu_sub` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_link_alies` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_order` int(11) NOT NULL,
  `menu_has_child` int(11) NOT NULL,
  `memu_parent_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`migration`, `batch`)
VALUES
	('2017_03_05_210438_create_activities_table',1),
	('2017_03_05_210438_create_album_table',1),
	('2017_03_05_210438_create_bibliography_table',1),
	('2017_03_05_210438_create_booking_table',1),
	('2017_03_05_210438_create_bookpublished_table',1),
	('2017_03_05_210438_create_carousel_table',1),
	('2017_03_05_210438_create_conference_hall_table',1),
	('2017_03_05_210438_create_contact_table',1),
	('2017_03_05_210438_create_course_table',1),
	('2017_03_05_210438_create_events_table',1),
	('2017_03_05_210438_create_events_type_table',1),
	('2017_03_05_210438_create_facultycourse_table',1),
	('2017_03_05_210438_create_footerinfo_table',1),
	('2017_03_05_210438_create_gallery_table',1),
	('2017_03_05_210438_create_headerinfo_table',1),
	('2017_03_05_210438_create_menu_main_table',1),
	('2017_03_05_210438_create_menu_sub_table',1),
	('2017_03_05_210438_create_news_table',1),
	('2017_03_05_210438_create_othercourses_table',1),
	('2017_03_05_210438_create_password_reminders_table',1),
	('2017_03_05_210438_create_programs_table',1),
	('2017_03_05_210438_create_publications_table',1),
	('2017_03_05_210438_create_researchgroup_table',1),
	('2017_03_05_210438_create_researchinfo_table',1),
	('2017_03_05_210438_create_resource_album_table',1),
	('2017_03_05_210438_create_resource_document_table',1),
	('2017_03_05_210438_create_resource_gallery_table',1),
	('2017_03_05_210438_create_resource_links_table',1),
	('2017_03_05_210438_create_slider_table',1),
	('2017_03_05_210438_create_static_content_table',1),
	('2017_03_05_210438_create_students_table',1),
	('2017_03_05_210438_create_user_details_table',1),
	('2017_03_05_210438_create_user_group_table',1),
	('2017_03_05_210438_create_user_privileges_table',1),
	('2017_03_05_210438_create_user_type_table',1),
	('2017_03_05_210438_create_users_table',1),
	('2017_03_06_031540_add_disable_students_for_programs',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `news_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `news_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `news_by` int(11) NOT NULL,
  `news_publish` int(11) NOT NULL,
  `news_archive` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `news_type` int(11) NOT NULL,
  `news_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;

INSERT INTO `news` (`id`, `news_title`, `news_description`, `news_date`, `news_by`, `news_publish`, `news_archive`, `created_at`, `updated_at`, `news_type`, `news_link`)
VALUES
	(1,'Link Testing','Test if the feature requested is enabled.','2015-09-19',14,1,0,'2015-09-19 06:59:00','2015-09-19 07:01:14',1,''),
	(2,'This is a test','Testing','2015-09-19',14,1,0,'2015-09-19 06:59:33','2015-09-19 07:01:20',2,''),
	(3,'link test 2','Test if the feature requested is enabled.','2015-09-19',14,1,0,'2015-09-19 07:00:51','2015-09-19 07:01:10',1,'http://home.iitm.ac.in/naru/'),
	(4,'test 3','test 3','2015-09-19',14,1,0,'2015-09-19 07:01:46','2015-09-19 07:05:49',2,''),
	(5,'test news monday','description 2','2015-09-21',14,1,0,'2015-09-21 11:11:09','2015-09-21 11:11:36',1,''),
	(6,'Result anounced','Mathematics, hailed as the “Queen of Sciences” by Carl Fredrich Gauss, dreaded by many and loved by an equal number, has progressed rapidly since the beginning of recorded history. Mikhail B. Sevryuk noted in January 2006 that “the number of papers and bo','2015-09-21',14,1,0,'2015-09-21 11:13:47','2015-09-21 11:13:54',2,''),
	(7,'Test on 3rd November','Testing continuiing','2015-11-03',14,1,0,'2015-11-03 10:59:29','2015-11-03 10:59:29',1,'');

/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table othercourses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `othercourses`;

CREATE TABLE `othercourses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details` text COLLATE utf8_unicode_ci,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `othercourses` WRITE;
/*!40000 ALTER TABLE `othercourses` DISABLE KEYS */;

INSERT INTO `othercourses` (`id`, `details`, `updated_by`, `created_at`, `updated_at`)
VALUES
	(1,'<div align=\"center\" style=\"color: rgb(0, 0, 0); font-family: Times; font-size: medium; background-color: rgb(223, 223, 223);\"><table class=\"MsoNormalTable\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"895\" style=\"width: 671.25pt; background: white;\"><tbody><tr><td valign=\"top\" style=\"background: rgb(223, 223, 223); padding: 0in;\"><div align=\"center\"></div></td></tr></tbody></table></div><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: medium; font-family: &quot;Times New Roman&quot;, serif; color: rgb(0, 0, 0); background-color: rgb(223, 223, 223);\"></p><div align=\"center\" style=\"color: rgb(0, 0, 0); font-family: Times; font-size: medium; background-color: rgb(223, 223, 223);\"><table class=\"MsoNormalTable\" border=\"0\" cellpadding=\"0\" width=\"965\" style=\"width: 723.75pt; background: white;\"><tbody><tr><td width=\"697\" style=\"width: 522.75pt; padding: 0.75pt;\"><div align=\"center\"><table class=\"MsoNormalTable\" border=\"0\" cellpadding=\"0\" width=\"620\" height=\"800\" style=\"width: 435.75pt;\"><tbody><tr width=\"100%\" style=\"height: 12.75pt;\"><td colspan=\"2\" style=\"width: 432.75pt; background: rgb(201, 215, 207); padding: 3.75pt; height: 12.75pt;\"><p class=\"MsoNormal\" align=\"center\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif; text-align: center;\"><b><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif; text-transform: uppercase;\"><strong>MATHEMETICS COURSES FOR B.TECH PROGRAMME</strong></span></b></p><p class=\"MsoNormal\" align=\"center\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif; text-align: center;\"><b><o:p></o:p></b><strong>(Approved by the Senate in its 267th &nbsp;meeting held on 04.03.2015)</strong></p><p class=\"MsoNormal\" align=\"center\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif; text-align: center;\"><strong>To be effective for the B.Tech. July-November 2015 batch onwards</strong></p></td></tr><tr width=\"100%\" style=\"height: 12.75pt;\"><td colspan=\"2\" style=\"width: 432.75pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; padding: 3.75pt; height: 12.75pt;\"><p style=\"margin-right: 0in; margin-left: 0in; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><strong><em>Each B.tech. Student is required to take two core courses and</em></strong><strong><em>&nbsp;at least one elective course.</em></strong></p></td></tr><tr width=\"100%\" style=\"height: 12.75pt;\"><td colspan=\"2\" style=\"width: 432.75pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; padding: 3.75pt; height: 12.75pt;\"><p class=\"MsoNormal\" align=\"center\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif; text-align: center;\"><b><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif; text-transform: uppercase;\">CORE COURSES</span><o:p></o:p></b></p></td></tr><tr style=\"height: 30.75pt;\"><td style=\"width: 49.5pt; background: rgb(201, 215, 207); padding: 3.75pt; height: 30.75pt;\"><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\">MA1101</span><o:p></o:p></p></td><td style=\"width: 381.75pt; background: rgb(201, 215, 207); padding: 3.75pt; height: 30.75pt;\"><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\"><a href=\"https://mat.iitm.ac.in/btechcourse/ma101.html\" style=\"color: blue; text-decoration: underline;\"><span style=\"color: black;\">Functions of Several Variables</span></a></span><o:p></o:p></p></td></tr><tr style=\"height: 30.75pt;\"><td style=\"width: 49.5pt; background: rgb(234, 234, 211); padding: 3.75pt; height: 30.75pt;\"><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\">MA1102</span><o:p></o:p></p></td><td style=\"width: 381.75pt; background: rgb(234, 234, 211); padding: 3.75pt; height: 30.75pt;\"><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\"><a href=\"https://mat.iitm.ac.in/btechcourse/ma102.html\" style=\"color: blue; text-decoration: underline;\"><span style=\"color: black;\">Series and Matrices</span></a></span><o:p></o:p></p></td></tr><tr width=\"100%\" style=\"height: 12.75pt;\"><td colspan=\"2\" style=\"width: 432.75pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; padding: 3.75pt; height: 12.75pt;\"><p class=\"MsoNormal\" align=\"center\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif; text-align: center;\"><b><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\"></span><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\">ELECTIVE COURSES</span><o:p></o:p></b></p></td></tr><tr style=\"height: 9.75pt;\"><td width=\"69\" style=\"width: 49.5pt; background: rgb(201, 215, 207); padding: 3.75pt; height: 9.75pt;\"><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\">MA2010</span><o:p></o:p></p></td><td width=\"545\" style=\"width: 381.75pt; background: rgb(201, 215, 207); padding: 3.75pt; height: 9.75pt;\"><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\"><a href=\"https://mat.iitm.ac.in/btechcourse/ma201.html\" style=\"color: blue; text-decoration: underline;\"><span style=\"color: black;\">Complex Variables</span></a></span><o:p></o:p></p></td></tr><tr style=\"height: 32.25pt;\"><td width=\"69\" style=\"width: 49.5pt; background: rgb(234, 234, 211); padding: 3.75pt; height: 32.25pt;\"><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\">MA2020</span><o:p></o:p></p></td><td width=\"545\" style=\"width: 381.75pt; background: rgb(234, 234, 211); padding: 3.75pt; height: 32.25pt;\"><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\"><a href=\"https://mat.iitm.ac.in/btechcourse/ma202.html\" style=\"color: blue; text-decoration: underline;\"><span style=\"color: black;\">Differential Equations</span></a></span><o:p></o:p></p></td></tr><tr style=\"height: 32.25pt;\"><td width=\"69\" style=\"width: 49.5pt; background: rgb(201, 215, 207); padding: 3.75pt; height: 32.25pt;\"><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\">MA2030</span><o:p></o:p></p></td><td width=\"545\" style=\"width: 381.75pt; background: rgb(201, 215, 207); padding: 3.75pt; height: 32.25pt;\"><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><u><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\"><a href=\"https://mat.iitm.ac.in/btechcourse/ma2030.html\" style=\"color: blue;\"><span style=\"color: black;\">Linear Algebra and Numerical Analysis</span></a></span><o:p></o:p></u></p><u></u></td></tr><tr style=\"height: 30.75pt;\"><td style=\"width: 49.5pt; background: rgb(234, 234, 211); padding: 3.75pt; height: 30.75pt;\"><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\">MA2031</span><o:p></o:p></p></td><td style=\"width: 381.75pt; background: rgb(234, 234, 211); padding: 3.75pt; height: 30.75pt;\"><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\"><a href=\"https://mat.iitm.ac.in/btechcourse/ma2031.html\" style=\"color: blue; text-decoration: underline;\"><span style=\"color: black;\">Linear Algebra for Engineers</span></a></span><o:p></o:p></p></td></tr><tr style=\"height: 32.25pt;\"><td width=\"69\" style=\"width: 49.5pt; background: rgb(201, 215, 207); padding: 3.75pt; height: 32.25pt;\"><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\">MA2040</span><o:p></o:p></p></td><td width=\"545\" style=\"width: 381.75pt; background: rgb(201, 215, 207); padding: 3.75pt; height: 32.25pt;\"><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><u><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\"><a href=\"https://mat.iitm.ac.in/btechcourse/ma2040.html\" style=\"color: blue;\"><span style=\"color: black;\">Probability,Stochastic process and Statistics</span></a></span><o:p></o:p></u></p><u></u></td></tr><tr style=\"height: 30.75pt;\"><td style=\"width: 49.5pt; background: rgb(234, 234, 211); padding: 3.75pt; height: 30.75pt;\"><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\">MA2060</span><o:p></o:p></p></td><td style=\"width: 381.75pt; background: rgb(234, 234, 211); padding: 3.75pt; height: 30.75pt;\"><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\"><a href=\"https://mat.iitm.ac.in/btechcourse/ma2060.html\" style=\"color: blue; text-decoration: underline;\"><span style=\"color: black;\">Discrete Mathematics</span></a></span><o:p></o:p></p></td></tr><tr style=\"height: 30.75pt;\"><td width=\"69\" style=\"width: 49.5pt; background: rgb(201, 215, 207); padding: 3.75pt; height: 30.75pt;\"><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\">MA2130</span><o:p></o:p></p></td><td width=\"545\" style=\"width: 381.75pt; background: rgb(201, 215, 207); padding: 3.75pt; height: 30.75pt;\"><p class=\"MsoNormal\" style=\"margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><span style=\"font-family: &quot;Trebuchet MS&quot;, sans-serif;\"><a href=\"https://mat.iitm.ac.in/btechcourse/ma2130.html\" style=\"color: blue; text-decoration: underline;\"><span style=\"color: black;\">Basic Graph Theory</span></a></span><o:p></o:p></p></td></tr><tr style=\"height: 30.75pt;\"><td colspan=\"2\" style=\"width: 49.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; padding: 3.75pt; height: 12.75pt;\"><div align=\"center\"></div></td></tr></tbody></table><p style=\"margin-right: 0in; margin-left: 0in; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\"><br></p></div></td></tr></tbody></table></div><p style=\"margin-right: 0in; margin-left: 0in; font-size: medium; font-family: &quot;Times New Roman&quot;, serif; color: rgb(0, 0, 0); background-color: rgb(223, 223, 223);\"><br></p>',14,'2016-09-26 20:04:18','2016-09-26 14:44:34');

/*!40000 ALTER TABLE `othercourses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_reminders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_reminders`;

CREATE TABLE `password_reminders` (
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `token` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table programs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `programs`;

CREATE TABLE `programs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `program_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_total_sem` int(11) NOT NULL,
  `program_created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `overview` text COLLATE utf8_unicode_ci NOT NULL,
  `otherdetails` text COLLATE utf8_unicode_ci,
  `selection` text COLLATE utf8_unicode_ci NOT NULL,
  `strictureofprogram` text COLLATE utf8_unicode_ci NOT NULL,
  `carrer` text COLLATE utf8_unicode_ci NOT NULL,
  `orderinmenu` int(11) NOT NULL,
  `disable_students` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `programs` WRITE;
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;

INSERT INTO `programs` (`id`, `program_name`, `program_total_sem`, `program_created_by`, `created_at`, `updated_at`, `overview`, `otherdetails`, `selection`, `strictureofprogram`, `carrer`, `orderinmenu`, `disable_students`)
VALUES
	(1,'M.Sc',4,14,'2016-09-26 04:18:21','2017-02-27 17:09:14','The 4-semester M.Sc programme is carefully designed to impart essential knowledge in Mathematics with opportunities for specialization in all major areas of pure and applied mathematics. In the first three semesters the focus is on core courses. In the last semester the students have the option to choose courses from a list of special topics. Several, viva voce and project dissertations are integral part of the programme. A limited number of courses offered by the department of computer science and engineering can also be opted as electives.','\n									      test						                ','Admission to M.Sc. programmes at IIT Madras is open to candidates qualified in JAM -Joint Admission Test to M.Sc. JAM is an allIndia common admission test for candidates seeking admission to Post Graduate programmes in Science subjects in all IITs.','The program consists of 4 semesters and has a total credit of 72','The course structure enables students to get admission for higher studies in India and abroad in Mathematics, Computer Science and Management. They also get placement in Industries and Educational Institutions. Of late, software industry has shown special',0,0),
	(2,'M.Tech',2,14,'2016-09-26 10:44:53','2016-09-26 11:39:01','Department conducts various research activities both fundamental and applied. The department offers guidance in the following broad fields of research in Mathematics leading to Doctor of Philosophy degree of the IIT Madras. During the programme the research scholars interact with the faculty and students of the parent as well as sister departments and take courses necessary for their research. The weekly seminars of the department help them to come in contact with eminent visiting mathematicians and scientists from India and abroad. The duration of programme is 2-5 years.',NULL,'All the candidates called for interview are asked to come prepared with at least two areas. They are informed about existing areas in the Ph.D. admission brochure and also the web site of the department. All the faculty members are invited to attend the interviews. In the interview, candidates are questioned mainly in their preferred areas. At the time of final selection, guides for selected students are tentatively decided. This is just to ensure the availability of guides. At the time of joining, the selected students are informed about these tentative guides. However they are free to meet other faculty members from the same area and explore the possibility of working with them.','Comprehensive Examination Every Ph.D. Scholar has to appear in a Comprehensive Examination that is normally conducted at the end of first year. Comprehensive examination will have both written and oral components. Written test is based on two compulsory topics, Linear Algebra and Real Analysis. Written and oral components have separate minimum of 40% to pass and overall minimum for pass is 50%. After successfull completion of comprehensive viva meeting, a research proposal meeting shall be conducted within a year in the form of a seminar. More details can be found in R13 of Ph.D. Ordinances and Regulation','After completion of the programme, the scholars get excellent opportunities to join educational and research institutions in India and abroad. The placement office helps the scholars to get jobs in industries. During the last few years, several of our stu',1,0),
	(3,'Ph.D.',1,14,'2015-12-14 01:21:49','2016-09-26 13:17:07','Department conducts various research activities both fundamental and applied. The department offers guidance in the following broad fields of research in Mathematics leading to Doctor of Philosophy degree of the IIT Madras. During the programme the research scholars interact with the faculty and students of the parent as well as sister departments and take courses necessary for their research. The weekly seminars of the department help them to come in contact with eminent visiting mathematicians and scientists from India and abroad. The duration of programme is 2-5 years.','','All the candidates called for interview are asked to come prepared with at least two areas. They are informed about existing areas in the Ph.D. admission brochure and also the web site of the department. All the faculty members are invited to attend the interviews. In the interview, candidates are questioned mainly in their preferred areas. At the time of final selection, guides for selected students are tentatively decided. This is just to ensure the availability of guides. At the time of joining, the selected students are informed about these tentative guides. However they are free to meet other faculty members from the same area and explore the possibility of working with them.','Comprehensive Examination Every Ph.D. Scholar has to appear in a Comprehensive Examination that is normally conducted at the end of first year. Comprehensive examination will have both written and oral components. Written test is based on two compulsory topics, Linear Algebra and Real Analysis. Written and oral components have separate minimum of 40% to pass and overall minimum for pass is 50%. After successfull completion of comprehensive viva meeting, a research proposal meeting shall be conducted within a year in the form of a seminar. More details can be found in R13 of Ph.D. Ordinances and Regulation','After completion of the programme, the scholars get excellent opportunities to join educational and research institutions in India and abroad. The placement office helps the scholars to get jobs in industries. During the last few years, several of our students have joined software industries through campus interviews.',2,0);

/*!40000 ALTER TABLE `programs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table publications
# ------------------------------------------------------------

DROP TABLE IF EXISTS `publications`;

CREATE TABLE `publications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `author` text COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `volume` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abstract` text COLLATE utf8_unicode_ci,
  `attachment` text COLLATE utf8_unicode_ci,
  `research_group` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `pages` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `journal` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `added_by` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bibtexkey` text COLLATE utf8_unicode_ci,
  `x_bibtex_type` text COLLATE utf8_unicode_ci,
  `number` text COLLATE utf8_unicode_ci,
  `timestamp` text COLLATE utf8_unicode_ci,
  `biburl` text COLLATE utf8_unicode_ci,
  `bibsource` text COLLATE utf8_unicode_ci,
  `_author` text COLLATE utf8_unicode_ci,
  `fjournal` text COLLATE utf8_unicode_ci,
  `issn` text COLLATE utf8_unicode_ci,
  `mrclass` text COLLATE utf8_unicode_ci,
  `mrnumber` text COLLATE utf8_unicode_ci,
  `booktitle` text COLLATE utf8_unicode_ci,
  `month` text COLLATE utf8_unicode_ci,
  `crossref` text COLLATE utf8_unicode_ci,
  `editor` text COLLATE utf8_unicode_ci,
  `series` text COLLATE utf8_unicode_ci,
  `publisher` text COLLATE utf8_unicode_ci,
  `isbn` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `publications` WRITE;
/*!40000 ALTER TABLE `publications` DISABLE KEYS */;

INSERT INTO `publications` (`id`, `title`, `author`, `year`, `volume`, `abstract`, `attachment`, `research_group`, `pages`, `doi`, `journal`, `created_at`, `updated_at`, `added_by`, `url`, `bibtexkey`, `x_bibtex_type`, `number`, `timestamp`, `biburl`, `bibsource`, `_author`, `fjournal`, `issn`, `mrclass`, `mrnumber`, `booktitle`, `month`, `crossref`, `editor`, `series`, `publisher`, `isbn`)
VALUES
	(5,'Axiomatic characterization of the interval function of a block graph','Balakrishnan, Kannan and Changat, Manoj and Lakshmikuttyamma, Anandavally K. and Mathew, Joseph and Mulder, Henry Martyn and Narasimha-Shenoi, Prasanth G. and Narayanan, N.','2015','338','',NULL,'0','885â€“894','10.1016/j.disc.2015.01.004','Discrete Math.','0000-00-00 00:00:00','0000-00-00 00:00:00',0,'http://dx.doi.org/10.1016/j.disc.2015.01.004','MR3318627','article','6',NULL,NULL,NULL,'<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Kannan Balakrishnan</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Manoj Changat</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Anandavally K. Lakshmikuttyamma</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Joseph Mathew</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Henry Martyn Mulder</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Prasanth G. Narasimha-Shenoi</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">N. Narayanan</span>','Discrete Mathematics','0012-365X','05C12 (05C05)','3318627',NULL,NULL,'','','','',''),
	(7,'Testing import of bib','Alok kumar, Alokation','2016','338','',NULL,'0','885â€“894','10.1016/j.disc.2015.01.004','Deptcms','0000-00-00 00:00:00','0000-00-00 00:00:00',0,'http://dx.doi.org/10.1016/j.disc.2015.01.004','TEST','article','6',NULL,NULL,NULL,'<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Alokation Alok kumar</span>','Discrete Mathematics','0012-365X','05C12 (05C05)','3318627',NULL,NULL,'','','','',''),
	(17,'Testing import of bibs','AAlok kumar, Alokation','2016','338  ','',NULL,'0','885â€“894','10.1016/j.disc.2015.01.004','Deptcms','0000-00-00 00:00:00','2016-09-25 05:58:12',14,'','TEST1','article','6',NULL,NULL,NULL,'<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Alokation AAlok kumar</span>','Discrete Mathematics','0012-365X','05C12 (05C05)','3318627',NULL,NULL,'','','','',''),
	(18,'Improved bounds on Acyclic edge colouring','Rahul Muthu and Narayanan N and C R Subramanian','2005','5  ','',NULL,'0','437-442','','Discrete Applied Mathematics','0000-00-00 00:00:00','2017-02-16 05:26:44',185,'','dam_impr','ARTICLE',NULL,NULL,NULL,NULL,'<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Rahul Muthu</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Narayanan N</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">C R Subramanian</span>',NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(19,'On Acyclic Edge Colouring Planar Graphs','Anna Fiedorowicz and Mariusz Ha&#322uszczak and Narayanan N','2007','','',NULL,'0','','','Submitted','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'','planar_acyc','Article',NULL,NULL,NULL,NULL,'<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Anna Fiedorowicz</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Mariusz Ha&#322uszczak</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Narayanan N</span>',NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(21,'Improved bounds on Acyclic Edge Colouring','Rahul Muthu and Narayanan N and C R Subramanian','2005','','',NULL,'0','171-177','','ENDM, Proceedings of GRACO','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'','endm_impr','Article',NULL,NULL,NULL,NULL,'<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Rahul Muthu</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Narayanan N</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">C R Subramanian</span>',NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(22,'Acyclic Edge Colourings of Outerplanar Graphs','Rahul Muthu and Narayanan N and C R Subramanian','2007','4508','',NULL,'0','144-152','','LNCS, proceedings of AAIM','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'','outer','Article',NULL,NULL,NULL,NULL,'<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Rahul Muthu</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Narayanan N</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">C R Subramanian</span>',NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(23,'K-intersection Colouring','Rahul Muthu and Narayanan N and C R Subramanian','2007','','',NULL,'0','','','','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'','kint','inproceedings',NULL,NULL,NULL,NULL,'<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Rahul Muthu</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Narayanan N</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">C R Subramanian</span>',NULL,NULL,NULL,NULL,'Proceedings of Colourings Independence and Domination 2007','September','','','','',''),
	(24,'MRKLNJON','jinsfjiv','2013','32',NULL,'','0','23','dvnjn','k fdvn','2016-09-24 13:20:40','2016-09-24 13:20:40',14,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(25,'oanwf d','ijnserg ','2302','234    ',NULL,'','0','1','kndf vb','ijrg ','2016-09-25 05:58:39','2016-09-25 06:21:07',14,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(26,'oqeg','jinwgq','2013','4t3',NULL,'','0','','','je g ','2016-09-25 06:20:27','2016-09-25 06:20:27',14,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(27,'pub','auth','2013','jind',NULL,'','0','','','nerghib','2016-09-25 07:44:50','2016-09-25 07:44:50',14,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(28,'test','alok','2014','12',NULL,'','10','2','s','ndi','2016-09-27 01:50:18','2016-09-27 01:50:18',14,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(29,'tttvy','jn','2012','12',NULL,'','10','32','mk','j j','2016-09-27 01:58:58','2016-09-27 01:58:58',14,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(30,'qw','q3g','2012','23',NULL,'','10','wrgq','fwrf','qerg','2016-09-27 02:08:00','2016-09-27 02:08:00',14,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(31,'asdf','klnwr','2103','12',NULL,'','1110','dq','wwef','wef','2016-09-27 02:32:51','2016-09-27 02:32:51',14,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(32,'tester','qerg','2123','32',NULL,'','\'11,10\'','23','23','rewg','2016-09-27 03:16:57','2016-09-27 03:16:57',14,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(33,'qwer','wreth','2123','2',NULL,'','11,10','rwf','bgw','gwb','2016-09-27 03:18:19','2016-09-27 03:18:19',14,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(34,'Partitioning a Graph into Highly Connected Subgraphs','Valentin Borozan and Michael Ferrara and Shinya Fujita and Michitaka Furuya and Yannis Manoussakis and Narayanan Narayanan and Derrick Stolee','2016','82',NULL,NULL,'0','322â€“333','10.1002/jgt.21904','Journal of Graph Theory','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'http://dx.doi.org/10.1002/jgt.21904','DBLP:journals-jgt-BorozanFFFMNS16','article','3','Thu, 09 Jun 2016 01:00:00 +0200','http://dblp.uni-trier.de/rec/bib/journals/jgt/BorozanFFFMNS16','dblp computer science bibliography, http://dblp.org','<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Valentin Borozan</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Michael Ferrara</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Shinya Fujita</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Michitaka Furuya</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Yannis Manoussakis</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Narayanan Narayanan</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Derrick Stolee</span>',NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(35,'Axiomatic Characterization of Claw and Paw-Free Graphs Using Graph Transit Functions','Manoj Changat and Ferdoos Hossein Nezhad and Narayanan Narayanan','2016','',NULL,NULL,'0','115â€“125','10.1007/978-3-319-29221-2_10','','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'http://dx.doi.org/10.1007/978-3-319-29221-2_10','DBLP:conf-caldam-ChangatNN16','inproceedings',NULL,'Mon, 15 Feb 2016 12:07:10 +0100','http://dblp.uni-trier.de/rec/bib/conf/caldam/ChangatNN16','dblp computer science bibliography, http://dblp.org','<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Manoj Changat</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Ferdoos Hossein Nezhad</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Narayanan Narayanan</span>',NULL,NULL,NULL,NULL,'Algorithms and Discrete Applied Mathematics - Second International Conference, CALDAM 2016, Thiruvananthapuram, India, February 18-20, 2016, Proceedings',NULL,'DBLP:conf/caldam/2016','','','',''),
	(36,'Tropical Dominating Sets in Vertex-Coloured Graphs','Jean-Alexandre AnglÃ¨s d\'Auriac and Csilla BujtÃ¡s and Hakim El Maftouhi and Marek Karpinski and Yannis Manoussakis and Leandro Montero and Narayanan Narayanan and Laurent Rosaz and Johan Thapper and Zsolt Tuza','2016','',NULL,NULL,'0','17â€“27','10.1007/978-3-319-30139-6_2','','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'http://dx.doi.org/10.1007/978-3-319-30139-6_2','DBLP:conf-walcom-dAuriacBMKMMNRT16','inproceedings',NULL,'Tue, 08 Mar 2016 12:16:00 +0100','http://dblp.uni-trier.de/rec/bib/conf/walcom/dAuriacBMKMMNRT16','dblp computer science bibliography, http://dblp.org','<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Jean-Alexandre AnglÃ¨s d\'Auriac</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Csilla BujtÃ¡s</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Hakim El Maftouhi</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Marek Karpinski</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Yannis Manoussakis</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Leandro Montero</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Narayanan Narayanan</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Laurent Rosaz</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Johan Thapper</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Zsolt Tuza</span>',NULL,NULL,NULL,NULL,'WALCOM: Algorithms and Computation - 10th International Workshop, WALCOM 2016, Kathmandu, Nepal, March 29-31, 2016, Proceedings',NULL,'DBLP:conf/walcom/2016','','','',''),
	(37,'Axiomatic characterization of the interval function of a block graph','Kannan Balakrishnan and Manoj Changat and Anandavally K. Lakshmikuttyamma and Joseph Mathews and Henry Martyn Mulder and Prasanth G. Narasimha-Shenoi and N. Narayanan','2015','338',NULL,NULL,'0','885â€“894','10.1016/j.disc.2015.01.004','Discrete Mathematics','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'http://dx.doi.org/10.1016/j.disc.2015.01.004','DBLP:journals-dm-BalakrishnanCLM15','article','6','Tue, 03 Mar 2015 00:00:00 +0100','http://dblp.uni-trier.de/rec/bib/journals/dm/BalakrishnanCLM15','dblp computer science bibliography, http://dblp.org','<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Kannan Balakrishnan</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Manoj Changat</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Anandavally K. Lakshmikuttyamma</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Joseph Mathews</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Henry Martyn Mulder</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Prasanth G. Narasimha-Shenoi</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">N. Narayanan</span>',NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(38,'Tropical Dominating Sets in Vertex-Coloured Graphs','Jean-Alexandre AnglÃ¨s d\'Auriac and Csilla BujtÃ¡s and Hakim El Maftouhi and Marek Karpinski and Yannis Manoussakis and Leandro Montero and N. Narayanan and Laurent Rosaz and Johan Thapper and Zsolt Tuza','2015','abs/1503.01008',NULL,NULL,'0','','','CoRR','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'http://arxiv.org/abs/1503.01008','DBLP:journals-corr-dAuriacBMKMMNRT15','article',NULL,'Wed, 09 Mar 2016 00:00:00 +0100','http://dblp.uni-trier.de/rec/bib/journals/corr/dAuriacBMKMMNRT15','dblp computer science bibliography, http://dblp.org','<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Jean-Alexandre AnglÃ¨s d\'Auriac</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Csilla BujtÃ¡s</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Hakim El Maftouhi</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Marek Karpinski</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Yannis Manoussakis</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Leandro Montero</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">N. Narayanan</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Laurent Rosaz</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Johan Thapper</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Zsolt Tuza</span>',NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(39,'Strong Chromatic Index of 2-Degenerate Graphs','Gerard Jennhwa Chang and N. Narayanan','2013','73',NULL,NULL,'0','119â€“126','10.1002/jgt.21646','Journal of Graph Theory','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'http://dx.doi.org/10.1002/jgt.21646','DBLP:journals-jgt-ChangN13','article','2','Tue, 23 Apr 2013 01:00:00 +0200','http://dblp.uni-trier.de/rec/bib/journals/jgt/ChangN13','dblp computer science bibliography, http://dblp.org','<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Gerard Jennhwa Chang</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">N. Narayanan</span>',NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(40,'Further results on strong edge-colourings in outerplanar graphs','Valentin Borozan and Leandro Montero and Narayanan Narayanan','2013','abs/1312.5620',NULL,NULL,'0','','','CoRR','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'http://arxiv.org/abs/1312.5620','DBLP:journals-corr-BorozanMN13','article',NULL,'Tue, 10 Feb 2015 00:00:00 +0100','http://dblp.uni-trier.de/rec/bib/journals/corr/BorozanMN13','dblp computer science bibliography, http://dblp.org','<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Valentin Borozan</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Leandro Montero</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Narayanan Narayanan</span>',NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(41,'Oriented colouring of some graph products','N. R. Aravind and N. Narayanan and C. R. Subramanian','2011','31',NULL,NULL,'0','675â€“686','10.7151/dmgt.1572','Discussiones Mathematicae Graph Theory','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'http://dx.doi.org/10.7151/dmgt.1572','DBLP:journals-dmgt-AravindNS11','article','4','Thu, 15 Nov 2012 00:00:00 +0100','http://dblp.uni-trier.de/rec/bib/journals/dmgt/AravindNS11','dblp computer science bibliography, http://dblp.org','<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">N. R. Aravind</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">N. Narayanan</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">C. R. Subramanian</span>',NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(42,'Minimally 2-connected graphs and colouring problems','N. Narayanan','2011','',NULL,NULL,'0','215â€“218','','','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'http://ctw2011.dia.uniroma3.it/ctw_proceedings.pdfpage=227','DBLP:conf-colognetwente-Narayanan11','inproceedings',NULL,'Sat, 15 Oct 2011 11:33:29 +0200','http://dblp.uni-trier.de/rec/bib/conf/colognetwente/Narayanan11','dblp computer science bibliography, http://dblp.org','<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">N. Narayanan</span>',NULL,NULL,NULL,NULL,'Proceedings of the 10th Cologne-Twente Workshop on graphs and combinatorial optimization. Extended Abstracts, Villa Mondragone, Frascati, Italy, June 14-16, 2011',NULL,'DBLP:conf/colognetwente/2011','','','',''),
	(43,'Optimal acyclic edge colouring of grid like graphs','Rahul Muthu and N. Narayanan and C. R. Subramanian','2010','310',NULL,NULL,'0','2769â€“2775','10.1016/j.disc.2010.05.033','Discrete Mathematics','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'http://dx.doi.org/10.1016/j.disc.2010.05.033','DBLP:journals-dm-MuthuNS10','article','21','Tue, 07 Sep 2010 01:00:00 +0200','http://dblp.uni-trier.de/rec/bib/journals/dm/MuthuNS10','dblp computer science bibliography, http://dblp.org','<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Rahul Muthu</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">N. Narayanan</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">C. R. Subramanian</span>',NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(44,'On \\emphk-intersection edge colourings','Rahul Muthu and N. Narayanan and C. R. Subramanian','2009','29',NULL,NULL,'0','411â€“418','10.7151/dmgt.1456','Discussiones Mathematicae Graph Theory','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'http://dx.doi.org/10.7151/dmgt.1456','DBLP:journals-dmgt-MuthuNS09','article','2','Thu, 15 Nov 2012 00:00:00 +0100','http://dblp.uni-trier.de/rec/bib/journals/dmgt/MuthuNS09','dblp computer science bibliography, http://dblp.org','<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Rahul Muthu</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">N. Narayanan</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">C. R. Subramanian</span>',NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(45,'About acyclic edge colourings of planar graphs','Anna Fiedorowicz and Mariusz Haluszczak and Narayanan Narayanan','2008','108',NULL,NULL,'0','412â€“417','10.1016/j.ipl.2008.07.016','Inf. Process. Lett.','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'http://dx.doi.org/10.1016/j.ipl.2008.07.016','DBLP:journals-ipl-FiedorowiczHN08','article','6','Wed, 14 Jan 2009 00:00:00 +0100','http://dblp.uni-trier.de/rec/bib/journals/ipl/FiedorowiczHN08','dblp computer science bibliography, http://dblp.org','<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Anna Fiedorowicz</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Mariusz Haluszczak</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Narayanan Narayanan</span>',NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(46,'Improved bounds on acyclic edge colouring','Rahul Muthu and N. Narayanan and C. R. Subramanian','2007','307',NULL,NULL,'0','3063â€“3069','10.1016/j.disc.2007.03.006','Discrete Mathematics','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'http://dx.doi.org/10.1016/j.disc.2007.03.006','DBLP:journals-dm-MuthuNS07','article','23','Thu, 21 Feb 2008 00:00:00 +0100','http://dblp.uni-trier.de/rec/bib/journals/dm/MuthuNS07','dblp computer science bibliography, http://dblp.org','<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Rahul Muthu</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">N. Narayanan</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">C. R. Subramanian</span>',NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(47,'Acyclic Edge Colouring of Outerplanar Graphs','Rahul Muthu and N. Narayanan and C. R. Subramanian','2007','',NULL,NULL,'0','144â€“152','10.1007/978-3-540-72870-2_14','','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'http://dx.doi.org/10.1007/978-3-540-72870-2_14','DBLP:conf-aaim-MuthuNS07','inproceedings',NULL,'Thu, 28 Jun 2007 15:14:59 +0200','http://dblp.uni-trier.de/rec/bib/conf/aaim/MuthuNS07','dblp computer science bibliography, http://dblp.org','<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Rahul Muthu</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">N. Narayanan</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">C. R. Subramanian</span>',NULL,NULL,NULL,NULL,'Algorithmic Aspects in Information and Management, Third International Conference, AAIM 2007, Portland, OR, USA, June 6-8, 2007, Proceedings',NULL,'DBLP:conf/aaim/2007','','','',''),
	(48,'Optimal Acyclic Edge Colouring of Grid Like Graphs','Rahul Muthu and N. Narayanan and C. R. Subramanian','2006','',NULL,NULL,'0','360â€“367','10.1007/11809678_38','','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'http://dx.doi.org/10.1007/11809678_38','DBLP:conf-cocoon-MuthuNS06','inproceedings',NULL,'Tue, 05 Dec 2006 12:44:41 +0100','http://dblp.uni-trier.de/rec/bib/conf/cocoon/MuthuNS06','dblp computer science bibliography, http://dblp.org','<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Rahul Muthu</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">N. Narayanan</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">C. R. Subramanian</span>',NULL,NULL,NULL,NULL,'Computing and Combinatorics, 12th Annual International Conference, COCOON 2006, Taipei, Taiwan, August 15-18, 2006, Proceedings',NULL,'DBLP:conf/cocoon/2006','','','',''),
	(49,'Improved bounds on acyclic edge colouring','Rahul Muthu and N. Narayanan and C. R. Subramanian','2005','19',NULL,NULL,'0','171â€“177','10.1016/j.endm.2005.05.024','Electronic Notes in Discrete Mathematics','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'http://dx.doi.org/10.1016/j.endm.2005.05.024','DBLP:journals-endm-MuthuNS05','article',NULL,'Thu, 05 Mar 2009 00:00:00 +0100','http://dblp.uni-trier.de/rec/bib/journals/endm/MuthuNS05','dblp computer science bibliography, http://dblp.org','<span itemprop=\"author\" itemtype=\"http://schema.org/Person\">Rahul Muthu</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">N. Narayanan</span>, <span itemprop=\"author\" itemtype=\"http://schema.org/Person\">C. R. Subramanian</span>',NULL,NULL,NULL,NULL,NULL,NULL,'','','','',''),
	(50,'Algorithms and Discrete Applied Mathematics - Second International Conference, CALDAM 2016, Thiruvananthapuram, India, February 18-20, 2016, Proceedings','','2016','9602',NULL,NULL,'0','','10.1007/978-3-319-29221-2','','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'http://dx.doi.org/10.1007/978-3-319-29221-2','DBLP:conf-caldam-2016','proceedings',NULL,'Mon, 15 Feb 2016 12:07:10 +0100','http://dblp.uni-trier.de/rec/bib/conf/caldam/2016','dblp computer science bibliography, http://dblp.org',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','Sathish Govindarajan and Anil Maheshwari','Lecture Notes in Computer Science','Springer','978-3-319-29220-5'),
	(51,'WALCOM: Algorithms and Computation - 10th International Workshop, WALCOM 2016, Kathmandu, Nepal, March 29-31, 2016, Proceedings','','2016','9627',NULL,NULL,'0','','10.1007/978-3-319-30139-6','','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'http://dx.doi.org/10.1007/978-3-319-30139-6','DBLP:conf-walcom-2016','proceedings',NULL,'Tue, 08 Mar 2016 12:16:00 +0100','http://dblp.uni-trier.de/rec/bib/conf/walcom/2016','dblp computer science bibliography, http://dblp.org',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','Mohammad Kaykobad and Rossella Petreschi','Lecture Notes in Computer Science','Springer','978-3-319-30138-9'),
	(52,'Proceedings of the 10th Cologne-Twente Workshop on graphs and combinatorial optimization. Extended Abstracts, Villa Mondragone, Frascati, Italy, June 14-16, 2011','','2011','',NULL,NULL,'0','','','','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'','DBLP:conf-colognetwente-2011','proceedings',NULL,'Sat, 15 Oct 2011 11:33:29 +0200','http://dblp.uni-trier.de/rec/bib/conf/colognetwente/2011','dblp computer science bibliography, http://dblp.org',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','Ludovica Adacher and Marta Flamini and Gianmaria Leo and Gaia Nicosia and Andrea Pacifici and Veronica Piccialli','','',''),
	(53,'Algorithmic Aspects in Information and Management, Third International Conference, AAIM 2007, Portland, OR, USA, June 6-8, 2007, Proceedings','','2007','4508',NULL,NULL,'0','','','','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'','DBLP:conf-aaim-2007','proceedings',NULL,'Thu, 28 Jun 2007 15:14:59 +0200','http://dblp.uni-trier.de/rec/bib/conf/aaim/2007','dblp computer science bibliography, http://dblp.org',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','Ming-Yang Kao and Xiang-Yang Li','Lecture Notes in Computer Science','Springer','978-3-540-72868-9'),
	(54,'Computing and Combinatorics, 12th Annual International Conference, COCOON 2006, Taipei, Taiwan, August 15-18, 2006, Proceedings','','2006','4112',NULL,NULL,'0','','','','0000-00-00 00:00:00','0000-00-00 00:00:00',185,'','DBLP:conf-cocoon-2006','proceedings',NULL,'Tue, 05 Dec 2006 12:44:41 +0100','http://dblp.uni-trier.de/rec/bib/conf/cocoon/2006','dblp computer science bibliography, http://dblp.org',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','Danny Z. Chen and D. T. Lee','Lecture Notes in Computer Science','Springer','3-540-36925-2');

/*!40000 ALTER TABLE `publications` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table researchgroup
# ------------------------------------------------------------

DROP TABLE IF EXISTS `researchgroup`;

CREATE TABLE `researchgroup` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `researchgroup_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `researchgroup_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `researchgroup_users` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `researchgroup` WRITE;
/*!40000 ALTER TABLE `researchgroup` DISABLE KEYS */;

INSERT INTO `researchgroup` (`id`, `researchgroup_name`, `researchgroup_desc`, `researchgroup_users`, `created_at`, `updated_at`)
VALUES
	(8,'Combinatorial Commutative Algebra','Several Algebraic problems have deep combinatorial structural properties. Studying this connection has shown promise in designing tools for algebraic manipulation. The CCA research group looks at graph based algebraic structures in this connection.','185','2015-12-14 12:15:47','2016-04-30 10:27:06'),
	(10,'Graph Algorithms','Algorithmic graph theory problems','185,14','2016-04-30 10:25:47','2016-09-26 20:38:38'),
	(11,'Graph Theory','Group of people working in structural graph theory: Colouring, Decomposition, probabilistic method, ramsey type problems.',',14','2016-07-26 04:11:57','2016-09-26 20:38:38'),
	(12,'Algebra and Number Theory','Algebra and Number theory','','2016-07-26 04:12:50','2016-07-26 04:12:50'),
	(13,'Analysis','People working in Alanysis related problems','','2016-07-26 04:13:12','2016-07-26 04:13:12'),
	(14,'Geometry and Topology','People working in problems related to Geometry and Topology','','2016-07-26 04:13:52','2016-07-26 04:13:52'),
	(15,'Applied Mathematics','Fuild Mechanics, Applied Differential Equations ','','2016-07-26 04:15:02','2016-07-26 04:15:02');

/*!40000 ALTER TABLE `researchgroup` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table researchinfo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `researchinfo`;

CREATE TABLE `researchinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `researchinfo_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `researchinfo_image` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `researchinfo` WRITE;
/*!40000 ALTER TABLE `researchinfo` DISABLE KEYS */;

INSERT INTO `researchinfo` (`id`, `researchinfo_desc`, `researchinfo_image`, `created_at`, `updated_at`)
VALUES
	(2,'<span style=\"font-weight: bold;\"></span><table class=\"table table-bordered\" style=\"width: 1362px; height: 73px;\"><tbody><tr><td><span style=\"font-weight: bold;\">Algebra, Geometry &amp; Topolgy</span></td><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td>Commutative Algebra<br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table>\n                                  \n                                  \n                                  \n                                  <span style=\"font-weight: bold;\">Combinatorics</span><br>                                                                                                                                                                                                                  ','','2015-12-14 11:51:33','2017-04-11 05:30:29');

/*!40000 ALTER TABLE `researchinfo` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table resource_album
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resource_album`;

CREATE TABLE `resource_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `resource_album_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resource_album_created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `resource_album` WRITE;
/*!40000 ALTER TABLE `resource_album` DISABLE KEYS */;

INSERT INTO `resource_album` (`id`, `resource_album_name`, `resource_album_created_by`, `created_at`, `updated_at`)
VALUES
	(25,'Forays','185','2016-02-27 09:12:08','2016-02-27 09:12:08'),
	(26,'Test','185','2016-11-11 05:19:50','2016-11-11 05:19:50'),
	(27,'Test','185','2016-12-17 08:17:15','2016-12-17 08:17:15');

/*!40000 ALTER TABLE `resource_album` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table resource_document
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resource_document`;

CREATE TABLE `resource_document` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `resource_document_title` text COLLATE utf8_unicode_ci NOT NULL,
  `resource_document_body` text COLLATE utf8_unicode_ci NOT NULL,
  `resource_document_link` text COLLATE utf8_unicode_ci NOT NULL,
  `resource_document_file` text COLLATE utf8_unicode_ci NOT NULL,
  `resource_document_created_by` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `needlogin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `resource_document` WRITE;
/*!40000 ALTER TABLE `resource_document` DISABLE KEYS */;

INSERT INTO `resource_document` (`id`, `resource_document_title`, `resource_document_body`, `resource_document_link`, `resource_document_file`, `resource_document_created_by`, `created_at`, `updated_at`, `needlogin`)
VALUES
	(2,'hOW TO WRITE MATH','Writing Mathematics','http://google.com','','185','2016-11-11 05:25:39','2016-11-11 05:25:39',0);

/*!40000 ALTER TABLE `resource_document` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table resource_gallery
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resource_gallery`;

CREATE TABLE `resource_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `resource_gallery_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resource_gallery_album_id` int(11) NOT NULL,
  `resource_gallery_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resource_gallery_size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resource_gallery_originalname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resource_gallery_filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resource_gallery_uploaded_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `resource_gallery` WRITE;
/*!40000 ALTER TABLE `resource_gallery` DISABLE KEYS */;

INSERT INTO `resource_gallery` (`id`, `resource_gallery_text`, `resource_gallery_album_id`, `resource_gallery_type`, `resource_gallery_size`, `resource_gallery_originalname`, `resource_gallery_filename`, `resource_gallery_uploaded_by`, `created_at`, `updated_at`)
VALUES
	(4,'',0,'image/jpeg','614','gallery_54ffe8f97ec11.jpg','gallery_56a4e525c60d4.jpg','14','2016-01-24 14:52:21','2016-01-24 14:52:21'),
	(5,'',26,'image/gif','1030','anim1.gif','gallery_5825557e71292.gif','185','2016-11-11 05:22:06','2016-11-11 05:22:06'),
	(6,'',26,'image/gif','1030','anim1.gif','gallery_5825557e718a9.gif','185','2016-11-11 05:22:06','2016-11-11 05:22:06'),
	(7,'',26,'image/jpeg','572','Prof. Balasubramanian.jpg','gallery_5825557e78762.jpg','185','2016-11-11 05:22:06','2016-11-11 05:22:06'),
	(8,'',26,'image/jpeg','572','Prof. Balasubramanian.jpg','gallery_5825557e82a96.jpg','185','2016-11-11 05:22:06','2016-11-11 05:22:06'),
	(9,'',25,'image/gif','1030','anim1.gif','gallery_582555c00f502.gif','185','2016-11-11 05:23:12','2016-11-11 05:23:12'),
	(10,'',25,'image/gif','1030','anim1.gif','gallery_582555c011943.gif','185','2016-11-11 05:23:12','2016-11-11 05:23:12'),
	(11,'',25,'image/jpeg','572','Prof. Balasubramanian.jpg','gallery_582555c020122.jpg','185','2016-11-11 05:23:12','2016-11-11 05:23:12'),
	(12,'',25,'image/jpeg','572','Prof. Balasubramanian.jpg','gallery_582555c028dde.jpg','185','2016-11-11 05:23:12','2016-11-11 05:23:12'),
	(13,'',25,'image/jpeg','572','Prof. Balasubramanian.jpg','gallery_582555d6a86e3.jpg','185','2016-11-11 05:23:34','2016-11-11 05:23:34'),
	(14,'',25,'image/jpeg','572','Prof. Balasubramanian.jpg','gallery_582555d6a8858.jpg','185','2016-11-11 05:23:34','2016-11-11 05:23:34'),
	(17,NULL,27,'image/jpeg','266','13584700_10208707626783347_3062681274913052573_o.jpg','gallery_58556bbe0181d.jpg','14','2016-12-17 16:45:50','2016-12-17 16:45:50');

/*!40000 ALTER TABLE `resource_gallery` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table resource_links
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resource_links`;

CREATE TABLE `resource_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `resource_links_title` text COLLATE utf8_unicode_ci NOT NULL,
  `resource_links_link` text COLLATE utf8_unicode_ci NOT NULL,
  `resource_links_created_by` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `needlogin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `resource_links` WRITE;
/*!40000 ALTER TABLE `resource_links` DISABLE KEYS */;

INSERT INTO `resource_links` (`id`, `resource_links_title`, `resource_links_link`, `resource_links_created_by`, `created_at`, `updated_at`, `needlogin`)
VALUES
	(1,'The Institute of Mathematical Sciences, Chennai','http://www.imsc.res.in','14','2015-09-19 07:23:24','2015-09-19 07:23:24',0),
	(2,'Eservices','http://eservices.iitm.ac.in','14','2015-09-19 07:23:57','2015-09-19 07:23:57',1),
	(4,'test','http://test.com','15','2016-03-18 04:13:07','2016-03-18 04:13:07',0),
	(5,'link','http://test.com','15','2016-03-18 04:14:13','2016-03-18 04:14:13',0);

/*!40000 ALTER TABLE `resource_links` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table slider
# ------------------------------------------------------------

DROP TABLE IF EXISTS `slider`;

CREATE TABLE `slider` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slider_order` int(11) NOT NULL,
  `slider_image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_uploaded_by` int(11) NOT NULL,
  `slider_text` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;

INSERT INTO `slider` (`id`, `slider_order`, `slider_image_name`, `slider_uploaded_by`, `slider_text`, `created_at`, `updated_at`)
VALUES
	(2,0,'slide_56d165b34f9bc.jpg',0,'R Balasubramanian, IMSc giving discrete math colloquium on additive combinatorics','2016-02-27 09:00:35','2016-02-27 09:00:35'),
	(3,0,'slide_56d1665a40a89.jpg',0,'Walschmidth on Ramanujan and his life','2016-02-27 09:03:22','2016-02-27 09:03:22');

/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table static_content
# ------------------------------------------------------------

DROP TABLE IF EXISTS `static_content`;

CREATE TABLE `static_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `whichlocation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doneby` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `static_content` WRITE;
/*!40000 ALTER TABLE `static_content` DISABLE KEYS */;

INSERT INTO `static_content` (`id`, `content`, `whichlocation`, `doneby`, `created_at`, `updated_at`)
VALUES
	(2,'\n                                      \n                                      \n                                      \n                                      \n                                      \n                                      \n                                      \n                                      \n                                      \n                                      \n                                      \n                                      \n                                      \n                                      \n                                      <div style=\"text-align: justify; \">Mathematics, hailed as the “Queen of Sciences” by Carl Fredrich Gauss, dreaded by many and loved by an equal number, has progressed rapidly since the beginning of recorded history. Mikhail B. Sevryuk noted in January 2006 that “the number of papers and books included in the Mathematical Reviews database since 1940(the first year of publication of MR) is now more than 1.9 million and about 75 thousand items are added to the database each year”.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\">At IIT Madras, Department of Mathematics was set up in 1960. Abstraction and application rooted in quantitative reasoning sustain all its activities. International Collaboration through MOUs signed by the institute aids the exchange of faculty members and students. Several eminent mathematicians visit the Department from time to time and collaborate with the faculty members of the Department. Research monograph brought out by well-known international publishers from part of the research output of the members of the faculty.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\">The Department conducts research in Algebra, Analysis, Computational &amp; Theoretical Fluid Dynamics, Mathematical Physics, Stochastic Processes, Theoretical Computer Science and Discrete Mathematics.m</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\">The department keeps in pace with the advances in technology, by providing its students with separate and state-of-the-art computer facilities for the M. Sc/M. Tech. and Ph. D students. The students gain knowledge of various new areas of research using the free Internet facilities made available in their labs. The department also has its own library with a large collection of books on Mathematics and Computer Science.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\">The students get the opportunity of attending seminars and invited lectures addressed by eminent mathematicians, faculty members from IIT, professors from other institutes and speakers from other areas of interest.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify; \">The department celebrates the birthday of the great Mathematician, Srinivasa Ramanujan that falls on December 22nd by organizing a National Symposium on Mathematical Methods and Applications (NSMMA). In the month of February, the department gets active with FORAYS, the Math fest, enabling students of colleges in and around Chennai to exchange views on new trends in Mathematics and its Applications.<span role=\"presentation\" data-mathml=\"<math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;><mrow class=&quot;MJX-TeXAtom-ORD&quot;><mi mathvariant=&quot;fraktur&quot;>m</mi></mrow></math>\" style=\"position: relative;\" tabindex=\"0\" id=\"MathJax-Element-1-Frame\" class=\"MathJax\"><nobr><span role=\"math\" id=\"MathJax-Span-6\" class=\"math\"><span style=\"display: inline-block; position: relative; width: 0em; height: 0px; font-size: 125%;\"><span style=\"position: absolute;\"><span id=\"MathJax-Span-7\" class=\"mrow\"><span id=\"MathJax-Span-8\" class=\"texatom\"><span id=\"MathJax-Span-9\" class=\"mrow\"><span style=\"font-family: MathJax_Fraktur;\" id=\"MathJax-Span-10\" class=\"mi\"></span></span></span></span></span></span></span></nobr></span><span style=\"color: inherit;\" class=\"MathJax_Preview\"></span><span tabindex=\"0\" id=\"MathJax-Element-1-Frame\" class=\"MathJax MathJax_Processing\"></span><script id=\"MathJax-Element-1\" type=\"math/tex\">\\mathfrak{m}</script><br></div>                                                                                                      ','home',14,'0000-00-00 00:00:00','2016-03-16 18:51:35'),
	(3,'No content uploaded','videos',14,'0000-00-00 00:00:00','2015-09-18 04:31:59');

/*!40000 ALTER TABLE `static_content` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table students
# ------------------------------------------------------------

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_rollno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_guide_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_program_id` int(11) NOT NULL,
  `student_year` int(11) NOT NULL,
  `student_added_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `temp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;

INSERT INTO `students` (`id`, `student_name`, `student_rollno`, `student_guide_name`, `student_program_id`, `student_year`, `student_added_by`, `created_at`, `updated_at`, `temp`)
VALUES
	(24,'Test','MA30C030','Narayanan',5,2012,185,'2016-01-25 03:13:42','2016-01-25 03:13:42',''),
	(25,'Selva','ABCD1234','AVJ',5,2012,185,'2016-02-27 00:11:23','2016-02-27 00:11:23',''),
	(185,'Arvind Kumar Singh Gautam','MA14M001',NULL,1,1,14,'2016-03-08 11:34:38','2016-03-08 11:34:38',''),
	(186,'Kamera Bhavani','MA14M003',NULL,1,1,14,'2016-03-08 11:34:38','2016-03-08 11:34:38',''),
	(187,'Kumar Saurabh','MA14M004',NULL,1,1,14,'2016-03-08 11:34:38','2016-03-08 11:34:38',''),
	(188,'Mohd Zafar Iqbal Ansari','MA14M005',NULL,1,1,14,'2016-03-08 11:34:38','2016-03-08 11:34:38',''),
	(189,'Naresh M','MA14M006',NULL,1,1,14,'2016-03-08 11:34:38','2016-03-08 11:34:38',''),
	(190,'Padmasundari','MA14M007',NULL,1,1,14,'2016-03-08 11:34:38','2016-03-08 11:34:38',''),
	(191,'Pawan Kumar','MA14M008',NULL,1,1,14,'2016-03-08 11:34:38','2016-03-08 11:34:38',''),
	(192,'Poonam Panchal','MA14M009',NULL,1,1,14,'2016-03-08 11:34:38','2016-03-08 11:34:38',''),
	(193,'Prashant Giri','MA14M010',NULL,1,1,14,'2016-03-08 11:34:38','2016-03-08 11:34:38',''),
	(194,'Praveen Kumar S','MA14M011',NULL,1,1,14,'2016-03-08 11:34:39','2016-03-08 11:34:39',''),
	(195,'Ramineni Hema','MA14M012',NULL,1,1,14,'2016-03-08 11:34:39','2016-03-08 11:34:39',''),
	(196,'Sanjeet Kumar','MA14M013',NULL,1,1,14,'2016-03-08 11:34:39','2016-03-08 11:34:39',''),
	(197,'Suraj Singh','MA14M014',NULL,1,1,14,'2016-03-08 11:34:39','2016-03-08 11:34:39',''),
	(198,'Vasuki K','MA14M015',NULL,1,1,14,'2016-03-08 11:34:39','2016-03-08 11:34:39',''),
	(199,'Harish Lingam','MA14M016',NULL,1,1,14,'2016-03-08 11:34:39','2016-03-08 11:34:39',''),
	(230,'A Mageswari','MA15M001',NULL,1,2,14,'2016-03-08 11:59:47','2016-03-08 11:59:47',''),
	(231,'Aastha Madonna Sathe','MA15M002',NULL,1,2,14,'2016-03-08 11:59:47','2016-03-08 11:59:47',''),
	(232,'Abhishek Kumar Singh','MA15M003',NULL,1,2,14,'2016-03-08 11:59:47','2016-03-08 11:59:47',''),
	(233,'Ayushi Singh Sengar','MA15M004',NULL,1,2,14,'2016-03-08 11:59:47','2016-03-08 11:59:47',''),
	(234,'Jyoti','MA15M005',NULL,1,2,14,'2016-03-08 11:59:47','2016-03-08 11:59:47',''),
	(235,'Maneesh Kumar Singh','MA15M006',NULL,1,2,14,'2016-03-08 11:59:47','2016-03-08 11:59:47',''),
	(236,'Manish','MA15M007',NULL,1,2,14,'2016-03-08 11:59:47','2016-03-08 11:59:47',''),
	(237,'Manoj Kumar','MA15M008',NULL,1,2,14,'2016-03-08 11:59:47','2016-03-08 11:59:47',''),
	(238,'Mohit Kumar','MA15M009',NULL,1,2,14,'2016-03-08 11:59:47','2016-03-08 11:59:47',''),
	(239,'Munish Rajora','MA15M010',NULL,1,2,14,'2016-03-08 11:59:47','2016-03-08 11:59:47',''),
	(240,'Rimpa Mondal','MA15M011',NULL,1,2,14,'2016-03-08 11:59:47','2016-03-08 11:59:47',''),
	(241,'Sabyasachi Debnath','MA15M012',NULL,1,2,14,'2016-03-08 11:59:47','2016-03-08 11:59:47',''),
	(242,'Vinay Kumar','MA15M013',NULL,1,2,14,'2016-03-08 11:59:47','2016-03-08 11:59:47',''),
	(243,'Kushal Kumar','MA15M014',NULL,1,2,14,'2016-03-08 11:59:47','2016-03-08 11:59:47',''),
	(244,'Mohit Kumar','MA15M015',NULL,1,2,14,'2016-03-08 11:59:47','2016-03-08 11:59:47',''),
	(296,'Abhishek Chandra','MA15C002',NULL,1,1,186,'2016-03-08 22:27:14','2016-03-08 22:27:14',''),
	(297,'Ankit Sharma','MA15C003',NULL,1,1,186,'2016-03-08 22:27:14','2016-03-08 22:27:14',''),
	(298,'Anurag Jain','MA15C004',NULL,1,1,186,'2016-03-08 22:27:14','2016-03-08 22:27:14',''),
	(299,'Arpan Kumar Bag','MA15C005',NULL,1,1,186,'2016-03-08 22:27:14','2016-03-08 22:27:14',''),
	(300,'Arvind Kumar','MA15C006',NULL,1,1,186,'2016-03-08 22:27:14','2016-03-08 22:27:14',''),
	(301,'Basant Sharma','MA15C007',NULL,1,1,186,'2016-03-08 22:27:14','2016-03-08 22:27:14',''),
	(302,'Bhate Snehal Balasaheb','MA15C008',NULL,1,1,186,'2016-03-08 22:27:14','2016-03-08 22:27:14',''),
	(303,'Bhupendra Kumar','MA15C009',NULL,1,1,186,'2016-03-08 22:27:14','2016-03-08 22:27:14',''),
	(304,'Bikramaditya Naskar','MA15C010',NULL,1,1,186,'2016-03-08 22:27:14','2016-03-08 22:27:14',''),
	(305,'Danish Xaxa','MA15C011',NULL,1,1,186,'2016-03-08 22:27:14','2016-03-08 22:27:14',''),
	(306,'Divay','MA15C012',NULL,1,1,186,'2016-03-08 22:27:14','2016-03-08 22:27:14',''),
	(307,'Donthireddy Pavan Kumar Reddy','MA15C013',NULL,1,1,186,'2016-03-08 22:27:14','2016-03-08 22:27:14',''),
	(308,'Dumasia Nina Cavas','MA15C014',NULL,1,1,186,'2016-03-08 22:27:14','2016-03-08 22:27:14',''),
	(309,'Gangeshwar Kumar','MA15C015',NULL,1,1,186,'2016-03-08 22:27:14','2016-03-08 22:27:14',''),
	(310,'Gantasala Naga Vyshnavi','MA15C016',NULL,1,1,186,'2016-03-08 22:27:14','2016-03-08 22:27:14',''),
	(311,'Garima Gupta','MA15C017',NULL,1,1,186,'2016-03-08 22:27:14','2016-03-08 22:27:14',''),
	(312,'Jaipal','MA15C018',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(313,'Jamsandekar Bhushan Shamsundar','MA15C019',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(314,'Kallepu Punam Chander','MA15C021',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(315,'Kruthika Kulkarni','MA15C022',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(316,'Kunduru Venkateswara Reddy','MA15C023',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(317,'Md Hasan Ali Biswas','MA15C024',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(318,'Mohit Kumar','MA15C025',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(319,'Mohit Mishra','MA15C026',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(320,'Mousumi Roy Sarkar','MA15C027',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(321,'Mukesh Kumar','MA15C028',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(322,'Neelam','MA15C029',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(323,'Neha Hotwani','MA15C030',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(324,'Prerna Agarwal','MA15C031',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(325,'Pushpendra Kumar Niranjan','MA15C032',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(326,'Rahish Kumar','MA15C033',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(327,'Rahul Choudhary','MA15C034',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(328,'Rathore Harshita Brijmohan','MA15C035',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(329,'Rupangi Kalra','MA15C036',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(330,'Sahiba Arora','MA15C037',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(331,'Sajal Halder','MA15C038',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(332,'Sandeep Mohan','MA15C039',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(333,'Sohit Jatain','MA15C040',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(334,'Soumitra Daptari','MA15C041',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(335,'Soumya Kanti Das','MA15C042',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(336,'Subhankar Sau','MA15C043',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(337,'Sukanya Mukherjee','MA15C045',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(338,'Sunder Deep','MA15C046',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(339,'Suraj','MA15C047',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(340,'Sushil','MA15C048',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(341,'Sushmita Rose John','MA15C049',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(342,'Vaibhav Krushanakant Dimble','MA15C050',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(343,'Vijay','MA15C051',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(344,'Vikas Hooda','MA15C052',NULL,1,1,186,'2016-03-08 22:27:15','2016-03-08 22:27:15',''),
	(345,'Vishakha Pal','MA15C053',NULL,1,1,186,'2016-03-08 22:27:16','2016-03-08 22:27:16',''),
	(346,'Yanzi Sherpa','MA15C054',NULL,1,1,186,'2016-03-08 22:27:16','2016-03-08 22:27:16',''),
	(347,'Abhishek Kumar Singh','MA14C002',NULL,1,2,186,'2016-03-08 22:28:32','2016-03-08 22:28:32',''),
	(348,'Ajit Kumar Sethi','MA14C003',NULL,1,2,186,'2016-03-08 22:28:32','2016-03-08 22:28:32',''),
	(349,'Anil Kumar Gupta','MA14C004',NULL,1,2,186,'2016-03-08 22:28:32','2016-03-08 22:28:32',''),
	(350,'Antesh Meena','MA14C007',NULL,1,2,186,'2016-03-08 22:28:32','2016-03-08 22:28:32',''),
	(351,'Archana Kumari','MA14C008',NULL,1,2,186,'2016-03-08 22:28:32','2016-03-08 22:28:32',''),
	(352,'Arvind Kumar','MA14C009',NULL,1,2,186,'2016-03-08 22:28:32','2016-03-08 22:28:32',''),
	(353,'Atul Kumar','MA14C010',NULL,1,2,186,'2016-03-08 22:28:32','2016-03-08 22:28:32',''),
	(354,'Bhima Prasad Yadav','MA14C012',NULL,1,2,186,'2016-03-08 22:28:32','2016-03-08 22:28:32',''),
	(355,'Bibhas Chandra Das','MA14C013',NULL,1,2,186,'2016-03-08 22:28:32','2016-03-08 22:28:32',''),
	(356,'Chiranjit Singha','MA14C015',NULL,1,2,186,'2016-03-08 22:28:32','2016-03-08 22:28:32',''),
	(357,'Dharmendra Kumar','MA14C016',NULL,1,2,186,'2016-03-08 22:28:32','2016-03-08 22:28:32',''),
	(358,'Diptesh Kumar Saha','MA14C017',NULL,1,2,186,'2016-03-08 22:28:32','2016-03-08 22:28:32',''),
	(359,'J Vijayasarathi','MA14C018',NULL,1,2,186,'2016-03-08 22:28:32','2016-03-08 22:28:32',''),
	(360,'Jamdade Manojkumar Dattatraya','MA14C019',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(361,'Jangid Ganesh Baldev','MA14C020',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(362,'Jashwant Singh','MA14C021',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(363,'Kartik Roy','MA14C022',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(364,'Kartikeswar Mahalik','MA14C023',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(365,'Londhe Mayuresh Mahadeo','MA14C024',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(366,'Md Mansur Alam','MA14C025',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(367,'Nishant','MA14C027',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(368,'Palak Pandoh','MA14C028',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(369,'Parvati N','MA14C029',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(370,'Parveena Shamim A','MA14C030',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(371,'Pradyut Karmakar','MA14C031',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(372,'Pratik Misra','MA14C032',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(373,'Prerna Singh','MA14C033',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(374,'Rahul Mundhara','MA14C034',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(375,'Rahul Sachan','MA14C035',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(376,'Raju Nandi','MA14C037',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(377,'Ramanand Bind','MA14C038',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(378,'Raneeta Dutta','MA14C039',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(379,'Rimjhim','MA14C040',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(380,'Robiul Islam','MA14C041',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(381,'Rohit Khandelwal','MA14C042',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(382,'Salman Ashraf','MA14C043',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(383,'Santi Ranjan Das','MA14C044',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(384,'Shivli','MA14C045',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(385,'Subhankar Mondal','MA14C047',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(386,'Subhankar Nandi','MA14C048',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(387,'Sumati Thareja','MA14C049',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(388,'Tapas Das','MA14C050',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(389,'Utpal Barman','MA14C051',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(390,'Varuna M','MA14C052',NULL,1,2,186,'2016-03-08 22:28:33','2016-03-08 22:28:33',''),
	(391,'Vishal Shukla','MA14C053',NULL,1,2,186,'2016-03-08 22:28:34','2016-03-08 22:28:34',''),
	(392,'Yogendra Nagar','MA14C054',NULL,1,2,186,'2016-03-08 22:28:34','2016-03-08 22:28:34',''),
	(393,'ram','111',NULL,5,0,185,'2016-03-18 20:02:36','2016-03-18 20:02:36',''),
	(394,'Student1 Title','MA001',NULL,3,1,186,'2017-03-02 07:23:13','2017-03-02 07:23:13',''),
	(395,'Student2 Title','MA002',NULL,3,2,186,'2017-03-02 07:23:13','2017-03-02 07:23:13','');

/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_details`;

CREATE TABLE `user_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_details_group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_details_personal_homepage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_details_have_any_book` int(11) NOT NULL,
  `user_details_have_any_publication` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table user_group
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_group`;

CREATE TABLE `user_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `group_other_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group_created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table user_privileges
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_privileges`;

CREATE TABLE `user_privileges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `people` int(11) NOT NULL DEFAULT '0',
  `student` int(11) NOT NULL DEFAULT '0',
  `research` int(11) NOT NULL DEFAULT '0',
  `programs` int(11) NOT NULL DEFAULT '0',
  `events` int(11) NOT NULL DEFAULT '1',
  `resources` int(11) NOT NULL DEFAULT '1',
  `newannouncement` int(11) NOT NULL DEFAULT '0',
  `createadmin` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bookings` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `user_privileges` WRITE;
/*!40000 ALTER TABLE `user_privileges` DISABLE KEYS */;

INSERT INTO `user_privileges` (`id`, `user_id`, `people`, `student`, `research`, `programs`, `events`, `resources`, `newannouncement`, `createadmin`, `created_at`, `updated_at`, `bookings`)
VALUES
	(1,14,1,1,1,1,1,1,1,1,'0000-00-00 00:00:00','2015-01-12 17:58:47',1),
	(2,15,1,1,1,1,1,1,1,1,'0000-00-00 00:00:00','2016-03-18 04:21:57',1),
	(93,185,1,1,1,1,1,1,1,1,'2015-09-18 06:47:39','2016-11-11 05:19:23',1),
	(94,186,1,1,1,1,1,1,1,1,'2015-09-18 06:52:51','2016-03-09 04:14:34',1),
	(95,187,0,0,0,0,0,0,0,0,'2015-12-13 20:29:14','2015-12-13 20:29:14',0),
	(96,188,0,0,0,0,0,0,0,0,'2015-12-14 14:18:43','2015-12-14 14:18:43',0),
	(97,189,0,0,0,0,0,0,0,0,'2016-01-27 06:40:29','2016-01-27 06:40:29',0),
	(98,190,0,0,0,0,1,0,0,0,'2016-02-03 10:18:37','2016-05-01 05:57:04',1),
	(101,192,0,0,0,0,0,0,0,0,'2016-02-15 06:15:05','2016-02-15 06:15:05',0),
	(102,193,0,0,0,0,0,0,0,0,'2016-03-01 19:16:01','2016-03-01 19:16:01',0),
	(103,194,0,0,0,0,0,0,0,0,'2016-03-01 19:18:54','2016-03-01 19:18:54',0),
	(104,195,0,0,0,0,0,0,0,0,'2016-03-01 19:19:51','2016-03-01 19:19:51',0),
	(105,196,0,0,0,0,0,0,0,0,'2016-03-01 19:20:56','2016-03-01 19:33:55',0),
	(106,197,0,0,0,0,0,0,0,0,'2016-03-01 19:21:55','2016-03-01 19:21:55',0),
	(107,198,0,0,0,0,0,0,0,0,'2016-03-01 19:22:54','2016-03-01 19:22:54',0),
	(108,199,0,1,0,0,0,0,0,0,'2016-03-01 19:23:58','2016-03-01 19:46:05',0),
	(109,200,0,0,0,0,0,0,0,0,'2016-03-01 19:24:43','2016-03-01 19:24:43',0),
	(110,201,0,0,0,0,0,0,0,0,'2016-03-01 19:26:05','2016-03-01 19:26:05',0),
	(111,202,0,0,0,0,0,0,0,0,'2016-03-01 19:26:57','2016-03-01 19:26:57',0),
	(112,203,0,0,0,0,0,0,0,0,'2016-03-02 01:21:34','2016-03-02 01:21:34',0),
	(113,204,0,0,0,0,0,0,0,0,'2016-03-02 01:22:47','2016-03-02 01:22:47',0),
	(114,205,0,0,0,0,0,0,0,0,'2016-03-02 01:23:52','2016-03-02 01:23:52',0),
	(115,206,0,0,0,0,0,0,0,0,'2016-03-02 01:25:11','2016-03-02 01:25:11',0),
	(116,207,0,0,0,0,0,0,0,0,'2016-03-02 01:26:12','2016-03-02 01:26:12',0),
	(117,208,0,0,0,0,0,0,0,0,'2016-03-02 01:27:14','2016-03-02 01:27:14',0),
	(118,209,0,0,0,0,0,0,0,0,'2016-03-02 01:28:25','2016-03-02 01:28:25',0),
	(119,210,0,0,0,0,0,0,0,0,'2016-03-02 01:29:28','2016-03-02 01:29:28',0),
	(120,211,0,0,0,0,0,0,0,0,'2016-03-02 01:52:05','2016-03-02 01:52:05',0),
	(121,212,0,0,0,0,0,0,0,0,'2016-03-02 01:53:06','2016-03-02 01:53:06',0),
	(122,213,0,0,0,0,0,0,0,0,'2016-03-02 01:54:00','2016-03-02 01:54:00',0),
	(123,214,0,0,0,0,0,0,0,0,'2016-03-02 01:55:33','2016-03-02 01:55:33',0),
	(124,215,0,0,0,0,0,0,0,0,'2016-03-02 01:57:05','2016-03-02 01:57:05',0),
	(125,216,0,0,0,0,0,0,0,0,'2016-03-02 01:58:02','2016-03-02 01:58:02',0),
	(126,217,0,0,0,0,0,0,0,0,'2016-03-02 02:02:07','2016-03-02 02:02:07',0),
	(127,218,0,0,0,0,0,0,0,0,'2016-03-02 02:03:07','2016-03-02 02:03:07',0),
	(128,219,0,0,0,0,0,0,0,0,'2016-03-02 02:05:43','2016-03-02 02:05:43',0),
	(129,220,0,0,0,0,0,0,0,0,'2016-03-02 02:06:30','2016-03-02 02:06:30',0),
	(130,221,0,0,0,0,0,0,0,0,'2016-03-02 02:07:39','2016-03-02 02:07:39',0),
	(131,222,0,0,0,0,0,0,0,0,'2016-03-02 02:08:25','2016-03-02 02:08:25',0),
	(132,223,0,0,0,0,0,0,0,0,'2016-03-02 02:12:56','2016-03-02 02:12:56',0),
	(133,224,0,0,0,0,0,0,0,0,'2016-03-02 02:13:55','2016-03-02 02:13:55',0),
	(134,225,0,0,0,0,0,0,0,0,'2016-03-02 02:16:11','2016-03-02 02:16:11',0),
	(135,226,0,0,0,0,0,0,0,0,'2016-03-02 02:17:35','2016-03-02 02:17:35',0),
	(136,227,0,0,0,0,0,0,0,0,'2016-03-02 04:17:33','2016-03-02 04:17:33',0),
	(137,228,0,0,0,0,0,0,0,0,'2016-03-05 04:22:00','2016-03-05 04:22:00',0),
	(138,229,0,0,0,0,0,0,0,0,'2016-03-08 19:42:25','2016-03-08 19:42:25',0),
	(139,230,0,0,0,0,0,0,0,0,'2016-03-08 19:45:04','2016-03-08 19:45:04',0),
	(140,231,0,0,0,0,0,0,0,0,'2016-03-15 18:57:03','2016-03-15 18:57:03',0),
	(141,232,0,0,0,0,0,0,0,0,'2016-03-15 18:58:01','2016-03-15 18:58:01',0),
	(142,233,0,0,0,0,0,0,0,0,'2016-03-15 18:59:06','2016-03-15 18:59:06',0),
	(143,234,0,0,0,0,0,0,0,0,'2016-03-15 18:59:46','2016-03-15 18:59:46',0),
	(144,235,0,0,0,0,0,0,0,0,'2016-03-15 19:00:33','2016-03-15 19:00:33',0),
	(145,236,0,0,0,0,0,0,0,0,'2016-03-15 19:01:24','2016-03-15 19:01:24',0),
	(146,237,0,0,0,0,0,0,0,0,'2016-03-15 19:02:02','2016-03-15 19:02:02',0),
	(147,238,0,0,0,0,0,0,0,0,'2016-03-15 19:04:36','2016-03-15 19:04:36',0),
	(148,239,0,0,0,0,0,0,0,0,'2016-03-15 19:06:41','2016-03-15 19:06:41',0),
	(149,240,0,0,0,0,0,0,0,0,'2016-03-15 19:07:20','2016-03-15 19:07:20',0),
	(150,241,0,0,0,0,0,0,0,0,'2016-03-15 19:08:47','2016-03-15 19:08:47',0),
	(151,242,0,0,0,0,0,0,0,0,'2016-03-15 19:09:32','2016-03-15 19:09:32',0),
	(152,243,0,0,0,0,0,0,0,0,'2016-03-15 19:10:11','2016-03-15 19:10:11',0),
	(153,244,0,0,0,0,0,0,0,0,'2016-03-15 19:11:12','2016-03-15 19:11:12',0),
	(154,245,0,0,0,0,0,0,0,0,'2016-03-15 19:11:55','2016-03-15 19:11:55',0),
	(155,246,0,0,0,0,0,0,0,0,'2016-03-15 19:12:28','2016-03-15 19:12:28',0),
	(156,247,0,0,0,0,0,0,0,0,'2016-03-15 19:13:04','2016-03-15 19:13:04',0),
	(157,248,0,0,0,0,0,0,0,0,'2016-03-15 19:13:46','2016-03-15 19:13:46',0),
	(158,249,0,0,0,0,0,0,0,0,'2016-03-15 19:14:13','2016-03-15 19:14:13',0),
	(159,250,0,0,0,0,0,0,0,0,'2016-03-15 19:14:44','2016-03-15 19:14:44',0),
	(160,251,0,0,0,0,0,0,0,0,'2016-03-15 19:15:25','2016-03-15 19:15:25',0),
	(161,252,0,0,0,0,0,0,0,0,'2016-03-15 19:15:50','2016-03-15 19:15:50',0),
	(162,253,0,0,0,0,0,0,0,0,'2016-03-15 19:16:27','2016-03-15 19:16:27',0),
	(163,254,0,0,0,0,0,0,0,0,'2016-03-15 19:17:14','2016-03-15 19:17:14',0),
	(164,255,0,0,0,0,0,0,0,0,'2016-03-15 19:17:56','2016-03-15 19:17:56',0),
	(165,256,0,0,0,0,0,0,0,0,'2016-03-18 04:46:39','2016-03-18 04:46:39',0),
	(166,257,0,0,0,0,0,0,0,0,'2016-03-18 05:46:25','2016-03-18 05:46:25',0),
	(167,258,0,0,0,0,0,0,0,0,'2016-03-19 01:34:44','2016-03-19 01:34:44',0),
	(168,259,0,0,0,0,0,0,0,0,'2016-03-27 16:44:48','2016-03-27 16:44:48',0),
	(169,260,0,0,0,0,0,0,0,0,'2016-03-27 16:49:22','2016-03-27 16:49:22',0),
	(170,261,0,0,0,0,0,0,0,0,'2016-03-27 16:51:20','2016-03-27 16:51:20',0),
	(171,262,0,0,0,0,0,0,0,0,'2016-03-27 16:54:15','2016-03-27 16:54:15',0),
	(172,263,0,0,0,0,0,0,0,0,'2016-03-27 16:56:11','2016-03-27 16:56:11',0),
	(173,264,0,0,0,0,0,0,0,0,'2016-04-30 23:22:11','2016-04-30 23:22:11',0),
	(174,265,0,0,0,0,0,0,0,0,'2016-05-02 06:08:17','2016-05-02 06:08:17',0),
	(175,266,0,0,0,0,0,0,0,0,'2016-09-26 15:05:54','2016-09-26 15:05:54',0),
	(176,267,0,0,0,0,0,0,0,0,'2017-02-27 16:06:26','2017-02-27 16:06:26',0);

/*!40000 ALTER TABLE `user_privileges` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_type`;

CREATE TABLE `user_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type_created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_subtype` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `user_type` WRITE;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;

INSERT INTO `user_type` (`id`, `user_type_name`, `user_type_created_by`, `created_at`, `updated_at`, `link`, `user_subtype`)
VALUES
	(4,'Faculty',14,'0000-00-00 00:00:00','0000-00-00 00:00:00','Faculty','0'),
	(6,'Inspire Faculty',14,'0000-00-00 00:00:00','0000-00-00 00:00:00','Inspire-Faculty','0'),
	(8,'Visiting Faculty',14,'0000-00-00 00:00:00','0000-00-00 00:00:00','Visiting-Faculty','0'),
	(9,'Post Doctoral Fellows',14,'0000-00-00 00:00:00','0000-00-00 00:00:00','Post-Doctoral-Fellows','0'),
	(10,'Staff',14,'0000-00-00 00:00:00','0000-00-00 00:00:00','Staff','0'),
	(11,'Retired Faculty',14,'0000-00-00 00:00:00','0000-00-00 00:00:00','Retired-Faculty','0'),
	(12,'Ph.D',14,'0000-00-00 00:00:00','0000-00-00 00:00:00','PhD','0');

/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_active` int(11) NOT NULL,
  `user_office` text COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_researchfield` text COLLATE utf8_unicode_ci NOT NULL,
  `user_designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_lab_office_stores` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_personal_homepage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_namehandle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_profilepics` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_cv` text COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_sex` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_dob` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_title` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `isadmin` int(11) NOT NULL,
  `ingroup` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `issuper` int(11) DEFAULT NULL,
  `user_subtype` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default',
  `user_subtype_sort` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `user_type`, `user_fname`, `user_lname`, `user_email`, `password`, `user_active`, `user_office`, `user_phone`, `user_researchfield`, `user_designation`, `user_lab_office_stores`, `user_personal_homepage`, `user_namehandle`, `user_profilepics`, `user_cv`, `remember_token`, `user_sex`, `user_dob`, `created_at`, `updated_at`, `user_title`, `isadmin`, `ingroup`, `issuper`, `user_subtype`, `user_subtype_sort`)
VALUES
	(14,'superadmin','','superadmin','Kumar','alok@desto.co.in','$2y$10$qxhH32eBuHyC1R8MovgUxujxI.hUwz96ayv23KbKlKZJoHsJ2LWt2',1,'IIT Research Park','0000000000','','developer','','http://google.com','superadmin','superadmin.jpg','','tzMly3iv5eYAvDgBZfCUQSGEUBdiBwRFWKQyaCw87TGT6q1jSNCyIq1FB5za','','','0000-00-00 00:00:00','2017-02-28 04:15:24','Mr.',1,',,11,10,,',1,'default',0),
	(15,'phoffice','','phoffice','','developer@desto.co.in','$2y$10$LZd.D4yzWb/4.O792zMxNeN/XUrl0I9hLfMiIHGLW1SzfQrizd0HK',1,'IIT Research Park','0000000000','','','','','phoffice','','','mpPeF3EKdR62LU3iIVfTB8o6XhX6nwrglrE9cMZWNCQTVC497LWpF6gG2f3t','','','0000-00-00 00:00:00','2016-03-18 04:27:09','',1,'',0,'Faculty',0),
	(185,'naru','Faculty','Narayanan','N','naru@iitm.ac.in','$2y$10$LZd.D4yzWb/4.O792zMxNeN/XUrl0I9hLfMiIHGLW1SzfQrizd0HK',1,'HSB 240C','4605','Graph Theory, Combinatorics, Graph Ideals','Asst. Professor','Not Applicable','http://home.iitm.ac.in/naru','naru','','naru.pdf','oJNDL7MYqfmDLttrYhm6IeMFmGx5KFs1wQ7aPdBevjoeSeT3fuSaOScMCErz','Male','','2015-09-18 06:47:39','2016-11-13 05:08:23','Dr.',1,',10,8,,,,,,,',0,'Faculty',0),
	(186,'jayanav','Faculty','Jayanthan ','A V','jayanav@iitm.ac.in','$2y$10$LZd.D4yzWb/4.O792zMxNeN/XUrl0I9hLfMiIHGLW1SzfQrizd0HK',1,'HSB 240B','4625','','Associate Professor','','https://home.iitm.ac.in/jayanav/','jayanav','','','bhiMFKAKmi48FG3AudI6ndx1xXmE2jIRlBq5spexXqmPxBqm2yhF99vrxfiO','Male','','2015-09-18 06:52:51','2017-04-11 05:36:11','Dr.',1,',',0,'Faculty',0),
	(190,'anoop','Faculty','Anoop','T V','anoop@iitm.ac.in','$2y$10$Xz/JKFehEPW3t4MsH1TmoOcncIVCmyAnOk7WZ9IeLJuU/njtoE3sm',1,'HSB (Library)','4634','','Assistant Professor','','','anoop','','','q4pBWQHa5RBN4H9e2aW3mbbRij1Pr5JRXe0NrujPox3kJhMhM9NhXrCa8Xwv','Male','','2016-02-03 10:18:37','2016-07-02 09:24:22','Dr.',1,'',0,'default',0),
	(192,'jaikrishnan','Inspire-Faculty','Jaikrishnan','Janardhanan','jaikrishnan@iitm.ac.in','$2y$10$.WP1rOFcm6LfUal24KjQgOVgpabjMJ4DYFe/mVislhcNsahiefFFS',1,'HSB 245A','4603','','Visiting Assistant Professor','','','jaikrishnan','','','','Male','','2016-02-15 06:15:05','2016-02-15 06:15:05','Dr.',1,'',0,'default',0),
	(193,'mtnair','Faculty','Thamban',' Nair M ','mtnair@iitm.ac.in','$2y$10$pClw16yLo4FtBPhArMlmc.xmE8/6Nax22qtiIv1CBWVQ96oHAs0.S',1,'HSB - 252B','4610','','Professor & HOD','','','mtnair','','','','Male','','2016-03-01 19:16:01','2016-03-08 16:03:19','Prof.',1,'',0,'default',0),
	(194,'arijit','Faculty','Arijit ','Dey','arijit@iitm.ac.in','$2y$10$mosQMHgvYHHy42SVy3ktr.QqCxRU3PsirUww9EXOXtmljZLfv4c/2',1,'HSB - 239E','4635','','Assistant Professor','','','arijit','','','','Male','','2016-03-01 19:18:54','2016-03-01 19:18:54','Mr.',1,'',0,'default',0),
	(195,'asingh','Faculty','Arindama','Singh','asingh@iitm.ac.in','$2y$10$/ZTh2vFF5SeJExSHLnm2uuE0omd7/lK1JHWnxpjtwXv.zo8o4t18O',1,'HSB - 248B','4613','','Professor','','','asingh','','','','Male','','2016-03-01 19:19:51','2016-03-01 19:19:51','Dr.',1,'',0,'default',0),
	(196,'balaji5','Faculty','Balaji','R','balaji5@iitm.ac.in','$2y$10$sc8FlwySxpuUhhuE2m1wsud8EDzwYmxRCpzjzaSBNAtGMsv3L.A/W',1,'HSB - 256','4631','','Assistant Professor','','','balaji5','','','','Male','','2016-03-01 19:20:56','2016-03-01 19:20:56','Dr.',1,'',0,'default',0),
	(197,'chand','Faculty','Chand ','A.K.B','chand@iitm.ac.in','$2y$10$0TS07cLdAm748aFEB731w.d.6wRPfgWvpCRPec9cR6u2vuPjzH3xe',1,'HSB - 254H','4629','','Assistant Professor','','','chand','','','','Male','','2016-03-01 19:21:55','2016-03-01 19:21:55','Dr.',1,'',0,'default',0),
	(198,'chsrao','Faculty','Chidella ','Srinivasa Rao','chsrao@iitm.ac.in','$2y$10$XK/SI7G6RzmpVApsEhEk/.6Knp3W1Cuod0e5GAkQFZ3t09rhSagpG',1,'HSB - 252A','4623','','Assistant Professor','','','chsrao','','','','Male','','2016-03-01 19:22:54','2016-03-01 19:22:54','Dr.',1,'',0,'default',0),
	(199,'kmahalingam','Faculty','Kalpana ','Mahalingam','kmahalingam@iitm.ac.in','$2y$10$a7gJpq/2kwUKLHKCg1d9C.RsH0S7s8/HvRNUggCEEZOriZpVow2CS',1,'HSB - 240C','4630','','Assistant Professor','','','kmahalingam','','','Nc0HZgoTKHJRD3BK1aHbR9oN6kwlB5Xl9UWpyu1RWnFaLtVcf8rKiVb1Hvkd','Female','','2016-03-01 19:23:58','2016-03-01 19:47:07','Dr.',1,'',0,'default',0),
	(200,'shk','Faculty','Kulkarni ','S H','shk@iitm.ac.in','$2y$10$p4msrCFL59hAhQ4jRaGYLOV94ZTKycUBPKhz5Lt.vHEb/oIKBl8wu',1,'HSB - 250','4606','','Professor','','','shk','','','','Male','','2016-03-01 19:24:43','2016-03-01 19:24:43','Dr.',1,'',0,'default',0),
	(201,'kunal','Faculty','Kunal ','Krishna Mukherjee','kunal@iitm.ac.in','$2y$10$ZHlfZpb1rJt6pUxQnGV6lOWOfpLAAOD9lvQ/LD7pGuxkYQd6X0UEi',1,'HSB 240E','4640','','Assistant Professor','','','kunal','','','','Male','','2016-03-01 19:26:05','2016-03-01 19:26:05','Dr.',1,'',0,'default',0),
	(202,'manam','Faculty','Manam ','S R ','manam@iitm.ac.in','$2y$10$74CFgxWipefv09YMGZqzW.CsjBcCNAmLeqxQQBI3OqfJCNCAP6YcG',1,'HSB - 239','4637','','Associate Professor','','','manam','','','','Male','','2016-03-01 19:26:57','2016-03-01 19:26:57','Dr.',1,'',0,'default',0),
	(203,'','Faculty','Neelesh',' S. Upadhye ','neelesh@iitm.ac.in','$2y$10$1wHVm5FhrCHZ7t3iNTu.zOfd6.W.AaWcrEWM9FRc6TpKENO4nd1o.',1,'HSB - 241','4632','','Assistant Professor','','','neelesh','','','','Male','','2016-03-02 01:21:34','2016-03-02 01:21:34','Dr.',0,'',0,'default',0),
	(204,'','Faculty','Ponnusamy','S','samy@iitm.ac.in','$2y$10$j9RX3nTABGc./ns1HhtPBej2bxKFFh4SkLvE/.LGYLf8hSyDmIKXW',1,'HSB - 239B','4615','','Professor','','','samy','','','','Male','','2016-03-02 01:22:47','2016-03-02 01:22:47','Dr.',0,'',0,'default',0),
	(205,'','Faculty','Priyanka','Shukla ','priyanka@iitm.ac.in','$2y$10$Q5dAFzXKl2RsL6uhZj/7c.xUSiOCqmtQq0OWvvyHpWQPClAPhvsjG',1,'HSB - 239C','4609','','Assistant Professor','','','priyanka','','','','Female','','2016-03-02 01:23:52','2016-03-02 01:23:52','Dr.',0,'',0,'default',0),
	(206,'','Faculty','Radha','R','radharam@iitm.ac.in','$2y$10$9oA1OsolGpFTGB6ZPPVWfOjo5RPPM6rRPknwt4mSlsAWVkXaNxmGq',1,'HSB - 251','4620','','Professor','','','radharam','','','','Female','','2016-03-02 01:25:11','2016-03-02 01:25:11','Dr.',0,'',0,'default',0),
	(207,'','Faculty','Rama','R','ramar@iitm.ac.in','$2y$10$40l4Hp.AJdDrWsTWZM2h..eRXqdmygpIVmHoIdZ7ii2o2x433v68W',1,'HSB - 245B','4616','','Professor','','','ramar','','','','Female','','2016-03-02 01:26:12','2016-03-02 01:26:12','Dr.',0,'',0,'default',0),
	(208,'','Faculty','Sanyasiraju','Y V S S ','sryedida@iitm.ac.in','$2y$10$XzOPn52cTZ3OJqeh8pdt3eEIpEJEN.DID876mPuFGu61UYvS2aPpK',1,'HSB - 247B','4621','','Professor','','','sryedida','','','','Male','','2016-03-02 01:27:14','2016-03-02 01:27:14','Dr.',0,'',0,'default',0),
	(209,'','Faculty','Satyajit','Roy','sjroy@iitm.ac.in','$2y$10$Ut/C16h9bKGJxLNM3nCaiuT48i/Ne9WKh8eHRE3IJ/Sl20mkr.PbG',1,'HSB - 253C','4617','','Professor','','','sjroy','','','','Male','','2016-03-02 01:28:25','2016-03-02 01:28:25','Dr.',0,'',0,'default',0),
	(210,'','Faculty','Santanu','Sarkar ','santanu@iitm.ac.in','$2y$10$nPC/rOVbhWuHBS.RU.AijuQ9MrMD.LW9hfNaLzSt7UBbm36ixrExS',1,'HSB - 244B','4607','','Assistant Professor','','','santanu','','','','Male','','2016-03-02 01:29:28','2016-03-02 01:29:28','Dr.',0,'',0,'default',0),
	(211,'','Faculty','Sarang','S.Sane','sarang@iitm.ac.in','$2y$10$xHb0t8rS4Ei6A7Ecumqbbu4QQJs54IrlRceV6XKnFJlbg1zeOlO12',1,'HSB 235','4604','','Assistant Professor','','','sarang','','','','Male','','2016-03-02 01:52:05','2016-03-02 01:52:05','Dr.',0,'',0,'default',0),
	(212,'','Faculty','Shaiju','A J ','ajshaiju@iitm.ac.in','$2y$10$OQ6gvAyjBUBmPX5LkP/x7eJEKC2tt.Ks5c4J8TXJkMzC0l0G1v5fS',1,'HSB - 247A','4638','','Associate Professor','','','ajshaiju','','','','Male','','2016-03-02 01:53:06','2016-03-02 01:53:06','Dr.',0,'',0,'default',0),
	(213,'','Faculty','Shruti','Dubey ','sdubey@iitm.ac.in','$2y$10$Pgq0JAHjIXR573sNj7MlXOzIt7JakxUbtBlxJbGE/B5wAbBGQQ7rq',1,'HSB - 239B','4639','','Assistant Professor','','','sdubey','','','','Female','','2016-03-02 01:54:00','2016-03-02 01:54:00','Dr.',0,'',0,'default',0),
	(214,'','Faculty','Sivakumar','K C ','kcskumar@iitm.ac.in','$2y$10$.XQJXUxy875y3yAXcdZrMem4EapxEYEYy8TgwqeYYB4mtTYH0Yb9u',1,'HSB - 251A','4622','','Professor','','','kcskumar','','','','Male','','2016-03-02 01:55:33','2016-03-02 01:55:33','Dr.',0,'',0,'default',0),
	(215,'','Faculty','Sounaka ','Mishra','sounak@iitm.ac.in','$2y$10$FELH5dYbVTpfUPUV6xuX6.sP9PqqSov2OeD9lcqvgRRMnM3CGwvUq',1,'HSB - 253B','4627','','Associate Professor','','','sounak','','','','Male','','2016-03-02 01:57:05','2016-03-02 01:57:05','Dr.',0,'',0,'default',0),
	(216,'','Faculty','Sriram','B','bsriram@iitm.ac.in','$2y$10$j4DKykkpbbZOXszkTU377OVDaH/6N9R9to6HazsXWeyQywHLD.qxO',1,'HSB - 237-1','4600','','Assistant Professor','','','bsriram','','','','Male','','2016-03-02 01:58:02','2016-03-02 01:58:02','Dr.',0,'',0,'default',0),
	(217,'','Faculty','Suhas','Jaykumar Pandit','suhas@iitm.ac.in','$2y$10$SHGuFyDNWMKjcsVovWZdYuW7OYBZGzOvBkTb2vUw5E6tGiIPlWAmm',1,'HSB - 236','4608','','Assistant Professor','','','suhas','','','','Male','','2016-03-02 02:02:07','2016-03-02 02:02:07','Dr.',0,'',0,'default',0),
	(218,'','Faculty','Sundar','S','slnt@iitm.ac.in','$2y$10$ZeW308Qj0i3xyZ2jUHC.vuxs/945YnKBODduVflWtN6WAlx8GAnb.',1,'HSB - 249A','4618','','Professor','','','slnt','','','','Male','','2016-03-02 02:03:07','2016-03-02 02:03:07','Dr.',0,'',0,'default',0),
	(219,'','Faculty','Uma','V','vuma@iitm.ac.in','$2y$10$is9NpqrgnnRupCEsMCJUpOZJQwktIdx4g9rxEGzi6.hRrjCnBpWiu',1,'HSB - 240B','4626','','Assistant Professor','','','vuma','','','','Female','','2016-03-02 02:05:43','2016-03-02 02:05:43','Dr.',0,'',0,'default',0),
	(220,'','Faculty','Usha','R','ushar@iitm.ac.in','$2y$10$2GrSqyO4gRBFqDTZM2m3pu1XGjbS8ht3npqwXCshsuyCOrs9C9C86',1,'HSB - 253A','4611','','Professor','','','ushar','','','','Female','','2016-03-02 02:06:30','2016-03-02 02:06:30','Dr.',0,'',0,'default',0),
	(221,'','Faculty','Vasantha','W B','vasantha@iitm.ac.in','$2y$10$UO8ajU.ZB0u66Rua8HmNhu4Xm4352a9uRTs8hdWOtMOBwj35L2F1W',1,'HSB - 261-A','4624','','Assistant Professor','','','vasantha','','','','Female','','2016-03-02 02:07:39','2016-03-02 02:07:39','Dr.',0,'',0,'default',0),
	(222,'','Faculty','Veeramani','P','pvmani@iitm.ac.in','$2y$10$rbH7cCk1xeVigH0uh8VVIOnji5ZAUUcNbUQWy7Qu82epXfX1DwgS2',1,'HSB - 254','4612','','Professor','','','pvmani','','','','Male','','2016-03-02 02:08:25','2016-03-02 02:08:25','Dr.',0,'',0,'default',0),
	(223,'','Faculty','Venkata','Balaji T E','tevbal@iitm.ac.in','$2y$10$lk.KJxhcnwGlPji5iJWlaep8YgGg0MYhc/GGvbRtDCuEmjN.IgDxO',1,'HSB - 241-B','4628','','Assistant Professor','','','tevbal','','','','Male','','2016-03-02 02:12:55','2016-03-02 02:12:55','Dr.',0,'',0,'default',0),
	(224,'','Faculty','Vetrivel','V','vetri@iitm.ac.in','$2y$10$Q7kRBjnUomcRMU2uQNDBv.5fbgAd1BW.BFxqiQ3jyMNFXPq0s6bJC',1,'HSB - 249','4619','','Professor','','','vetri','','','','Male','','2016-03-02 02:13:55','2016-03-02 02:13:55','Dr.',0,'',0,'default',0),
	(225,'','Inspire-Faculty','Srilakshmi','Krishnamoorthy','srilakshmi@iitm.ac.in','$2y$10$x1xXABiR9xHKTT8tUGEqmO5wM/GfVms3c0um8jgyi/wTLWMGvXd8G',1,'HSB - 241C','4633','','Visiting Assistant Professor','','','srilakshmi','','','','Female','','2016-03-02 02:16:11','2016-03-02 02:16:11','Dr.',0,'',0,'default',0),
	(226,'','Visiting-Faculty','S ','Kesavan','kesh@iitm.ac.in','$2y$10$SEe0AVgTuLcQvDE6oHYTo.UgS4GxefGl0Zc5y1tqG6bi5sEfcRtle',1,'HSB - 248A','4600','','Visiting Professor','','','kesh','','','','Male','','2016-03-02 02:17:35','2016-03-02 02:17:35','Dr.',0,'',0,'default',0),
	(231,'','Staff','O. Karthikeyan',' ','','$2y$10$qzDXDVkDlpt7IlxwjTLuZ.sZCar7vJ/cNN6Ex7zKc5/qU9wvXf3g6',1,'HSB 260','5600','','JUNIOR SUPERINTENDENT','','','','','','','','','2016-03-15 18:57:03','2016-03-15 18:57:03','Mr.',0,'',0,'default',0),
	(232,'','Staff','S. D. KRISHNAMURTHY',' ','','$2y$10$G3ZUQ.8JP6h7P4jeSSsMg.eS5M6PzEZouWOAgVr639ui.dGmf0S3q',1,'HSB 258-1','5604','','PROJECT ASSOCIATE','','','','','','','','','2016-03-15 18:58:01','2016-03-15 18:58:01','Mr.',0,'',0,'default',0),
	(233,'','Staff','NARESH',' ','','$2y$10$38Pscp5jXrXMvOt.fp7QwOnF5ycG7/ZgG0u20ROZjCSyx0bSyLLxG',1,'HSB 260','4600','','JUNIOR ASSISTANT','','','','','','','','','2016-03-15 18:59:06','2016-03-15 18:59:06','Mr.',0,'',0,'default',0),
	(234,'','Staff','T. SELVI',' ','','$2y$10$jidzrIJvMMcKI5Ddyu9ThOYSz26A8Orw6Khw7XlJ5FBDPko7rfqRG',1,'HSB 260','4600','','JUNIOR ATTENDER','','','','','','','','','2016-03-15 18:59:46','2016-03-15 18:59:46','Ms.',0,'',0,'default',0),
	(235,'','Staff','SHANKAR',' ','','$2y$10$FQWLSYDu2iTuhWMhFsukMex99cj9t5tilJQeI4/dK0jpGlcH9xrGO',1,'HSB 260','4600','','JUNIOR ATTENDER','','','','','','','','','2016-03-15 19:00:33','2016-03-15 19:00:33','Mr.',0,'',0,'default',0),
	(236,'','Staff','THIRUPATHAIAH','K','','$2y$10$5E20W1eObEiBAMt21D3lDOwliAmqRwP45S/iQPQyT.ZlFeBBC20He',1,'HSB 260','4600','','PROJECT ATTENDER','','','','','','','','','2016-03-15 19:01:24','2016-03-15 19:01:24','Mr.',0,'',0,'default',0),
	(237,'','Staff','S. I. VARUN','DURAI','','$2y$10$J1Lk2uE3WWzFbfiH5Qet1eNaHk1u0PBvI8sPMoTmMHQ/uDcIvGqxy',1,'HSB 260','4600','','JUNIOR ASSISTANT','','','','','','','','','2016-03-15 19:02:02','2016-03-15 19:02:02','Mr.',0,'',0,'default',0),
	(238,'sac','Retired-Faculty','S. A. Choudum',' ','sac@retiree.iitm.ac.in','$2y$10$wkkaRI8zmtPB9RVGtDbLLuFUSxdK6or55vtEEnvv1mKNhVnJb6a..',1,'A1004,Salarpuria Serenity Apartments, 5th Main, 7th Sector HSR Layout, Bangalore 560102','9176278409','',' ','','','sac','','','','','','2016-03-15 19:04:36','2016-03-16 03:21:20','Prof.',0,'',0,'default',0),
	(239,'kalpakam','Retired-Faculty','S. Kalpakam',' ','kalpakam@retiree.iitm.ac.in','$2y$10$.RhKS1B.3iVC8yKc.aJqquFwoS4cDByXiGJIhK2XGgzTgxHW7cwZ6',1,' 3B, Sindur Prestige Point, 22, 1st Main Road, Kasturibai Nagar, Adyar, Chennai - 600020 , Email: kalpakam@retiree.iitm.ac.in,','044-24414354','',' ','','','kalpakam','','','','','','2016-03-15 19:06:41','2016-03-16 03:29:45','Prof.',0,'',0,'default',0),
	(240,'','Retired-Faculty','P. Achuthan',' ','','$2y$10$5yxN6td.RHVjo93O7XOBkug0BTM7VFzZa.scHnEIas/c93U4gxI9C',1,' \"om Akshramam\", No.3/II, Arumuga Nagar, Narayanapuram, Pallikaranai P.0.-601302',' 044 - 2245 0362','',' ','','','','','','','','','2016-03-15 19:07:20','2016-03-16 03:34:33','Prof.',0,'',0,'default',0),
	(241,'avudai','Retired-Faculty','A. Avudainayagam',' ','avudai@retiree.iitm.ac.in','$2y$10$slswIK.yd3pjLz6b8vefted/hsSK0R7kiKzudGb071rBRR0uLHWH.',1,' Block 1-3D, Ceebros Orchid,263/1, Velachery Main Road,Chennai - 600042','9840187150','','Professor','','','avudai','','','','','','2016-03-15 19:08:47','2016-03-16 03:32:06','Prof.',0,'',0,'default',0),
	(242,'','Retired-Faculty','K. Swaminathan',' ','','$2y$10$/5SjL6I9Jd25ezJd8oFEBeWuPtOOlolkl1uNLvkOqhL8fcUKI17La',1,' Oldno.9 Newno.17 ,5th Main Road Kasturibai Nagar,Adyar, Chennai 600 020',' ','',' ','','','','','','','','','2016-03-15 19:09:32','2016-03-16 03:34:03','Dr.',0,'',0,'default',0),
	(243,'prpiitm','Retired-Faculty','P. R. Parthasarathy',' ','prpiitm@gmail.com','$2y$10$MtcOxeqmEBeqVqvebvh0O.veKDK6c87kAdp64mgQWSsr/LgE2nAma',1,' No,6 Ayodhaya colony ,Velachery,chennai-600042 ',' 9940538317','',' ','','','prpiitm','','','','','','2016-03-15 19:10:11','2016-03-16 03:35:52','Prof.',0,'',0,'default',0),
	(244,'','Retired-Faculty','C. V. Raghava','Rao','','$2y$10$BPmd5exE/14ewbRfEOZ2J.fABRD5.0.xfLsu9k8yDRZpbmARwsiv6',1,'V.J.Flat, Old No.24/2, New No.61/2, Gandhi Nagar, 4 Main Road, Adyar,Chennai-600 020','044 - 2440 1800','',' ','','','','','','','','','2016-03-15 19:11:12','2016-03-16 03:33:34','Prof.',0,'',0,'default',0),
	(245,'','Retired-Faculty','V. Subba','Rao','','$2y$10$1dq6450aRryLnB/MEICvuOb4IdkFAC0qphjf7wBDtYp2t2BKSkUMC',1,' Innsumanda, Malikipuram Mand, East Godavari District, AndhraPradesh,  Cell: 9989327588 ','08862-255552','',' ','','','','','','','','','2016-03-15 19:11:55','2016-03-16 03:31:30','Prof.',0,'',0,'default',0),
	(246,'','Retired-Faculty','A. Rangan',' ','','$2y$10$MQxkUTHvLDFQEUDTAIgDG..UBYhowDHJl01yQs2hr1qBXaQyBxJNq',1,' 13, 5 Main Road, Vijaya Nagar, Velachery, Chennai-600 042',' ','',' ','','','','','','','','','2016-03-15 19:12:27','2016-03-16 03:32:20','Prof.',0,'',0,'default',0),
	(247,'','Retired-Faculty','S. N. Venkatarangan',' ','','$2y$10$CJeMHXXQ7EECWJYRDxjYPOiK.tRNXYVmFhCgU5AAOEucvUvvkQWZC',1,' H-12-L, South Avenue, Thiruvanmiyur, Chennai-600 041,','044-24417484','',' ','','','','','','','','','2016-03-15 19:13:04','2016-03-16 03:30:46','Prof.',0,'',0,'default',0),
	(248,'smajhi','Retired-Faculty','S. N. Majhi',' ','smajhi@hotmail.com','$2y$10$3QTTFvZLOTX08WL7nAd6ceGJG/B2aSM7snfhhHgUe75gdEy8jTUgS',1,' 5/3  I Street, Arumugam Nagar, IIT Colony,Narayanapuram,Chennai-601302.Ph:2246 3376, Cell:9840282327',' ','',' ','','','smajhi','','','','','','2016-03-15 19:13:46','2016-03-16 03:30:26','Prof.',0,'',0,'default',0),
	(249,'','Retired-Faculty','Y. Nagendra',' ','','$2y$10$Gq63xM6myrn/I4RbmPyexOUp0KFcg/P9m/Q0JO8XH/m3WNwRVbc1e',1,' 42/25-3, II Cross, Javariah Garden, III Block, Thyagaraja Nagara, Bangalore-560 028,','08453488745','',' ','','','','','','','','','2016-03-15 19:14:13','2016-03-16 03:31:46','Prof.',0,'',0,'default',0),
	(250,'','Retired-Faculty','U. N Srivastava',' ','','$2y$10$MHphtMUkvwfjEFx2zf.ORefieC8d5.okdMEv5Oj2V9VDh66KPbGfS',1,' Flat No.A7-201, Florida Estate, S.No.41,Keshav Nagar, Nandhawa, Pune-411 036',' ','',' ','','','','','','','','','2016-03-15 19:14:43','2016-03-16 03:31:00','Prof.',0,'',0,'default',0),
	(251,'pb1941','Retired-Faculty','P. Bhattacharyya',' ','pb1941@gmail.com','$2y$10$hCa3yWkFvDfup67jdw8luOJ2ZjHCzwRUOOIK5zDIR1RYjq0NYc3b2',1,' \'OM NIVAS\'(First Floor), 465/D-1, 3rd Cross, S.R. Layout, Murugeshpalya,Bangalore - 560 017 . Email id : pb1941@gmail.com  Mobile : 9481166271 ','080 - 25263113','',' ','','','pb1941','','','','','','2016-03-15 19:15:25','2016-03-16 03:35:24','Prof.',0,'',0,'default',0),
	(252,'','Retired-Faculty','C. M. Purushotham',' ','','$2y$10$y8TYtMBEDS77jMqwYhBIHO1iyK8awIteMWok0Nd0.wnpYR30oqxia',1,' No.782,12 Main Road 1 Cross, HAL,2 Stage, Banglore 560 008',' ','',' ','','','','','','','','','2016-03-15 19:15:50','2016-03-16 03:32:32','Prof.',0,'',0,'default',0),
	(253,'dsubramanyam11','Retired-Faculty','D. S. Subramanyam',' ','dsubramanyam11@gmail.com','$2y$10$FO8me8taX3It27LzJdovteAgLgXCCiKymSJzJZlWzC27ivXC8HFje',1,' CH-10, 7th Main Road, Secon Cross, Saraswathipuram, Mysore 570 009.',' ','',' ','','','dsubramanyam11','','','','','','2016-03-15 19:16:27','2016-03-16 03:33:50','Dr.',0,'',0,'default',0),
	(254,'gkamath01865','Retired-Faculty','S. G. Kamath',' ','gkamath01865@gmail.com','$2y$10$H8zuNcIgIWAdnll0XwX0l.arVT2CRip.JWj9DsO6eSV.i.r.2V3ba',1,' Plot#32,Ramappa Nagar MainRoad,Perugudi,Chennai:600096 phone: 64504248 / 9962979506','044-64504248','',' ','','','gkamath01865','','','','','','2016-03-15 19:17:14','2016-03-16 03:29:03','Prof.',0,'',0,'default',0),
	(255,'iitmpvs','Retired-Faculty','P. V. Subrahmanyam',' ','iitmpvs@gmail.com','$2y$10$V/aGOEmStmnmbrQ7boTXNerzQ81dnX8jTw3lDRQzaqAtubD3ATEQS',1,' 10, Manimegalai, 2nd street, Pallikaranai, Chennai - 600100 Ph: 9444018022','044-22461722','',' ','','','iitmpvs','','','','','','2016-03-15 19:17:56','2016-03-16 03:36:14','Prof.',0,'',0,'default',0),
	(257,'eh','PhD','testingphd',' ','eh@dfg.fdfg','$2y$10$K3f83sooGlj7HYAPsJ/W9ODLydNfJDS4M8rIPpulpKk5epfCqiPj.',1,'erg','gre','','erg','','','eh','','','','','','2016-03-18 05:46:25','2016-03-18 05:46:25','Mr.',0,'',0,'default',0),
	(258,'naru','PhD','Raman','Ramanathan','naru@iitm.ac.in','$2y$10$mur1NJYK2epaymnR.8Azq.gxD3AyoHt8NrKlesEL4dbMlRKNVnwJ2',1,'asdad','asdasd','','AP','','','naru','','','','','','2016-03-19 01:34:44','2016-03-19 01:34:44','Mr.',0,'',0,'default',0),
	(259,'test','PhD','test','test','test@tesst.com','$2y$10$sxn/rVLu3cnxI/O1ZFtW/.tORZJJUaj5GB704Hw6UfxEcFRB.qc/e',1,'er2','232','','JUNIOR SUPERINTENDENT','','','test','','','','','','2016-03-27 16:44:48','2016-03-27 16:44:48','Mr.',0,'',0,'default',0),
	(260,'hbefgq','PhD','test','et','hbefgq@jnrf.kwjnef','$2y$10$6bIVsl0ApU2AOVWLVT3Efu3WYHroTkAOj6K4roQSdEGbF2LfPlTGm',1,'wninf','23','','wbfeihb','','','hbefgq','','','','','','2016-03-27 16:49:22','2016-03-27 16:49:22','Mr.',0,'',0,'default',0),
	(261,'ijbew','PhD','konefg','ibeg','ijbew@jner.jns','$2y$10$yDmZ9/tzkyo7vB.Y3KAbZuzfaM3fegNlB1jSs1YWCJCeG5aC3Iqxe',1,'ijneg','34ni','','ijnf','','','ijbew','','','','','','2016-03-27 16:51:20','2016-03-27 16:51:20','Mr.',0,'',0,'default',0),
	(262,'jsv','PhD','jfdv','jk dv','jsv@kn.kndf','$2y$10$UacSJiFEUqUTg26khwkgOuOHqx7dCvamCfAJcvQNQciPOitvzQ8C2',1,'jndfv','3nfi3','','jdnv','','','jsv','','','ykIx4nhD0jLpUGwJ4aJFgnrYCv2cYNLVfLTWxDQOwKWbnzVvd4q7kZI982RC','','','2016-03-27 16:54:15','2016-09-26 15:14:11','Mr.',0,'',0,'default',0),
	(263,'nev','PhD','k sd','dfn','nev@nke.kem','$2y$10$QBkZVAXePObGYrIUnFpqleB4bsJlSmPecyEjAUntsVNCk4PCPu3Y2',1,'nefv','24rn','','jwnf','','','nev','','','','','','2016-03-27 16:56:11','2016-03-27 16:56:11','Ms.',0,'',0,'default',0),
	(265,'narayana','Post-Doctoral-Fellows','sreeman','narayan','narayana@gmail.com','$2y$10$77biTlDXTUqhkNCtA9zeHOHaPbWNVHeSEkw7XToXqXvoxcHTOsBk2',1,'aaa','2222','','PostDoc','','','narayana','','','','','','2016-05-02 06:08:17','2016-05-02 06:08:17','Dr.',0,'',0,'default',0),
	(266,'rdyderg','PhD','efdg','erg','rdyderg@ad.swdo','$2y$10$6hbIqKjh0LZOHc2doAf5PuzWJ42x18savNJveD1icTGXqJhArH3Bi',1,'rge','4','','reg','',NULL,'rdyderg','','',NULL,NULL,NULL,'2016-09-26 15:05:54','2016-09-26 15:05:54','Dr.',0,NULL,NULL,'default',0),
	(267,'test','Faculty','Test','Test','test@test.com','$2y$10$NpxZJrVubXdo4Hha8R1UtueJMLHVxpuF/6KhHAwOcS3QYtSPLW.AG',1,'Test','92958412358','','Test','',NULL,'test','','',NULL,NULL,NULL,'2017-02-27 16:06:26','2017-02-27 16:06:26','Mr.',0,NULL,NULL,'default',0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
