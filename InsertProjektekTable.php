<?php
include_once("InsertTableIntoDB.php");

CreateTableInDB("projektek",
	"CREATE TABLE `projektek` (
	`id` int(3) NOT NULL AUTO_INCREMENT,
  	`p_nev` varchar(30) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  	`p_leiras` varchar(200) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  	`p_megrendelo` varchar(50) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  	`p_hatarido` date NOT NULL, PRIMARY KEY (id))
  	 ENGINE=MyISAM CHARSET=utf8 COLLATE utf8_hungarian_ci;",
	"INSERT INTO projektek (p_nev, p_leiras, p_megrendelo, p_hatarido) 
	VALUES ('Valami projekt', 'Nincs leírás', 'Nincs megrendelő')");



