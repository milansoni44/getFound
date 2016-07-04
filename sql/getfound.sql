-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2016 at 06:56 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `getfound`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `email_verification` varchar(50) DEFAULT NULL,
  `password_token` varchar(50) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `business_name` varchar(50) DEFAULT NULL,
  `business_url` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `twillio_sid` varchar(50) DEFAULT NULL,
  `twillio_token` varchar(50) DEFAULT NULL,
  `google_plus_url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `status`, `email_verification`, `password_token`, `contact`, `business_name`, `business_url`, `website`, `twillio_sid`, `twillio_token`, `google_plus_url`) VALUES
(1, 'Nitin', 'M', 'Johson', 'nitin.johnson2000@gmail.com', '0192023a7bbd73250516f069df18b500', NULL, NULL, 'D4Pg86sYxapc14mlHr3TqceHx6ZLAfKd', '', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Dhaval', 'k ', 'Thakor', 'dhavalthakor28691@gmail.com', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Milan', 'M', 'Soni', 'milansoni44@gmail.com', '0192023a7bbd73250516f069df18b500', NULL, NULL, 'Z10uq2NV1CfjtnFXOSYOniIgLPtECdKC', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Janak', 'k', 'Gajjar', 'janak@vakratundasystem.in', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Ankit', 'k', 'Joshi', 'ankit@vakratundasystem.in', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Dharmen', 'm', 'Panchal', 'dharmen@vakratundasystem.in', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Vipul', 'A', 'Chavda', 'vipul@vakratundasystem.mn', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Deep', 'H', 'Shah', 'deep@vakratundasystem.in', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Anuj', 'M', 'Patel', 'anuj@vakratundasystem.in', '0192023a7bbd73250516f069df18b500', 'disable', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Abrahm', 'M', 'Lincoln', 'abrahm@vakratudasystem.in', '0192023a7bbd73250516f069df18b500', 'enable', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Nikul', 'L', 'Patel', 'nikul', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Anajana', 'M ', 'Parikh', 'anajan@vakratundasystem.in', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Anuja', 'M', 'Parikh', 'anuja@vakratundasystem.in', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Ramila', 'Patel', 'm', 'ramila@vakratundasystem.in', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, '35435415314', 'dadassd', '', '', '', '', ''),
(15, 'Deepika', 'L', 'Padukone', 'deepika@vakratundasystem.in', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Ansu', 'k', 'Mehta', 'ansu@vakratundasystem.in', '0192023a7bbd73250516f069df18b500', 'disable', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Nirav', 'K', 'Soni', 'nirav@vakratundasystem.in', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'bhadresh', 'k', 'thakor', 'bhadresh@vakratundasystem.in', '8239c848e3600de2beee9f6823e3d21b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'shweta', 'k', 'thakor', 'shweta@vakratundasystem.in', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Bhavesh', 'K', 'Prajapati', 'bhavesh@vakratundasystem.in', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Bhavik', 'K', 'patel', 'bhavik@vakratundasystem.in', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Aakash', 'K', 'Maheta', 'aakash@vakratundasystem.in', '0192023a7bbd73250516f069df18b500', 'enable', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Monil', 'M', 'Shah', 'monil@vakratundasystem.in', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) DEFAULT NULL,
  `deal_title` varchar(100) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `call_tracking_number` varchar(50) DEFAULT NULL,
  `twilio_sid` varchar(100) DEFAULT NULL,
  `twilio_token` varchar(100) DEFAULT NULL,
  `google_listing_url` varchar(100) DEFAULT NULL,
  `localverification_site` varchar(100) DEFAULT NULL,
  `analytic_id` varchar(20) DEFAULT NULL,
  `analytic_user_id` varchar(20) DEFAULT NULL,
  `pipedrive_stage` varchar(20) DEFAULT 'arb_activated',
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(50) DEFAULT NULL,
  `password_token` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'disable',
  `notify_client` varchar(10) DEFAULT 'false',
  `is_created` varchar(6) DEFAULT 'false',
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `deal_id`, `deal_title`, `contact_person`, `contact_email`, `phone`, `call_tracking_number`, `twilio_sid`, `twilio_token`, `google_listing_url`, `localverification_site`, `analytic_id`, `analytic_user_id`, `pipedrive_stage`, `date_time`, `password`, `password_token`, `status`, `notify_client`, `is_created`) VALUES
(5, 2678, 'Burkhalter Wrecking Inc Connect', NULL, 'primary: True\nvalue: ', 'primary: True\nvalue: ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'arb_activated', '2015-07-07 15:00:43', NULL, NULL, 'enable', 'true', 'false'),
(6, 2684, 'Parking Lot Maintenance Inc Co connect upsell', NULL, 'plminc1@yahoo.com', '(616) 698-8834', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'arb_activated', '2015-07-07 16:55:37', NULL, NULL, 'enable', 'true', 'false'),
(7, 2712, 'Reddinger Electric connect upsell', NULL, 'reddinger3561@windstream.net', '(814) 797-1455', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'arb_activated', '2015-07-09 15:05:58', NULL, NULL, 'enable', 'true', 'false'),
(8, 2767, 'Albert V Evans Connect', NULL, 'evansalbertv@qwestoffice.net', '(303) 427-5581', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'arb_activated', '2015-07-14 18:33:47', NULL, NULL, 'enable', 'true', 'false'),
(9, 2768, 'MetroWest SRGC Inc Connect', NULL, 'primary: True\nvalue: ', 'primary: True\nvalue: ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'arb_activated', '2015-07-15 17:29:20', NULL, NULL, 'enable', 'true', 'false'),
(10, 2782, 'Joyce Funches PA Attorney At Law Connect', NULL, 'primary: True\nvalue: ', 'primary: True\nvalue: ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'arb_activated', '2015-07-15 18:41:11', NULL, NULL, 'enable', 'true', 'false'),
(11, 2789, 'Moore Comfort Care Heating & Air Conditioning Connect', NULL, 'primary: True\nvalue: ', 'primary: True\nvalue: ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'arb_activated', '2015-07-16 13:48:27', NULL, NULL, 'enable', 'true', 'false'),
(12, 2791, 'Power Solutions LLC Connect', NULL, 'powersolutionspa@yahoo.com', '(412) 225-4761', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'arb_activated', '2015-07-16 14:29:41', NULL, NULL, 'enable', 'true', 'false'),
(13, 2802, 'Buffkin Tile Connect', NULL, 'primary: True\nvalue: ', 'primary: True\nvalue: ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'arb_activated', '2015-07-16 16:14:22', NULL, NULL, 'enable', 'true', 'false'),
(14, 2806, 'Abel Chiropractic Dr Raymond Abel Connect', NULL, 'drrabel@outlook.com', '(218) 262-5203', '', '', '', 'https://plus.google.com/u/4/b/104210848432713290551/+AbelChiropracticDrRaymondAbelHibbing/about', '', '105486369', '', 'arb_activated', '2015-07-16 16:59:56', NULL, NULL, 'enable', 'true', 'false'),
(18, 2813, 'North Arkansas Chiropractic Connect', 'Clint  Freeman', 'primary: True\nvalue: ', 'primary: True\nvalue: ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'arb_activated', '2015-07-16 18:41:24', NULL, NULL, 'disable', 'true', 'false'),
(19, 2819, 'Ronald Iannucci CFP: Cornerstone Professional Park Connect', 'Ron Iannucci', 'primary: True\nvalue: ', 'primary: True\nvalue: ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'arb_activated', '2015-07-16 19:46:59', NULL, NULL, 'disable', 'false', 'false'),
(20, 2839, 'Donald T Tesch Law Offices Connect', 'Donald  Tesch', 'primary: True\nvalue: ', 'primary: True\nvalue: ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'arb_activated', '2015-07-20 17:35:37', NULL, NULL, 'disable', 'false', 'false'),
(21, 5456, 'Test', 'test', 'milansoni44@gmail.com', '54654465464647', '45341314315351', 'sdasdgsdfgbhsdf', 'sdgvsdfbgsdfgd', 'https://plus.google.com', 'abc.com', '64565343', NULL, 'completed', '2015-08-04 13:45:53', '0192023a7bbd73250516f069df18b500', 'scfasdasdAAASa', 'enable', 'true', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `credential`
--

CREATE TABLE IF NOT EXISTS `credential` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) DEFAULT NULL,
  `twilio_sid` varchar(100) DEFAULT NULL,
  `twilio_token` varchar(100) DEFAULT NULL,
  `analytic_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `credential`
--

INSERT INTO `credential` (`id`, `deal_id`, `twilio_sid`, `twilio_token`, `analytic_id`) VALUES
(1, 2609, 'dasfsdgs5446456341asdas6d146364', 'dasd4135144131sfdc4343sdasd4341', '54');

-- --------------------------------------------------------

--
-- Table structure for table `month_wise_report`
--

CREATE TABLE IF NOT EXISTS `month_wise_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `report_status` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `google_listing_views` int(11) NOT NULL,
  `tracked_calls` int(11) NOT NULL,
  `published_directory` int(11) NOT NULL DEFAULT '0',
  `website_views` int(11) NOT NULL DEFAULT '0',
  `date_time` date NOT NULL,
  `remarks` varchar(1000) DEFAULT NULL,
  `isUpdated` char(5) NOT NULL DEFAULT '0',
  `emailed_status` char(5) NOT NULL,
  `report_status` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `report_ready`
--

CREATE TABLE IF NOT EXISTS `report_ready` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `DateTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `client_id` (`client_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
