-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2016 at 12:11 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dev_math15feb`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(10) unsigned NOT NULL,
  `alnum_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alnum_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alnum_year` int(11) NOT NULL,
  `alnum_created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bibliography`
--

CREATE TABLE IF NOT EXISTS `bibliography` (
  `bibtexkey` varchar(255) NOT NULL DEFAULT '',
  `x_bibtex_type` text,
  `author` text,
  `title` text,
  `journal` text,
  `volume` text,
  `number` text,
  `pages` text,
  `year` text,
  `url` text,
  `timestamp` text,
  `biburl` text,
  `bibsource` text,
  `_author` text,
  `doi` text,
  `fjournal` text,
  `issn` text,
  `mrclass` text,
  `mrnumber` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bibliography`
--

INSERT INTO `bibliography` (`bibtexkey`, `x_bibtex_type`, `author`, `title`, `journal`, `volume`, `number`, `pages`, `year`, `url`, `timestamp`, `biburl`, `bibsource`, `_author`, `doi`, `fjournal`, `issn`, `mrclass`, `mrnumber`) VALUES
('DBLP:journals-combinatorics-BorozanCCFNNV15', 'article', 'Valentin Borozan and Gerard Jennhwa Chang and Nathann Cohen and Shinya Fujita and Narayanan Narayanan and Reza Naserasr and Petru Valicov', 'From Edge-Coloring to Strong Edge-Coloring', 'Electr. J. Comb.', '22', '2', 'P2.9', '2015', 'http://www.combinatorics.org/ojs/index.php/eljc/article/view/v22i2p9', 'Tue, 19 May 2015 01:00:00 +0200', 'http://dblp.uni-trier.de/rec/bib/journals/combinatorics/BorozanCCFNNV15', 'dblp computer science bibliography, http://dblp.org', '<span itemprop="author" itemtype="http://schema.org/Person">Valentin Borozan</span>, <span itemprop="author" itemtype="http://schema.org/Person">Gerard Jennhwa Chang</span>, <span itemprop="author" itemtype="http://schema.org/Person">Nathann Cohen</span>, <span itemprop="author" itemtype="http://schema.org/Person">Shinya Fujita</span>, <span itemprop="author" itemtype="http://schema.org/Person">Narayanan Narayanan</span>, <span itemprop="author" itemtype="http://schema.org/Person">Reza Naserasr</span>, <span itemprop="author" itemtype="http://schema.org/Person">Petru Valicov</span>', NULL, NULL, NULL, NULL, NULL),
('DBLP:journals-dm-ChangN13', 'article', 'Gerard Jennhwa Chang and N. Narayanan', 'On a conjecture on the balanced decomposition number', 'Discrete Mathematics', '313', '14', '1511â€“1514', '2013', 'http://dx.doi.org/10.1016/j.disc.2013.02.012', 'Mon, 22 Apr 2013 01:00:00 +0200', 'http://dblp.uni-trier.de/rec/bib/journals/dm/ChangN13', 'dblp computer science bibliography, http://dblp.org', '<span itemprop="author" itemtype="http://schema.org/Person">Gerard Jennhwa Chang</span>, <span itemprop="author" itemtype="http://schema.org/Person">N. Narayanan</span>', '10.1016/j.disc.2013.02.012', NULL, NULL, NULL, NULL),
('MR3318627', 'article', 'Balakrishnan, Kannan and Changat, Manoj and Lakshmikuttyamma, Anandavally K. and Mathew, Joseph and Mulder, Henry Martyn and Narasimha-Shenoi, Prasanth G. and Narayanan, N.', 'Axiomatic characterization of the interval function of a block graph', 'Discrete Math.', '338', '6', '885â€“894', '2015', 'http://dx.doi.org/10.1016/j.disc.2015.01.004', NULL, NULL, NULL, '<span itemprop="author" itemtype="http://schema.org/Person">Kannan Balakrishnan</span>, <span itemprop="author" itemtype="http://schema.org/Person">Manoj Changat</span>, <span itemprop="author" itemtype="http://schema.org/Person">Anandavally K. Lakshmikuttyamma</span>, <span itemprop="author" itemtype="http://schema.org/Person">Joseph Mathew</span>, <span itemprop="author" itemtype="http://schema.org/Person">Henry Martyn Mulder</span>, <span itemprop="author" itemtype="http://schema.org/Person">Prasanth G. Narasimha-Shenoi</span>, <span itemprop="author" itemtype="http://schema.org/Person">N. Narayanan</span>', '10.1016/j.disc.2015.01.004', 'Discrete Mathematics', '0012-365X', '05C12 (05C05)', '3318627');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(10) unsigned NOT NULL,
  `booking_user_id` int(11) NOT NULL,
  `booking_reasone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `booking_hall_id` int(11) NOT NULL,
  `booking_hall_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `booking_hall_to` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `booking_status` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `timefrom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timeto` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `booking_user_id`, `booking_reasone`, `booking_hall_id`, `booking_hall_from`, `booking_hall_to`, `created_at`, `updated_at`, `booking_status`, `timefrom`, `timeto`) VALUES
(1, 14, 'Midsem Disc Mathe', 2, '28-09-2015', '', '2015-09-18 01:30:46', '2015-09-18 01:30:46', '1', '17:00', '19:00');

-- --------------------------------------------------------

--
-- Table structure for table `bookpublished`
--

