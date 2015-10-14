-- phpMyAdmin SQL Dump
-- version 3.4.7.1
-- http://www.phpmyadmin.net

-- --------------------------------------------------------

--
-- Struttura della tabella `BOTS`
--

CREATE TABLE IF NOT EXISTS `BOTS` (
  `BotID` varchar(250) NOT NULL,
  `BotDescription` varchar(250) DEFAULT NULL,
  `BotType` varchar(11) NOT NULL DEFAULT 'TELEGRAM',
  PRIMARY KEY (`BotID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
