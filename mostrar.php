<?php
require_once("abstract.databoundobject.php");
require_once("mappingTwitter.php");
require_once("class.pdofactory.php");

$strDSN = "pgsql:dbname=sample_db;host=localhost;port=5432;user=postgres;password=root";
                $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", 
                array());
                $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $id = 8;
                $tweet = new valuesTwitter($objPDO,$id);
                print "Los datos se han introducido correctamente!<br/>";
                print "El nombre de usuario es: " . $tweet->getName() . "<br/>";
                print "La fecha es: " . $tweet->getDate() . "<br/>";
                print "El tweet es: " . $tweet->getTweet() . "<br/>";
                //$tweet->setDate($fecha)->setName($name)->setTweet($strval)->Save();



?>