-- database petscarecenter

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Create schema petscarecenter
--

CREATE SCHEMA IF NOT EXISTS `petscarecenter`;
USE `petscarecenter`;

-- 
-- Table structure for employer 
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
    `personId` VARCHAR(10) NOT NULL,
    `degrees` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`personId`),
    KEY `personId` (`personId`),
    CONSTRAINT `employee` FOREIGN KEY (`personId`)
        REFERENCES `person` (`personId`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;

-- 
-- Dumping data for table employee
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES ('1000000000', 'animal caretaker');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

-- 
-- Table structure for person 
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
    `personID` VARCHAR(10) NOT NULL,
    `lastName` VARCHAR(50) DEFAULT NULL,
    `firstName` VARCHAR(50) DEFAULT NULL,
    `email` VARCHAR(50) NOT NULL COLLATE UTF8MB4_BIN,
    `street` VARCHAR(50) DEFAULT NULL,
    `city` VARCHAR(50) DEFAULT NULL,
    `state` VARCHAR(2) DEFAULT NULL,
    `zipcode` VARCHAR(9) DEFAULT NULL,
    `phone` VARCHAR(10) DEFAULT NULL,
    `ssn` VARCHAR(10) DEFAULT NULL,
    PRIMARY KEY (`personID`),
    UNIQUE KEY (`ssn` , `personID` , `email`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` VALUES ('1000000000','Block','Jane','B_Jane_345@gmail.com','345 Randolph Circle','Apopka','FL','30458','7147855681','1472583698');
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for customer
--
DROP TABLE IF EXISTS `visit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visit` (
    `visitID` VARCHAR(18) NOT NULL,
    `petID` VARCHAR(10) NOT NULL,
    `date` DATE NOT NULL,
    `time` TIME NOT NULL,
    `staff` VARCHAR(10) NOT NULL,
    `note` VARCHAR(500) DEFAULT NULL,
    PRIMARY KEY (`visitID`),
    UNIQUE KEY (`visitID`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for visit
--
LOCK TABLES `visit` WRITE;
/*!40000 ALTER TABLE `visit` DISABLE KEYS */;
INSERT INTO `visit` VALUES ('testvisit','P1','2020-11-20','10:00:00', '1000000000','This is a test appointment.');
/*!40000 ALTER TABLE `visit` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Table structor for pet
--
DROP TABLE IF EXISTS `pet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pet` (
    `petID` VARCHAR(10) NOT NULL,
    `petName` VARCHAR(50) NOT NULL,
    `type` VARCHAR(15) NOT NULL,
    `petbirthday` DATE DEFAULT NULL,
    `petgender` VARCHAR(6) DEFAULT NULL,
    `breed` VARCHAR(50) NOT NULL,
    `microchip` VARCHAR(15) NOT NULL,
    `personID` VARCHAR(10) NOT NULL,
    `note` VARCHAR(500) DEFAULT NULL,
    PRIMARY KEY (`petID`),
    UNIQUE KEY (`microchip`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data to table pet
--
LOCK TABLES `pet` WRITE;
/*!40000 ALTER TABLE `pet` DISABLE KEYS */;
INSERT INTO `pet` VALUES ('P1','pluto','dog','2020-02-20','female','poodle','21041911', '1', 'Example comment'),('P2','Lucky','dog','2012-12-12','male','beagle','19112104', '1', '');
/*!40000 ALTER TABLE `pet` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Account table
--
DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
    `personID` VARCHAR(10) NOT NULL,
    `username` VARCHAR(16) NOT NULL COLLATE UTF8MB4_BIN,
    `pw` VARCHAR(16) NOT NULL COLLATE UTF8MB4_BIN,
    `pos` VARCHAR(8) NOT NULL,
    PRIMARY KEY (`personID`),
    UNIQUE KEY (`username`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts`(`personID`,`username`,`pw`,`pos`) VALUES ('1000000000','Staff1','Staff1','staff');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- View table for visit info
--
DROP VIEW IF EXISTS `visitView`;
CREATE VIEW `visitView` AS SELECT `pet`.`petID`, `pet`.`petName`, `pet`.`type`, `pet`.`breed`, 
`pet`.`personID`, `visit`.`visitID`, `visit`.`date`, `visit`.`time`, `visit`.`staff`, `visit`.`note`
FROM `pet`, `visit`
WHERE `pet`.`petID` = `visit`.`petID`;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;