-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jun 15, 2016 at 07:07 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `test`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `sdp`
-- 

CREATE TABLE `students` (
  `sno` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `fee` double NOT NULL,
  PRIMARY KEY  (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `sdp`
-- 

INSERT INTO `students` VALUES (1, 'john', 'java', 500);
INSERT INTO `students` VALUES (2, 'kuresh', '.net', 400);
INSERT INTO `students` VALUES (3, 'vikesh', 'frameworks', 600);
INSERT INTO `students` VALUES (4, 'vikky', 'laravel', 500);
