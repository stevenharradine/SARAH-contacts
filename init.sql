-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 20, 2015 at 11:08 PM
-- Server version: 5.5.43-0ubuntu0.14.10.1
-- PHP Version: 5.5.12-2ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `sarah`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
`CONTACT_ID` int(5) NOT NULL,
  `USER_ID` int(5) NOT NULL,
  `first_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `last_name` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `contacts_address`
--

CREATE TABLE IF NOT EXISTS `contacts_address` (
`ADDRESS_ID` int(5) NOT NULL,
  `CONTACT_ID` int(11) NOT NULL,
  `location` text NOT NULL,
  `street_number` int(11) NOT NULL,
  `street_name` text NOT NULL,
  `street_type` text NOT NULL,
  `street_direction` text NOT NULL,
  `postal_code` text NOT NULL,
  `city` text NOT NULL,
  `province` text NOT NULL,
  `country` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `contacts_email`
--

CREATE TABLE IF NOT EXISTS `contacts_email` (
`EMAIL_ID` int(5) NOT NULL,
  `CONTACT_ID` int(11) NOT NULL,
  `location` text NOT NULL,
  `email` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `contacts_notes`
--

CREATE TABLE IF NOT EXISTS `contacts_notes` (
`NOTE_ID` int(5) NOT NULL,
  `CONTACT_ID` int(5) NOT NULL,
  `note` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `contacts_phonenumber`
--

CREATE TABLE IF NOT EXISTS `contacts_phonenumber` (
`PHONENUMBER_ID` int(5) NOT NULL,
  `CONTACT_ID` int(5) NOT NULL,
  `location` text NOT NULL,
  `phonenumber` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
 ADD PRIMARY KEY (`CONTACT_ID`);

--
-- Indexes for table `contacts_address`
--
ALTER TABLE `contacts_address`
 ADD PRIMARY KEY (`ADDRESS_ID`);

--
-- Indexes for table `contacts_email`
--
ALTER TABLE `contacts_email`
 ADD PRIMARY KEY (`EMAIL_ID`);

--
-- Indexes for table `contacts_notes`
--
ALTER TABLE `contacts_notes`
 ADD PRIMARY KEY (`NOTE_ID`);

--
-- Indexes for table `contacts_phonenumber`
--
ALTER TABLE `contacts_phonenumber`
 ADD PRIMARY KEY (`PHONENUMBER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
MODIFY `CONTACT_ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `contacts_address`
--
ALTER TABLE `contacts_address`
MODIFY `ADDRESS_ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contacts_email`
--
ALTER TABLE `contacts_email`
MODIFY `EMAIL_ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contacts_notes`
--
ALTER TABLE `contacts_notes`
MODIFY `NOTE_ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contacts_phonenumber`
--
ALTER TABLE `contacts_phonenumber`
MODIFY `PHONENUMBER_ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;