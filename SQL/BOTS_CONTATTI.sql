-- phpMyAdmin SQL Dump
-- version 3.4.7.1
-- http://www.phpmyadmin.net

-- --------------------------------------------------------

--
-- Struttura della tabella `BOTS_CONTATTI`
--

CREATE TABLE IF NOT EXISTS `BOTS_CONTATTI` (
  `BotID` varchar(250) NOT NULL,
  `ContactID` varchar(20) NOT NULL,
  PRIMARY KEY (`BotID`,`ContactID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Contatti per bot';

