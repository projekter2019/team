<?php

include_once("InsertTableIntoDB.php");

CreateTableInDB("megrendelok",
"CREATE TABLE `megrendelok` (
`m_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `m_nev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `m_cim` varchar(300) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `m_elerhetoseg` varchar(300) COLLATE utf8_hungarian_ci DEFAULT NULL, PRIMARY KEY (m_id))
  ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;", "");