CREATE TABLE IF NOT EXISTS `bookpublished` (
  `id` int(10) unsigned NOT NULL,
  `book_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `book_authors` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `book_publisher` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `book_isbn` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `book_year` int(11) NOT NULL,
  `book_other_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `book_edition` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE IF NOT EXISTS `carousel` (
  `id` int(10) unsigned NOT NULL,
  `carousel_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `carousel_image_alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `carousel_image_anytext` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `carousel_image_order` int(11) NOT NULL,
  `carousel_image_uploaded_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conference_hall`
--

CREATE TABLE IF NOT EXISTS `conference_hall` (
  `id` int(10) unsigned NOT NULL,
  `conference_halls_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conference_halls_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conference_halls_incharge` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conference_halls_contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conference_halls_is_free` int(11) NOT NULL,
  `conference_halls_next_available_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conference_hall`
--

INSERT INTO `conference_hall` (`id`, `conference_halls_name`, `conference_halls_details`, `conference_halls_incharge`, `conference_halls_contact`, `conference_halls_is_free`, `conference_halls_next_available_date`, `created_at`, `updated_at`) VALUES
(2, 'HSB 357', 'HSB 357, 3rd Floor, Humanities and Sciences Building', 'Dr. Narayanan N', 'naru@iitm.ac.in', 0, '', '2015-09-18 01:28:25', '2015-09-18 01:28:25'),
(3, '', '', '', '', 0, '', '2015-09-18 01:28:31', '2015-09-18 01:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(10) unsigned NOT NULL,
  `contact_for` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_details` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_office_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contact_for`, `contact_details`, `contact_email`, `contact_office_email`, `contact_updated_by`, `created_at`, `updated_at`) VALUES
(2, 'HEAD OF THE DEPARTMENT', '\n					      <div><span style="font-weight: bold;">The Head, Department of Mathematics,</span></div><div>IIT Madras , Chennai - 600036, INDIA</div><div>Phone: +91 44 22574600 Fax: +91 44 22574602<br>mahead [at] iitm dot ac dot in<br></div>\n					  		                		                		                ', '', 'maoffice@iitm.ac.in', 14, '0000-00-00 00:00:00', '2015-11-03 05:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(10) unsigned NOT NULL,
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
  `courser_reference` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_no`, `course_name`, `course_credit`, `course_program_id`, `course_sem`, `course_year`, `course_details`, `course_added_by`, `created_at`, `updated_at`, `courser_reference`) VALUES
(1, 'MA5310', 'LINEAR ALGEBRA', '3', '1', '1', 2015, 'Systems of Linear Equations, Matrices and Elementary Row Operations, Row-Reduced Echelon Matrices . Vector Spaces, Subspaces, Bases and Dimension, Ordered basis and coordinates. Linear transformations, Rank-Nullity Theorem, The algebra of linear transformations, Isomorphism, Matrix representation of linear transformations, Linear Functionals, Annihilator, Double dual, Transpose of a linear transformation . Characteristic Values and Characteristic Vectors of linear transformations, Diagonalizability, Minimal polynomial of a linear transformation, Cayley-Hamilton Theorem, Invariant Subspaces, Direct-sum decompositions, Invariant Direct sums, The primary decomposition theorem, Cyclic subspaces and annihilators, Cyclic decomposition, rational, Jordan forms. Inner Product Spaces, Orthonormal Basis, Gram-Schmidt Theorem.', 14, '2015-09-17 07:24:40', '2015-09-17 07:24:40', '1.    I. N. Herstein: Topics in Algebra, 2nd Edition, John-Wiley, 1999.\r\n2.    S. Axler: Linear Algebra Done Right, 2nd Edition, Springer UTM, 1997.\r\n3.    S. Lang: Linear Algebra, Springer Undergraduate Texts in Mathematics, 1989.\r\n4.    S. Kumaresan: Linear Algebra: A Geometric Approach, Prentice-Hall of India, 2004.'),
(2, 'MA7830', 'ADVANCED ALGEBRA', '4', '3', '1', 2015, 'Groups: Basics of groups and its representations.   Commutative Rings: Dimension Theory, Regular local ring is a UFD. Hilbert functions.   Modules: The tensor, symmetric and exterior algebras of a module.   Non-commutative Rings: Review of Artin-Wedderburn theory including theorems of Jacobson-Bourbaki, Rieffel and Burnside, Kolchin''s theorem.   Homological Algebra: Categories and Functors, Abelian categories, Projective and Injective resolutions, Left and Right derived functors, Ext and Tor, Local and Cech homology.  ', 14, '2015-09-17 07:32:22', '2015-09-17 07:32:22', ' \r\nText Books:\r\n1.      S. Lang, Algebra, 3rd Edition, Addison-Wesley, 1999.\r\n2.      M. F. Atiyah, I. G. Macdonald, Introduction to Commutative Algebra. Addison-Wesley, 1969.\r\n3.      W. Fulton, J. Harris, Representation Theory - A First Course, GTM, Readings in Mathematics 129. Springer Verlag (1991).\r\n \r\nReference:\r\n1.      H. Matsumura, Commutative Ring Theory, Second edition,Cambridge Studies in Advanced Mathematics, 8.Cambridge University Press, Cambride 1989.\r\n2.      H. Matsumura, Commutative Algebra. Second edition. Mathematics Lecture Notes Series 56, Benjamin / Cummings Publishing,1980.\r\n3.      M. Artin, Algebra, Prentice Hall, 1994.'),
(3, 'MA5710', 'Mathematical Modelling in Industry', '3', '2', '1', 2015, 'Methodology: Models, reality, properties of models, system characterization, steps in building in mathematical models, source of errors, dimensional analysis, model classification and illustration.  Case Studies related to R&D fields (one in each): Simulated Reality [Example: Traffic flow, Motion of Fibers, Behavior of Vehicles - Multi body systems, Behavior of Filters etc]; Optimization and Control [Example: Inverse problems and parameter identification, multi criteria optimization, Optimal shape design etc]; Multiscale models and algorithms [Example: Considering scenes of different scales nano, micro, mezzo and macro, Different algorithms on different scales and combining them]; Risks and decisions [Example: Portfolio optimization, Option pricing etc]; Data, text and Images [Example: Signal processing, Input-Output systems, Discover order in data sets, Image Denoising etc)  Modeling Lab [Thinking with Mathematical Models through Problems): Counting, Estimation, Structuring and Reasoning; Frame work through different mathematical (structural) equations and analysis; Optimization; Probabilities and Stochastic Processes.', 14, '2015-09-17 07:34:05', '2015-09-17 07:34:05', '1. "Mathematical modeling: Case Studies with Industry", Alister D.Fitt, CRS & Springer, 2008.\r\n\r\n2. "Mathematical Modeling - A Case Study Approach", Reinhard Iliner, C.Sena Bohun, Samanta Mccallum and Thea van Roode, AMS, 2005.\r\n\r\n3. "Mathematics and Technology", Christiane Rousseau and Yuan Saint-Aubin, Springer, 2008.\r\n\r\n4. "Mathematical Models in Biology", Leah Edelstein-Kesht, SIAM, 2005.\r\n\r\n5. "Principles of Mathematical Modeling", Cliev L.Dym, Elsevier, 2004.\r\n\r\n6. "Mathematical Modeling of Earth''s Dynamical Systems", Rudy Slingerland and Lee Kump, Princeton University Press, 2011. 7. "Mathematical Modeling for the Life Sciences", Jacques Istas, Springer, 2005'),
(4, 'MA1010', 'Functions of Several Variables', '3', '4', '1', 2015, 'Functions of two and three variables:  Regions in plane, level curves and level surfaces, limit, continuity, partial derivatives, directional derivatives and gradient, normal to level curves and tangents, extreme values, Lagrange multipliers, double integral and iterated integral, volume of solids of revolution, approximation of volume, triple integral, change of variables, multiple integrals in cylindrical and spherical coordinates.  Vector calculus:  Gradient, Divergence, Curl, Line integral, conservative fields, Green''s theorem, surface area of solids of revolution, surface area, surface integral, Triple integrals and Gauss Divergence theorem, Stokes'' theorem.', 14, '2015-09-17 07:36:32', '2015-09-17 07:36:32', 'Text:\r\n\r\nG.B. Thomas Jr., M.D. Weir and J.R. Hass, Thomas Calculus, Pearson Education, 2009..\r\n\r\nREFERENCES:\r\n\r\n1. E. Kreyszig, Advanced Engineering Mathematics, 10th Ed., John Willey & Sons, 2010.\r\n\r\n2. N. Piskunov, Differential and Integral Calculus Vol. 1-2, Mir Publishers, 1974.\r\n\r\n3. G. Strang,Calculus, Wellesley-Cambridge Press, 2010.\r\n\r\n4. J.E. Marsden, A.J. Tromba, A. Weinstein, Basic Multivariable Calculus, Springer Verlag, 1993.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL,
  `events_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `events_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `events_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `events_end_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `events_type_id` int(11) NOT NULL,
  `events_show_in_menu` int(11) NOT NULL,
  `events_archive` int(11) NOT NULL,
  `events_created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `externallink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(11) NOT NULL,
  `mainspeaker` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anyguest` text COLLATE utf8_unicode_ci NOT NULL,
  `posterimage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `needpage` int(11) NOT NULL,
  `events_place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `events_starttime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `events_endtime` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `events_name`, `events_desc`, `events_date`, `events_end_date`, `events_type_id`, `events_show_in_menu`, `events_archive`, `events_created_by`, `created_at`, `updated_at`, `externallink`, `publish`, `mainspeaker`, `anyguest`, `posterimage`, `needpage`, `events_place`, `events_starttime`, `events_endtime`) VALUES
(1, 'It is so obvious it is a puzzle: The axiom of choice.', 'In this talk, we discuss the Choice Axiom', '02-09-2015', '', 13, 1, 0, 14, '2015-09-18 06:58:50', '2015-09-18 06:58:50', 'http://home.iitm.ac.in/naru/seminar/', 1, 'Prof R Ramanujam', '', '', 1, '2', '4:15 PM', '5:15 PM'),
(2, 'Erdos Magic', 'Paul Erdos, the famous wandering mathematician had an uncanny ability to connect problems with people. He also made several conceptual breakthroughs. One of the most talked about this is the "Probabilistic Method" aka Erdos Magic.  I will try to be the magician and present you the magic of Erdos.', '10-09-2015', '', 6, 1, 0, 14, '2015-09-18 07:09:13', '2015-09-18 07:09:13', 'http://home.iitm.ac.in/naru/seminar/', 1, 'Dr. N Narayanan, IIT Madras', '', '', 1, '2', '3:00 PM', '4:00 PM'),
(3, 'Primes are in P', 'We present the famous proof of AKS that checking whether an integer is prime number or not is in polynomial time.', '24-09-2015', '', 6, 1, 0, 14, '2015-09-18 07:12:39', '2015-09-18 07:12:39', '', 1, 'Sounak Mishra', '', '', 1, '2', '3:00 PM', '4:00 PM'),
(4, 'Graph Grammars', 'An introduction to graph grammars.  Let $G=(V,E)$ be a graph. A grammar on $G$ with vocabulary $\\Sigma$ is a quintuple $(\\Sigma, \\delta, \\omega, x, y)$ such that:', '23-09-2015', '', 13, 1, 0, 14, '2015-09-18 23:57:50', '2015-09-19 01:46:41', 'http://home.iitm.ac.in/naru/seminar/', 1, 'Prof. R Rama, IIT Madras', '', '', 0, '2', '4:15 PM', '5:15 PM'),
(5, 'ITCDM 2015', 'Indian Taiwan Conference on Discrete Mathematics', '10-07-2015', '', 7, 1, 0, 14, '2015-09-20 23:47:12', '2015-09-20 23:47:12', '', 1, '', '', '', 1, '2', '', ''),
(6, 'testr', 'tvc', '21-12-2015', '23-12-2015', 13, 1, 0, 14, '2015-12-20 19:35:48', '2015-12-20 19:35:48', '', 1, '', '', '', 1, '2', '', ''),
(7, 'The Magic of Young tableaux ', 'Young tableaux are certain combinatorial objects introduced in relation with some considerations in algebra. Pairs of Young tableaux with the same "shape" are enumerated by n! , that is the number of permutations on n elements. A famous correspondence is the Robinson-Schensted-Knuth algorithm (or RSK) which gives a one-to-one correspondence between these pairs of Young tableaux and permutations. It can be described in various different ways. The equivalence of these different constructions are fascinating. The famous computer scientist Donald Knuth said in 1972 "The unusual nature of these coincidences might lead us to suspect that some sort of witchcraft is operating behind the scene". This talk, accessible to every one, illustrates the nowadays style of combinatorial mathematics: visual, concrete, related to deep mathematics and magic.', '11-01-2016', '', 13, 1, 0, 14, '2016-01-07 22:37:39', '2016-01-07 22:37:39', '', 1, 'Prof. Xavier Viennot, CNRS Emeritus Research Director, Bordeaux University, France; Adjunct Professor, IMSc, Chennai.', '', '', 1, '2', '4:00 PM', '5:00 PM'),
(8, '3th35tttttttttttttttttt', '4t32th', '24-01-2016', '26-01-2016', 6, 1, 0, 14, '2016-01-24 01:58:03', '2016-01-24 01:58:03', '', 1, '', '', 'event_56a47d03da42e.jpg', 1, '2', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `events_type`
--

CREATE TABLE IF NOT EXISTS `events_type` (
  `id` int(10) unsigned NOT NULL,
  `events_type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `events_type_created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events_type`
--

INSERT INTO `events_type` (`id`, `events_type_name`, `events_type_created_by`, `created_at`, `updated_at`) VALUES
(6, 'Colloquium', 14, '2014-06-19 20:28:42', '2014-06-19 20:28:42'),
(7, 'Conferences', 14, '2014-06-19 20:29:03', '2014-06-19 20:29:03'),
(9, 'Meetings', 14, '2014-06-19 20:29:24', '2014-06-19 20:29:24'),
(10, 'Department Seminars', 105, '2015-01-21 23:24:21', '2015-01-21 23:24:21'),
(11, 'Public Lecture', 170, '2015-02-12 01:25:33', '2015-02-12 01:25:33'),
(12, 'Algebra Seminar Series', 14, '2015-09-18 01:19:56', '2015-09-18 01:19:56'),
(13, 'Discrete Mathematics Seminar Series', 14, '2015-09-18 01:20:09', '2015-09-18 01:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `footerinfo`
--

CREATE TABLE IF NOT EXISTS `footerinfo` (
  `id` int(10) unsigned NOT NULL,
  `footerinfo_updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `footerinfo_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(10) unsigned NOT NULL,
  `gallery_album_id` int(11) NOT NULL,
  `gallery_content_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gallery_content_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gallery_added_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `headerinfo`
--

CREATE TABLE IF NOT EXISTS `headerinfo` (
  `id` int(10) unsigned NOT NULL,
  `headerinfo_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `headerinfo_dept_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `headerinfo_tag_line` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `headerinfo_background_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `headerinfo_updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_main`
--

CREATE TABLE IF NOT EXISTS `menu_main` (
  `id` int(10) unsigned NOT NULL,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_link_alies` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_order` int(11) NOT NULL,
  `menu_has_child` int(11) NOT NULL,
  `menu_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_sub`
--

CREATE TABLE IF NOT EXISTS `menu_sub` (
  `id` int(10) unsigned NOT NULL,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_link_alies` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_order` int(11) NOT NULL,
  `menu_has_child` int(11) NOT NULL,
  `memu_parent_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL,
  `news_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `news_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `news_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `news_by` int(11) NOT NULL,
  `news_publish` int(11) NOT NULL,
  `news_archive` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `news_type` int(11) NOT NULL,
  `news_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_title`, `news_description`, `news_date`, `news_by`, `news_publish`, `news_archive`, `created_at`, `updated_at`, `news_type`, `news_link`) VALUES
(1, 'Link Testing', 'Test if the feature requested is enabled.', '2015-09-19', 14, 1, 0, '2015-09-19 01:29:00', '2015-09-19 01:31:14', 1, ''),
(2, 'This is a test', 'Testing', '2015-09-19', 14, 1, 0, '2015-09-19 01:29:33', '2015-09-19 01:31:20', 2, ''),
(3, 'link test 2', 'Test if the feature requested is enabled.', '2015-09-19', 14, 1, 0, '2015-09-19 01:30:51', '2015-09-19 01:31:10', 1, 'http://home.iitm.ac.in/naru/'),
(4, 'test 3', 'test 3', '2015-09-19', 14, 1, 0, '2015-09-19 01:31:46', '2015-09-19 01:35:49', 2, ''),
(5, 'test news monday', 'description 2', '2015-09-21', 14, 1, 0, '2015-09-21 05:41:09', '2015-09-21 05:41:36', 1, ''),
(6, 'Result anounced', 'Mathematics, hailed as the “Queen of Sciences” by Carl Fredrich Gauss, dreaded by many and loved by an equal number, has progressed rapidly since the beginning of recorded history. Mikhail B. Sevryuk noted in January 2006 that “the number of papers and bo', '2015-09-21', 14, 1, 0, '2015-09-21 05:43:47', '2015-09-21 05:43:54', 2, ''),
(7, 'Test on 3rd November', 'Testing continuiing', '2015-11-03', 14, 1, 0, '2015-11-03 05:29:29', '2015-11-03 05:29:29', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `token` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(10) unsigned NOT NULL,
  `program_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_total_sem` int(11) NOT NULL,
  `program_created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `overview` text COLLATE utf8_unicode_ci NOT NULL,
  `selection` text COLLATE utf8_unicode_ci NOT NULL,
  `strictureofprogram` text COLLATE utf8_unicode_ci NOT NULL,
  `carrer` text COLLATE utf8_unicode_ci NOT NULL,
  `orderinmenu` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `program_name`, `program_total_sem`, `program_created_by`, `created_at`, `updated_at`, `overview`, `selection`, `strictureofprogram`, `carrer`, `orderinmenu`) VALUES
(1, 'I M.Sc', 4, 14, '2015-09-17 07:23:07', '2015-12-13 19:42:59', 'The 4-semester M.Sc programme is carefully designed to impart essential knowledge in Mathematics with opportunities for specialization in all major areas of pure and applied mathematics. In the first three semesters the focus is on core courses. In the last semester the students have the option to choose courses from a list of special topics. Several, viva voce and project dissertations are integral part of the programme. A limited number of courses offered by the department of computer science and engineering can also be opted as electives.', 'Admission to M.Sc. programmes at IIT Madras is open to candidates qualified in JAM -Joint Admission Test to M.Sc. JAM is an allIndia common admission test for candidates seeking admission to Post Graduate programmes in Science subjects in all IITs.', 'The program consists of 4 semesters and has a total credit of 72', 'The course structure enables students to get admission for higher studies in India and abroad in Mathematics, Computer Science and Management. They also get placement in Industries and Educational Institutions. Of late, software industry has shown special', 0),
(2, 'II M.Sc.', 4, 14, '2015-09-17 07:26:58', '2015-12-13 19:43:26', 'Our department is successfully conducting an M.Tech programme in Industrial Mathematics and Scientific Computing. The duration of this programme is two years. The programme trains man power to solve industrial problems. It teaches to simulate, optimize and control technical, financial and organizational process. The curriculum aims at inculcating the knowledge of numerical methods and also in simulation and scientific computing. The students learn to work in team and become sound in technical communication.\r\n\r\nThe programme offers computer oriented courses and training in software such as Mathematica, Mathcad, Ansys, Fluent, Matlab, etc. The department provides excellent library and state of art computer facilities. It organizes industrial visits. The curriculum is drawn in consultation with European Consortium for Mathematics in Industry (ECMI)', 'The programme admits post graduate students of science and graduate students of engineering with a valid GATE score. For sponsored candidates GATE score is not mandatory.', 'The program consists of 4 semesters', 'After successful completion of this programme, the students are absorbed in research oriented industries as well as software based companies', 1),
(3, 'I MTech', 1, 14, '2015-09-17 07:30:53', '2015-12-13 19:43:56', 'Department conducts various research activities both fundamental and applied. The department offers guidance in the following broad fields of research in Mathematics leading to Doctor of Philosophy degree of the IIT Madras.\r\n\r\nDuring the programme the research scholars interact with the faculty and students of the parent as well as sister departments and take courses necessary for their research. The weekly seminars of the department help them to come in contact with eminent visiting mathematicians and scientists from India and abroad. The duration of programme is 2-5 years.', 'All the candidates called for interview are asked to come prepared with at least two areas.  They are informed about existing areas in the Ph.D. admission brochure and also the web site of the department.\r\nAll the faculty members are invited to attend the interviews.\r\nIn the interview, candidates are questioned mainly in their preferred areas.\r\nAt the time of final selection, guides for selected students are tentatively decided.  This is just to ensure the availability of guides.\r\nAt the time of joining, the selected students are informed about these tentative guides.  However they are free to meet other faculty members from the same area and explore the possibility of working with them.', 'Comprehensive Examination\r\nEvery Ph.D. Scholar has to appear in a Comprehensive Examination that is normally conducted at the end of first year.\r\nComprehensive examination will have both written and oral components. Written test is based on two compulsory topics, Linear Algebra and Real Analysis. Written and oral components have separate minimum of 40% to pass and overall minimum for pass is 50%.\r\nAfter successfull completion of comprehensive viva meeting, a research proposal meeting shall be conducted within a year in the form of a seminar.\r\n \r\nMore details can be found in R13 of Ph.D. Ordinances and Regulation', 'After completion of the programme, the scholars get excellent opportunities to join educational and research institutions in India and abroad. The placement office helps the scholars to get jobs in industries. During the last few years, several of our stu', 2),
(4, 'II MTech', 1, 14, '2015-09-17 07:35:43', '2015-12-13 19:44:13', 'Content not updated', 'Content not updated', 'Content not updated', 'Content not updated', 3),
(5, 'Ph.D.', 1, 14, '2015-12-13 19:51:49', '2015-12-13 19:51:49', 'Department conducts various research activities both fundamental and applied. The department offers guidance in the following broad fields of research in Mathematics leading to Doctor of Philosophy degree of the IIT Madras. During the programme the research scholars interact with the faculty and students of the parent as well as sister departments and take courses necessary for their research. The weekly seminars of the department help them to come in contact with eminent visiting mathematicians and scientists from India and abroad. The duration of programme is 2-5 years.', 'All the candidates called for interview are asked to come prepared with at least two areas. They are informed about existing areas in the Ph.D. admission brochure and also the web site of the department. All the faculty members are invited to attend the interviews. In the interview, candidates are questioned mainly in their preferred areas. At the time of final selection, guides for selected students are tentatively decided. This is just to ensure the availability of guides. At the time of joining, the selected students are informed about these tentative guides. However they are free to meet other faculty members from the same area and explore the possibility of working with them.', 'Comprehensive Examination Every Ph.D. Scholar has to appear in a Comprehensive Examination that is normally conducted at the end of first year. Comprehensive examination will have both written and oral components. Written test is based on two compulsory topics, Linear Algebra and Real Analysis. Written and oral components have separate minimum of 40% to pass and overall minimum for pass is 50%. After successfull completion of comprehensive viva meeting, a research proposal meeting shall be conducted within a year in the form of a seminar. More details can be found in R13 of Ph.D. Ordinances and Regulation', 'After completion of the programme, the scholars get excellent opportunities to join educational and research institutions in India and abroad. The placement office helps the scholars to get jobs in industries. During the last few years, several of our students have joined software industries through campus interviews.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE IF NOT EXISTS `publications` (
  `id` int(10) unsigned NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `author` text COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `volume` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abstract` text COLLATE utf8_unicode_ci NOT NULL,
  `attachment` text COLLATE utf8_unicode_ci,
  `pages` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `journal` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `added_by` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bibtexkey` text COLLATE utf8_unicode_ci NOT NULL,
  `x_bibtex_type` text COLLATE utf8_unicode_ci,
  `number` text COLLATE utf8_unicode_ci,
  `timestamp` text COLLATE utf8_unicode_ci,
  `biburl` text COLLATE utf8_unicode_ci,
  `bibsource` text COLLATE utf8_unicode_ci,
  `_author` text COLLATE utf8_unicode_ci,
  `fjournal` text COLLATE utf8_unicode_ci,
  `issn` text COLLATE utf8_unicode_ci,
  `mrclass` text COLLATE utf8_unicode_ci,
  `mrnumber` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `title`, `author`, `year`, `volume`, `abstract`, `attachment`, `pages`, `doi`, `journal`, `created_at`, `updated_at`, `added_by`, `url`, `bibtexkey`, `x_bibtex_type`, `number`, `timestamp`, `biburl`, `bibsource`, `_author`, `fjournal`, `issn`, `mrclass`, `mrnumber`) VALUES
(1, 'About Acyclic Edge Colouring of Planar Graphs', 'Anna Fiedorowicz, Marius Haluchaff, Narayanan Narayanan', '2014', '', '', NULL, '', '', 'Information Processing Letters', '2015-09-21 22:14:06', '2016-01-17 06:37:51', 185, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL),
(3, 'From Edge-Coloring to Strong Edge-Coloring', 'Valentin Borozan and Gerard Jennhwa Chang and Nathann Cohen and Shinya Fujita and Narayanan Narayanan and Reza Naserasr and Petru Valicov', '2015', '22', '', NULL, 'P2.9', '', 'Electr. J. Comb.', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'http://www.combinatorics.org/ojs/index.php/eljc/article/view/v22i2p9', 'DBLP:journals-combinatorics-BorozanCCFNNV15', 'article', '2', 'Tue, 19 May 2015 01:00:00 +0200', 'http://dblp.uni-trier.de/rec/bib/journals/combinatorics/BorozanCCFNNV15', 'dblp computer science bibliography, http://dblp.org', '<span itemprop="author" itemtype="http://schema.org/Person">Valentin Borozan</span>, <span itemprop="author" itemtype="http://schema.org/Person">Gerard Jennhwa Chang</span>, <span itemprop="author" itemtype="http://schema.org/Person">Nathann Cohen</span>, <span itemprop="author" itemtype="http://schema.org/Person">Shinya Fujita</span>, <span itemprop="author" itemtype="http://schema.org/Person">Narayanan Narayanan</span>, <span itemprop="author" itemtype="http://schema.org/Person">Reza Naserasr</span>, <span itemprop="author" itemtype="http://schema.org/Person">Petru Valicov</span>', NULL, NULL, NULL, NULL),
(4, 'On a conjecture on the balanced decomposition number', 'Gerard Jennhwa Chang and N. Narayanan', '2013', '313', '', NULL, '1511â€“1514', '10.1016/j.disc.2013.02.012', 'Discrete Mathematics', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'http://dx.doi.org/10.1016/j.disc.2013.02.012', 'DBLP:journals-dm-ChangN13', 'article', '14', 'Mon, 22 Apr 2013 01:00:00 +0200', 'http://dblp.uni-trier.de/rec/bib/journals/dm/ChangN13', 'dblp computer science bibliography, http://dblp.org', '<span itemprop="author" itemtype="http://schema.org/Person">Gerard Jennhwa Chang</span>, <span itemprop="author" itemtype="http://schema.org/Person">N. Narayanan</span>', NULL, NULL, NULL, NULL),
(5, 'Axiomatic characterization of the interval function of a block graph', 'Balakrishnan, Kannan and Changat, Manoj and Lakshmikuttyamma, Anandavally K. and Mathew, Joseph and Mulder, Henry Martyn and Narasimha-Shenoi, Prasanth G. and Narayanan, N.', '2015', '338', '', NULL, '885â€“894', '10.1016/j.disc.2015.01.004', 'Discrete Math.', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'http://dx.doi.org/10.1016/j.disc.2015.01.004', 'MR3318627', 'article', '6', NULL, NULL, NULL, '<span itemprop="author" itemtype="http://schema.org/Person">Kannan Balakrishnan</span>, <span itemprop="author" itemtype="http://schema.org/Person">Manoj Changat</span>, <span itemprop="author" itemtype="http://schema.org/Person">Anandavally K. Lakshmikuttyamma</span>, <span itemprop="author" itemtype="http://schema.org/Person">Joseph Mathew</span>, <span itemprop="author" itemtype="http://schema.org/Person">Henry Martyn Mulder</span>, <span itemprop="author" itemtype="http://schema.org/Person">Prasanth G. Narasimha-Shenoi</span>, <span itemprop="author" itemtype="http://schema.org/Person">N. Narayanan</span>', 'Discrete Mathematics', '0012-365X', '05C12 (05C05)', '3318627'),
(7, 'Testing import of bib', 'Alok kumar, Alokation', '2016', '338', '', NULL, '885â€“894', '10.1016/j.disc.2015.01.004', 'Deptcms', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'http://dx.doi.org/10.1016/j.disc.2015.01.004', 'TEST', 'article', '6', NULL, NULL, NULL, '<span itemprop="author" itemtype="http://schema.org/Person">Alokation Alok kumar</span>', 'Discrete Mathematics', '0012-365X', '05C12 (05C05)', '3318627'),
(8, 'qe', 'wef', '2012', 'w', '', NULL, 'wf', 'f', 'wf', '2016-05-02 21:36:15', '2016-05-02 21:36:15', 194, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'df', 'dfb', '2332', '', '', 'pubfile_57281a69d730b.jpg', '', '', 'fsd', '2016-05-02 21:56:33', '2016-05-02 21:56:33', 194, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'rewt', 'reg', '2343', '', '', 'pubfile_57281bacbc4e9.jpg', '', '', 'dsg', '2016-05-02 22:01:56', '2016-05-02 22:01:56', 194, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'rewt', 'reg', '2343', '', '', 'pubfile_57281bcff0609.jpg', '', '', 'dsg', '2016-05-02 22:02:31', '2016-05-02 22:02:31', 194, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'rewt', 'reg', '2343', '', '', 'pubfile_57281bf619445.jpg', '', '', 'dsg', '2016-05-02 22:03:10', '2016-05-02 22:03:10', 194, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'fggew', 'rew', '2321', '', '', 'pubfile_57281cbbe5eec.jpg', '', '', 'wfe', '2016-05-02 22:06:27', '2016-05-02 22:06:27', 194, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'wf', 'wfw', '2323', '', '', 'pubfile_57281d010a700.jpg', '', '', 'er', '2016-05-02 22:07:37', '2016-05-02 22:07:37', 194, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `researchgroup`
--

CREATE TABLE IF NOT EXISTS `researchgroup` (
  `id` int(10) unsigned NOT NULL,
  `researchgroup_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `researchgroup_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `researchgroup_users` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `researchgroup`
--

INSERT INTO `researchgroup` (`id`, `researchgroup_name`, `researchgroup_desc`, `researchgroup_users`, `created_at`, `updated_at`) VALUES
(8, 'Combinatorial Commutative Algebra', 'Several Algebraic problems have deep combinatorial structural properties. Studying this connection has shown promise in designing tools for algebraic manipulation. The CCA research group looks at graph based algebraic structures in this connection.', '', '2015-12-14 06:45:47', '2015-12-14 07:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `researchinfo`
--

CREATE TABLE IF NOT EXISTS `researchinfo` (
  `id` int(10) unsigned NOT NULL,
  `researchinfo_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `researchinfo_image` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `researchinfo`
--

INSERT INTO `researchinfo` (`id`, `researchinfo_desc`, `researchinfo_image`, `created_at`, `updated_at`) VALUES
(2, 'kjbeirgtest                              ', '', '2015-12-14 06:21:33', '2015-12-14 06:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `resource_album`
--

CREATE TABLE IF NOT EXISTS `resource_album` (
  `id` int(10) unsigned NOT NULL,
  `resource_album_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resource_album_created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resource_document`
--

CREATE TABLE IF NOT EXISTS `resource_document` (
  `id` int(10) unsigned NOT NULL,
  `resource_document_title` text COLLATE utf8_unicode_ci NOT NULL,
  `resource_document_body` text COLLATE utf8_unicode_ci NOT NULL,
  `resource_document_link` text COLLATE utf8_unicode_ci NOT NULL,
  `resource_document_file` text COLLATE utf8_unicode_ci NOT NULL,
  `resource_document_created_by` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `needlogin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resource_gallery`
--

CREATE TABLE IF NOT EXISTS `resource_gallery` (
  `id` int(10) unsigned NOT NULL,
  `resource_gallery_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resource_gallery_album_id` int(11) NOT NULL,
  `resource_gallery_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resource_gallery_size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resource_gallery_originalname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resource_gallery_filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resource_gallery_uploaded_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `resource_gallery`
--

INSERT INTO `resource_gallery` (`id`, `resource_gallery_text`, `resource_gallery_album_id`, `resource_gallery_type`, `resource_gallery_size`, `resource_gallery_originalname`, `resource_gallery_filename`, `resource_gallery_uploaded_by`, `created_at`, `updated_at`) VALUES
(4, '', 0, 'image/jpeg', '614', 'gallery_54ffe8f97ec11.jpg', 'gallery_56a4e525c60d4.jpg', '14', '2016-01-24 09:22:21', '2016-01-24 09:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `resource_links`
--

CREATE TABLE IF NOT EXISTS `resource_links` (
  `id` int(10) unsigned NOT NULL,
  `resource_links_title` text COLLATE utf8_unicode_ci NOT NULL,
  `resource_links_link` text COLLATE utf8_unicode_ci NOT NULL,
  `resource_links_created_by` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `needlogin` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `resource_links`
--

INSERT INTO `resource_links` (`id`, `resource_links_title`, `resource_links_link`, `resource_links_created_by`, `created_at`, `updated_at`, `needlogin`) VALUES
(1, 'The Institute of Mathematical Sciences, Chennai', 'http://www.imsc.res.in', '14', '2015-09-19 01:53:24', '2015-09-19 01:53:24', 0),
(2, 'Eservices', 'http://eservices.iitm.ac.in', '14', '2015-09-19 01:53:57', '2015-09-19 01:53:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(10) unsigned NOT NULL,
  `slider_order` int(11) NOT NULL,
  `slider_image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_uploaded_by` int(11) NOT NULL,
  `slider_text` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_order`, `slider_image_name`, `slider_uploaded_by`, `slider_text`, `created_at`, `updated_at`) VALUES
(1, 0, 'slide_55fabe8871dc8.JPG', 0, '', '2015-09-17 07:52:16', '2015-09-17 07:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `static_content`
--

CREATE TABLE IF NOT EXISTS `static_content` (
  `id` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `whichlocation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doneby` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `static_content`
--

INSERT INTO `static_content` (`id`, `content`, `whichlocation`, `doneby`, `created_at`, `updated_at`) VALUES
(2, '\n                                      \n                                      \n                                      \n                                      \n                                      \n                                      \n                                      \n                                      \n                                      <div style="text-align: justify; ">Mathematics, hailed as the “Queen of Sciences” by Carl Fredrich Gauss, dreaded by many and loved by an equal number, has progressed rapidly since the beginning of recorded history. Mikhail B. Sevryuk noted in January 2006 that “the number of papers and books included in the Mathematical Reviews database since 1940(the first year of publication of MR) is now more than 1.9 million and about 75 thousand items are added to the database each year”.</div><div style="text-align: justify;"><br></div><div style="text-align: justify;">At IIT Madras, Department of Mathematics was set up in 1960. Abstraction and application rooted in quantitative reasoning sustain all its activities. International Collaboration through MOUs signed by the institute aids the exchange of faculty members and students. Several eminent mathematicians visit the Department from time to time and collaborate with the faculty members of the Department. Research monograph brought out by well-known international publishers from part of the research output of the members of the faculty.</div><div style="text-align: justify;"><br></div><div style="text-align: justify;">The Department conducts research in Algebra, Analysis, Computational &amp; Theoretical Fluid Dynamics, Mathematical Physics, Stochastic Processes, Theoretical Computer Science and Discrete Mathematics.</div><div style="text-align: justify;"><br></div><div style="text-align: justify;">The department keeps in pace with the advances in technology, by providing its students with separate and state-of-the-art computer facilities for the M. Sc/M. Tech. and Ph. D students. The students gain knowledge of various new areas of research using the free Internet facilities made available in their labs. The department also has its own library with a large collection of books on Mathematics and Computer Science.</div><div style="text-align: justify;"><br></div><div style="text-align: justify;">The students get the opportunity of attending seminars and invited lectures addressed by eminent mathematicians, faculty members from IIT, professors from other institutes and speakers from other areas of interest.</div><div style="text-align: justify;"><br></div><div style="text-align: justify; ">The department celebrates the birthday of the great Mathematician, Srinivasa Ramanujan that falls on December 22nd by organizing a National Symposium on Mathematical Methods and Applications (NSMMA). In the month of February, the department gets active with FORAYS, the Math fest, enabling students of colleges in and around Chennai to exchange views on new trends in Mathematics and its Applications.</div><div style="text-align: justify; "><div><span style="line-height: 1.42857;"><script type="math/tex; mode=display" id="MathJax-Element-3">x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}.</script></span></div></div><div style="text-align: justify; "><div><span class="MathJax_Preview" style="color: inherit;"></span><div class="MathJax_Display MathJax_Processing"><span class="MathJax" id="MathJax-Element-3-Frame" tabindex="0"></span></div><span class="MathJax_Preview" style="color: inherit;"></span><div class="MathJax_Display MathJax_Processing"><span class="MathJax" id="MathJax-Element-3-Frame" tabindex="0"></span></div><script type="math/tex; mode=display" id="MathJax-Element-3">x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}.</script></div></div>                                                                                                                                                                                                                                                                                                                  ', 'home', 14, '0000-00-00 00:00:00', '2016-01-24 20:17:04'),
(3, 'No content uploaded', 'videos', 14, '0000-00-00 00:00:00', '2015-09-17 23:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) unsigned NOT NULL,
  `student_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_rollno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_guide_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_program_id` int(11) NOT NULL,
  `student_year` int(11) NOT NULL,
  `student_added_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `temp` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `student_rollno`, `student_guide_name`, `student_program_id`, `student_year`, `student_added_by`, `created_at`, `updated_at`, `temp`) VALUES
(23, 'student name', '123456', 'guide name (can be blank)', 1, 2015, 14, '2015-12-20 17:23:39', '2015-12-20 17:23:39', ''),
(24, 'student name', '123456', 'guide name (can be blank)', 5, 2015, 14, '2016-02-26 22:25:19', '2016-02-26 22:25:19', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_active` int(11) NOT NULL,
  `user_office` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_researchfield` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_lab_office_stores` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_personal_homepage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_namehandle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_profilepics` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_sex` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_dob` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_title` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `isadmin` int(11) NOT NULL,
  `ingroup` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `issuper` int(11) NOT NULL,
  `user_subtype` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default',
  `user_subtype_sort` tinyint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `user_type`, `user_fname`, `user_lname`, `user_email`, `password`, `user_active`, `user_office`, `user_phone`, `user_researchfield`, `user_designation`, `user_lab_office_stores`, `user_personal_homepage`, `user_namehandle`, `user_profilepics`, `remember_token`, `user_sex`, `user_dob`, `created_at`, `updated_at`, `user_title`, `isadmin`, `ingroup`, `issuper`, `user_subtype`, `user_subtype_sort`) VALUES
(14, 'superadmin', '', 'Admin', '', 'alok@desto.co.in', '$2y$10$qxhH32eBuHyC1R8MovgUxujxI.hUwz96ayv23KbKlKZJoHsJ2LWt2', 1, 'IIT Research Park', '0000000000', '', '', '', '', 'superadmin', '', 'oloVbvyPY35tn7TDLZdmcumHPfciUE0rwrINyMHPwpBnltAIBenF9WoXPuXa', '', '', '0000-00-00 00:00:00', '2016-05-01 21:50:35', '', 1, '', 1, 'default', 0),
(185, 'naru', 'Faculty', 'Narayanan', 'N', 'naru@iitm.ac.in', '$2y$10$LZd.D4yzWb/4.O792zMxNeN/XUrl0I9hLfMiIHGLW1SzfQrizd0HK', 1, 'HSB 240C', '4605', '', 'Asst. Professor', '', '', 'naru', '', 'i9J87oxhWDscmN5t0XlNh6yXWfdo8GqNT5eNfauIBRLpsoIsby5YRWqOeZbW', 'Male', '', '2015-09-18 01:17:39', '2016-01-17 09:13:56', 'Dr.', 0, '', 0, 'Faculty', 0),
(186, 'jayanav', 'Faculty', 'Jayanthan ', 'A V', 'jayanav@iitm.ac.in', '$2y$10$LZd.D4yzWb/4.O792zMxNeN/XUrl0I9hLfMiIHGLW1SzfQrizd0HK', 1, 'HSB 240B', '4625', '', 'Associate Professor', '', '', 'jayanav', '', '', 'Male', '', '2015-09-18 01:22:51', '2015-09-18 01:22:51', 'Dr.', 0, '', 0, 'Faculty', 0),
(189, '', 'Inspire-Faculty', 'alok', 'Kumar', 'alokmail108@gmail.com', '$2y$10$ZPIhRkCDMGhXBYWBt96UPu7TxvCMMW4g7DEVtgExrWTO3jrcpJ3aO', 1, 'fsfts', '+917667006355', '', 'eth', '', '', 'alokmail108', '', '', 'Male', '', '2016-02-26 22:17:27', '2016-02-26 22:17:27', 'Mr.', 0, '', 0, 'default', 0),
(190, '', 'Staff', 'rbf', 'erg', '', '$2y$10$e3HGGQlrLLtTGzIsM8wowOYqxkkfyPPoeKhFrxjyoK/.QAGj6wrRG', 1, 'wef', '32', '', 'qfe3', '', '', '', '', '', '', '', '2016-03-04 19:55:53', '2016-03-04 19:55:53', 'Mr.', 0, '', 0, 'default', 0),
(191, '', 'Retired-Faculty', 'qwr', 'qfe', '', '$2y$10$DwX.LhOGHXsqDvVgMUoE8OJBzZgIjDwKQ9B2RGZeJeTq7wM5mpynW', 1, 'qww', 'qw', '', 'qwer', '', '', '', '', '', '', '', '2016-03-04 20:15:03', '2016-03-04 20:15:03', 'Mr.', 0, '', 0, 'default', 0),
(193, 'testpdf', 'Post-Doctoral-Fellows', 'PDF', 'Test', 'testpdf@gmail.com', '$2y$10$G8QNMEqkOMCK796XJ92.3epQ8eYjBfJPWdBgKwGU0cwwSxmaw31a.', 1, 'jnwef', '3214321', '', 'Professor', '', '', 'testpdf', '', '', '', '', '2016-05-01 22:13:41', '2016-05-01 22:13:41', 'Dr.', 0, '', 0, 'default', 0),
(194, 'qwer', 'PhD', 'qwer', 'wefc', 'qwer@iitm.ac.in', '$2y$10$Kx3isu9XP.AckHXvtNdChur0HJj7pH0MEhg4VBCvWr5l1EXrHP8A6', 1, 'wef', '3211', '', 'aefw', '', '', 'qwer', '', '', '', '', '2016-05-02 20:52:27', '2016-05-02 20:52:27', 'Dr.', 0, '', 0, 'default', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(10) unsigned NOT NULL,
  `user_details_group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_details_personal_homepage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_details_have_any_book` int(11) NOT NULL,
  `user_details_have_any_publication` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(10) unsigned NOT NULL,
  `group_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `group_other_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group_created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_privileges`
--

CREATE TABLE IF NOT EXISTS `user_privileges` (
  `id` int(10) unsigned NOT NULL,
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
  `bookings` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_privileges`
--

INSERT INTO `user_privileges` (`id`, `user_id`, `people`, `student`, `research`, `programs`, `events`, `resources`, `newannouncement`, `createadmin`, `created_at`, `updated_at`, `bookings`) VALUES
(1, 14, 1, 1, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2015-01-12 12:28:47', 1),
(93, 185, 1, 1, 0, 1, 1, 1, 1, 1, '2015-09-18 01:17:39', '2016-01-07 22:17:30', 1),
(94, 186, 0, 0, 0, 0, 0, 0, 0, 0, '2015-09-18 01:22:51', '2015-09-18 01:22:51', 0),
(95, 187, 0, 0, 0, 0, 0, 0, 0, 0, '2015-12-13 14:59:14', '2015-12-13 14:59:14', 0),
(96, 188, 0, 0, 0, 0, 0, 0, 0, 0, '2015-12-14 08:48:43', '2015-12-14 08:48:43', 0),
(97, 189, 0, 0, 0, 0, 0, 0, 0, 0, '2016-02-26 22:17:28', '2016-02-26 22:17:28', 0),
(98, 190, 0, 0, 0, 0, 0, 0, 0, 0, '2016-03-04 19:55:53', '2016-03-04 19:55:53', 0),
(99, 191, 0, 0, 0, 0, 0, 0, 0, 0, '2016-03-04 20:15:03', '2016-03-04 20:15:03', 0),
(100, 192, 0, 0, 0, 0, 0, 0, 0, 0, '2016-05-01 21:20:26', '2016-05-01 21:20:26', 0),
(101, 193, 0, 0, 0, 0, 0, 0, 0, 0, '2016-05-01 22:13:41', '2016-05-01 22:13:41', 0),
(102, 194, 0, 0, 0, 0, 0, 0, 0, 0, '2016-05-02 20:52:27', '2016-05-02 20:52:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(10) unsigned NOT NULL,
  `user_type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type_created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_subtype` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_type_name`, `user_type_created_by`, `created_at`, `updated_at`, `link`, `user_subtype`) VALUES
(4, 'Faculty', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Faculty', '0'),
(6, 'Inspire Faculty', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Inspire-Faculty', '0'),
(8, 'Visiting Faculty', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Visiting-Faculty', '0'),
(9, 'Post Doctoral Fellows', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Post-Doctoral-Fellows', '0'),
(10, 'Staff', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Staff', '0'),
(11, 'Retired Faculty', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Retired-Faculty', '0'),
(12, 'Ph.D', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PhD', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bibliography`
--
ALTER TABLE `bibliography`
  ADD PRIMARY KEY (`bibtexkey`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookpublished`
--
ALTER TABLE `bookpublished`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conference_hall`
--
ALTER TABLE `conference_hall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_type`
--
ALTER TABLE `events_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footerinfo`
--
ALTER TABLE `footerinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headerinfo`
--
ALTER TABLE `headerinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_main`
--
ALTER TABLE `menu_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_sub`
--
ALTER TABLE `menu_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `researchgroup`
--
ALTER TABLE `researchgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `researchinfo`
--
ALTER TABLE `researchinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resource_album`
--
ALTER TABLE `resource_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resource_document`
--
ALTER TABLE `resource_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resource_gallery`
--
ALTER TABLE `resource_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resource_links`
--
ALTER TABLE `resource_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_content`
--
ALTER TABLE `static_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_privileges`
--
ALTER TABLE `user_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bookpublished`
--
ALTER TABLE `bookpublished`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conference_hall`
--
ALTER TABLE `conference_hall`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `events_type`
--
ALTER TABLE `events_type`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `footerinfo`
--
ALTER TABLE `footerinfo`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `headerinfo`
--
ALTER TABLE `headerinfo`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu_main`
--
ALTER TABLE `menu_main`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu_sub`
--
ALTER TABLE `menu_sub`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `researchgroup`
--
ALTER TABLE `researchgroup`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `researchinfo`
--
ALTER TABLE `researchinfo`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `resource_album`
--
ALTER TABLE `resource_album`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resource_document`
--
ALTER TABLE `resource_document`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resource_gallery`
--
ALTER TABLE `resource_gallery`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `resource_links`
--
ALTER TABLE `resource_links`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `static_content`
--
ALTER TABLE `static_content`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=195;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_privileges`
--
ALTER TABLE `user_privileges`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
