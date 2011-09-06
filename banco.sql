-- MySQL dump 10.13  Distrib 5.1.49, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: acorjuve
-- ------------------------------------------------------
-- Server version	5.1.49-1ubuntu8.1

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

--
-- Table structure for table `cadastrocomunitario`
--

DROP TABLE IF EXISTS `cadastrocomunitario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cadastrocomunitario` (
  `codCadastroComunitario` int(11) NOT NULL AUTO_INCREMENT,
  `nomeDaPessoa` varchar(50) NOT NULL,
  `genero` enum('masculino','feminino') NOT NULL,
  `nomeDaMae` varchar(50) NOT NULL,
  `estadoCivil` enum('casado','casado civil','uniao estavel','divorciado','separado judicialmente','separado de fato','solteiro','solteiro emancipado','viuvo') NOT NULL,
  `tem_rg` enum('sim','nao') NOT NULL,
  `rg_num` varchar(50) NOT NULL,
  `rg_emissor` varchar(50) NOT NULL,
  `rg_uf` varchar(50) NOT NULL,
  `tem_clt` enum('sim','nao') CHARACTER SET latin1 NOT NULL,
  `num_clt` varchar(50) CHARACTER SET latin1 NOT NULL,
  `cert_reservista` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `cpf` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nacionalidade` enum('brasileiro','estrangeiro','brasileiro naturalizado') CHARACTER SET latin1 NOT NULL,
  `dt_nasc` date NOT NULL,
  `municipioOndeNasceu` varchar(50) CHARACTER SET latin1 NOT NULL,
  `estadoOndeNasceu` varchar(50) CHARACTER SET latin1 NOT NULL,
  `comunidadeBairroOndeNasceu` varchar(50) CHARACTER SET latin1 NOT NULL,
  `estuda` enum('sim','nao') CHARACTER SET latin1 NOT NULL,
  `nivelDeEscolaridade` enum('analfabeta','alfabetizada') CHARACTER SET latin1 NOT NULL,
  `codEscolaridade` int(11) NOT NULL,
  `funcaoPublica` enum('sim','nao') CHARACTER SET latin1 NOT NULL,
  `situacaoFuncional` enum('efetivo','temporario') CHARACTER SET latin1 NOT NULL,
  `comerciante` enum('sim','nao') CHARACTER SET latin1 NOT NULL,
  `antecedentesCriminais` enum('sim','nao') CHARACTER SET latin1 NOT NULL,
  `aposentadoPorInvalidez` enum('sim','nao') CHARACTER SET latin1 NOT NULL,
  `rendaMensal` double NOT NULL,
  `ex_pnra` enum('sim','nao') CHARACTER SET latin1 NOT NULL,
  `alcoolismo` enum('sim','nao') CHARACTER SET latin1 NOT NULL,
  `fumante` enum('sim','nao') CHARACTER SET latin1 NOT NULL,
  `temVicio` enum('sim','nao') CHARACTER SET latin1 NOT NULL,
  `participaReunioesComunidade` enum('sim','as vezes','nao') CHARACTER SET latin1 NOT NULL,
  `participaReunioesSTTR` enum('sim','as vezes','nao') CHARACTER SET latin1 NOT NULL,
  `participaReunioesAcorjuve` enum('sim','as vezes','nao') CHARACTER SET latin1 NOT NULL,
  `participaAcoesDoMovimento` enum('sim','as vezes','nao') CHARACTER SET latin1 NOT NULL,
  `associadoAcorjuve` enum('sim','nao') CHARACTER SET latin1 NOT NULL,
  `moraDesdeQuando` date NOT NULL,
  `codFamilia` int(11) NOT NULL,
  PRIMARY KEY (`codCadastroComunitario`),
  KEY `fk_cadastroComunitario_familia1` (`codFamilia`),
  CONSTRAINT `fk_cadastroComunitario_familia1` FOREIGN KEY (`codFamilia`) REFERENCES `familia` (`codFamilia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cadastrocomunitario`
--

LOCK TABLES `cadastrocomunitario` WRITE;
/*!40000 ALTER TABLE `cadastrocomunitario` DISABLE KEYS */;
INSERT INTO `cadastrocomunitario` VALUES (72,'Antonio Pereira de Souza','masculino','Percilia Pereira de Souza','casado','sim','1273520-5','SSPII','am','nao','','','582100162-53','brasileiro','1965-03-19','Juruti','pa','Uxituba','nao','alfabetizada',4,'nao','efetivo','sim','nao','nao',0,'nao','sim','nao','sim','nao','nao','nao','nao','nao','0000-00-00',54),(73,'Cristiani de Freitas Souza','feminino','Nazaré de Souza Castro','casado','sim','4803061','PCII','pa','sim','','','747648452-53','brasileiro','1973-05-12','Juruti','pa','Uxituba','nao','alfabetizada',4,'nao','efetivo','sim','nao','nao',0,'nao','nao','nao','nao','','','','nao','sim','0000-00-00',54),(74,'Afonso Alves','masculino','Maria  Auta Alves','uniao estavel','sim','1207917-0','SESEG','am','nao','','','572792332-87','brasileiro','1974-10-08','Juruti','pa','Uxituba','nao','alfabetizada',8,'nao','efetivo','nao','nao','nao',585,'nao','nao','nao','nao','as vezes','as vezes','sim','as vezes','sim','0000-00-00',55),(75,'Derenice Souza dos Anjos','feminino','Dilva Souza dos Anjos','uniao estavel','sim','1663978-2','SESEG','am','nao','','','708932682-91','brasileiro','1978-03-03','Juruti','pa','Miri','nao','alfabetizada',8,'nao','efetivo','nao','nao','nao',0,'nao','nao','nao','nao','sim','','sim','','sim','0000-00-00',55),(76,'Paulo Nunes Filho','masculino','Ana Coelho Nunes','casado','sim','687005','SSPII','am','nao','','290342360796','229.968.702-87','brasileiro','1958-12-29','Juruti','pa','Uxituba','nao','alfabetizada',5,'nao','efetivo','nao','nao','nao',200,'nao','nao','nao','nao','sim','sim','sim','nao','sim','0000-00-00',56),(77,'Socorro Izel Pereira Nunes','feminino','Anita Barroso Pereira ','casado','sim','6254422','PCI','pa','sim','032468','','346.603.132-04','brasileiro','1954-09-07','Parintins','am','Centro de Parintins','nao','alfabetizada',5,'nao','efetivo','nao','nao','nao',300,'nao','nao','nao','nao','sim','','sim','sim','sim','0000-00-00',56),(78,'Jose Nelson Ferreira Barroso','masculino','Maria Ferreira Matos','viuvo','sim','2023520','PC','pa','nao','','','366.634.332-53','brasileiro','1935-03-29','Juruti','pa','Uxituba','nao','alfabetizada',1,'nao','efetivo','nao','nao','nao',1,'nao','nao','nao','nao','sim','','','nao','sim','0000-00-00',57),(79,'Joelson Almeida de Souza','masculino','Raimunda SantarÃ©m de Almeida','uniao estavel','sim','2460089','PC ','pa','sim','03630','','403.395.992-00','brasileiro','1971-02-21','Juruti','pa','Uxituba','nao','alfabetizada',4,'nao','efetivo','nao','nao','nao',1,'nao','sim','sim','sim','sim','sim','','nao','nao','0000-00-00',58),(80,'Jocenil Hipolito dos Santos','feminino','Maria de Lourdes Hipolito dos Santos','uniao estavel','sim','3588645','PC','pa','sim','64466','','983.676.332-53','brasileiro','1974-07-06','Juruti','pa','Uxituba','nao','alfabetizada',4,'nao','efetivo','nao','nao','nao',0,'nao','nao','nao','nao','nao','','sim','nao','nao','0000-00-00',58),(81,'Agelson Ferreira dos Santos','masculino','Maria Ferreira dos Santos','uniao estavel','sim','20168756','SESEG','am','sim','002721 sÃ©rie 00020-Am','','963825112-34','brasileiro','1984-03-26','Parintins','am','Santa Rita','nao','alfabetizada',8,'nao','efetivo','nao','nao','nao',500,'nao','nao','nao','nao','as vezes','nao','as vezes','nao','sim','0000-00-00',59),(82,'Rosangela de Souza Castro','feminino','Maria Julia de Souza Castro','uniao estavel','sim','134991822','SESEG','am','sim','3774116 sÃ©rie 003-0 Pa','','733361652-53','brasileiro','1974-04-13','Manaus','am','','nao','alfabetizada',7,'nao','efetivo','nao','nao','sim',260,'nao','nao','nao','nao','as vezes','nao','sim','nao','nao','0000-00-00',59),(83,'Francisco Pereira','masculino','Terezinha Pereira','uniao estavel','sim','0954853-0','seseg-d.v.c','pa','sim','089115','nÃ£o tem','195607292-68','brasileiro','1958-10-22','Juruti','pa','Uxituba','nao','alfabetizada',3,'nao','efetivo','sim','nao','nao',797.5,'nao','nao','nao','nao','sim','as vezes','as vezes','nao','nao','0000-00-00',60),(84,'Sandra Matos Almeida','feminino','Irene Matos','uniao estavel','sim','0986989-1','seseg','pa','sim','NÃ£o tem','','681529572-91','brasileiro','1964-08-23','juruti','pa','Uxituba','nao','alfabetizada',8,'nao','efetivo','sim','nao','nao',0,'nao','nao','nao','nao','sim','as vezes','sim','nao','nao','0000-00-00',60),(85,'JoÃ£o Felix Garcia Neto','masculino','Dorvalina Felix  Garcia','casado','sim','817235','SESEG','pa','sim','54113','','194604142-49','brasileiro','1956-03-06','Juruti','pa','Mocambo','nao','alfabetizada',2,'sim','temporario','nao','nao','nao',1.007,'nao','nao','nao','nao','sim','sim','sim','sim','sim','0000-00-00',61),(86,'Maria Auta Alves','feminino','Luiza Alves','casado','sim','384137','SESEG','am','sim','48978','','624752232-00','brasileiro','1955-09-12','Juruti','pa','Uxituba','nao','alfabetizada',2,'nao','efetivo','nao','nao','nao',200,'nao','nao','nao','nao','sim','sim','sim','sim','sim','0000-00-00',61),(87,'Luis de Souza','masculino','Ana de Souza','uniao estavel','sim','283871','segup','pa','sim','','','484956112-87','brasileiro','1947-07-21','Juruti','pa','Uxituba','nao','alfabetizada',2,'nao','efetivo','nao','nao','nao',0,'nao','nao','nao','nao','as vezes','as vezes','as vezes','as vezes','nao','0000-00-00',62),(88,'Raimunda SantarÃ©m de Almeida','feminino','Raimunda SantarÃ©m de Almeida','casado','sim','6302862','PCII','pa','sim','00287','','569065602-04','brasileiro','1937-11-24','Juruti','pa','Uxituba','nao','alfabetizada',4,'nao','efetivo','nao','nao','nao',0,'nao','nao','nao','nao','as vezes','nao','sim','nao','nao','0000-00-00',62);
/*!40000 ALTER TABLE `cadastrocomunitario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `composicaoresidencial`
--

DROP TABLE IF EXISTS `composicaoresidencial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `composicaoresidencial` (
  `codComposicaoResidencial` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCompleto` varchar(50) NOT NULL,
  `dataDeNascimento` date NOT NULL,
  `parentesco` varchar(50) NOT NULL,
  `nomePrincipalFonteDeRenda` varchar(50) NOT NULL,
  `estaEmRB` enum('sim','nao') NOT NULL,
  `rendaMensal` double NOT NULL,
  `codEscolaridade` int(11) NOT NULL,
  `codFamilia` int(11) NOT NULL,
  PRIMARY KEY (`codComposicaoResidencial`,`codFamilia`),
  KEY `fk_composicaoResidencial_escolaridade1` (`codEscolaridade`),
  KEY `fk_composicaoResidencial_familia1` (`codFamilia`),
  CONSTRAINT `fk_composicaoResidencial_escolaridade1` FOREIGN KEY (`codEscolaridade`) REFERENCES `escolaridade` (`codEscolaridade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_composicaoResidencial_familia1` FOREIGN KEY (`codFamilia`) REFERENCES `familia` (`codFamilia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `composicaoresidencial`
--

LOCK TABLES `composicaoresidencial` WRITE;
/*!40000 ALTER TABLE `composicaoresidencial` DISABLE KEYS */;
INSERT INTO `composicaoresidencial` VALUES (19,'Cristiani Freitas de Souza','1973-05-12','1','bolsa famÃ­lia','nao',164,4,54),(20,'Antonio Pereira de Souza','1965-03-19','1','bolsa famÃ­lia','sim',50,4,54),(21,'Crisleni Freitas de Souza','2004-07-22','2','','nao',0,1,54),(22,'Cristiana Freitas de Souza','1998-03-25','2','','nao',0,5,54),(23,'Adson Freitas','1992-08-20','2','','nao',0,11,54),(24,'Crisliani Freitas de Souza','2007-02-08','2','','nao',0,15,54),(25,'Antonilson Freitas de Souza','2001-09-18','2','','nao',0,2,54),(26,'JoÃ£o Felipe F. de Souza','1996-05-21','2','','nao',0,6,54),(27,'Antonio Pereira S. Filho','2009-08-14','2','','sim',0,15,54),(28,'Derenice Souza dos Anjos','1978-03-03','1','','sim',0,8,55),(29,'Afonso Alves','1974-10-08','1','Oficina','sim',585,8,55),(30,'Ana Luiza dos Anjos Alves','2008-11-13','2','','nao',0,1,55),(31,'Paulo Nunes Filho','1958-12-29','1','DiÃ¡rias','sim',200,5,56),(32,'Socorro Izel Pereira Nunes','1954-09-07','1','Venda de bombom','sim',300,5,56),(33,'Izane Sue Ellen Pereira Nunes','1988-04-06','2','','nao',0,12,56),(34,'Jose Nelson Ferreira Barroso','1935-03-29','1','Aposentadoria','sim',1,1,57),(35,'Jucelino Marinho Barroso','1988-12-13','2','','nao',0,10,57),(36,'Joelson Almeida de Souza','1971-02-02','1','Agricultura familiar','nao',1,4,58),(37,'Jocenil Hipolito dos Santos','1974-07-06','1','','nao',0,4,58),(38,'Joilson dos Santos Souza','1992-02-15','2','','nao',0,8,58),(39,'Jonike dos Santos Souza','1998-08-17','2','','nao',0,4,58),(40,'Jonisson dos Santos Souza','2003-04-11','2','','nao',0,2,58),(41,'Samilly dos Santos Souza','2005-08-02','2','','nao',0,1,58),(42,'Irael dos Santos Souza','2007-07-08','2','','nao',0,15,58),(43,'JoÃ£o Paulo  Santos Souza','2009-11-05','2','','nao',0,15,58),(44,'Agelson Ferreira dos Santos','1984-03-26','1','Agricultura','nao',500,7,59),(45,'Rosagela de Souza Castro','1974-04-13','1','Beneficio','nao',260,7,59),(46,'Kayke Castro dos Santos','2003-05-19','2','','nao',0,1,59),(47,'Sandra Matos Almeida','1964-08-23','1','Agricultura Familiar ','sim',0,3,60),(48,'Francisco Pereira','1958-10-22','1','Agricultura Familiar','sim',797,8,60),(49,'JoÃ£o Felix Garcia Neto','1956-03-06','1','Agricultura e FuncionÃ¡rio','nao',1007,2,61),(50,'Maria auta Alves garcia','1955-09-12','1','agricultura','sim',497,2,61),(51,'Adriane Alves Garcia','1981-10-16','2','','nao',0,12,61),(52,'Alessandra Alves garcia','1990-04-14','2','Bolsa Trabalho','nao',70,12,61),(53,'Romario Alves garcia','1992-12-15','2','','nao',0,12,61),(54,'Hortencia Alves garcia','1994-11-17','2','','nao',0,10,61),(55,'Adriele Alves garcia','1999-01-18','2','','nao',0,5,61),(56,'Alexandre Garcia de Souza','2008-05-26','7','Assistencia que recebe do pai','nao',100,1,61),(57,'Elizandra Garcia Fonseca','2009-11-30','7','Recebe assintencia do pai','nao',100,1,61),(58,'Luiz de Souza','1947-07-21','1','aposentada','sim',770,2,62),(59,'Raimunda SantarÃ©m de Almeida','1937-11-24','1','aposentadoria','sim',510,4,62);
/*!40000 ALTER TABLE `composicaoresidencial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comunidade`
--

DROP TABLE IF EXISTS `comunidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comunidade` (
  `codComunidade` int(11) NOT NULL AUTO_INCREMENT,
  `nomeComunidade` varchar(50) NOT NULL,
  PRIMARY KEY (`codComunidade`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comunidade`
--

LOCK TABLES `comunidade` WRITE;
/*!40000 ALTER TABLE `comunidade` DISABLE KEYS */;
INSERT INTO `comunidade` VALUES (3,'Teste'),(4,'SuruacÃ¡'),(5,'Miri Centro'),(6,'Alemanha'),(7,'Rio Jordão'),(8,'Diamantino'),(9,'Santa Rita de Cassia'),(10,'Nova União'),(11,'Pedreiras'),(12,'Uxituba'),(13,'Nova Aliança'),(14,'Capelinha'),(15,'Monte Sinai Evangélico'),(16,'Monte Sinae Católico'),(17,'Ingracia'),(18,'Nova Macaiane'),(19,'Capitão'),(20,'Boa Vista'),(21,'Boa Esperança'),(22,'Vila Vinente'),(23,'Mocambo'),(24,'Bom Jesus'),(25,'Santa Madalena');
/*!40000 ALTER TABLE `comunidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrevistador`
--

DROP TABLE IF EXISTS `entrevistador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrevistador` (
  `codEntrevistador` int(11) NOT NULL AUTO_INCREMENT,
  `entrevistador` varchar(50) NOT NULL,
  PRIMARY KEY (`codEntrevistador`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrevistador`
--

LOCK TABLES `entrevistador` WRITE;
/*!40000 ALTER TABLE `entrevistador` DISABLE KEYS */;
INSERT INTO `entrevistador` VALUES (4,'Dennie'),(5,'cida'),(6,'Martinho'),(7,'Pedro A.'),(8,'Edney Lima'),(9,'Maria da ConceiÃ§Ã£o'),(10,'Dilcinara'),(11,'DÃ©lia F'),(12,'jane rodrigues'),(13,'antonio carlos');
/*!40000 ALTER TABLE `entrevistador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escolaridade`
--

DROP TABLE IF EXISTS `escolaridade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escolaridade` (
  `escolaridade` varchar(50) NOT NULL,
  `codEscolaridade` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`codEscolaridade`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escolaridade`
--

LOCK TABLES `escolaridade` WRITE;
/*!40000 ALTER TABLE `escolaridade` DISABLE KEYS */;
INSERT INTO `escolaridade` VALUES ('1a série do ensino fundamental',1),('2a série do ensino fundamental',2),('3a série do ensino fundamental',3),('4a série do ensino fundamental',4),('5a série do ensino fundamental',5),('6a série do ensino fundamental',6),('7a série do ensino fundamental',7),('8a série do ensino fundamental',8),('9a série do ensino fundamental',9),('1o ano do ensino médio',10),('2o ano do ensino médio',11),('3o ano do ensino médio',12),('superior completo',13),('superior incompleto',14),('não estuda',15);
/*!40000 ALTER TABLE `escolaridade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `familia`
--

DROP TABLE IF EXISTS `familia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `familia` (
  `codFamilia` int(11) NOT NULL AUTO_INCREMENT,
  `nomeFamilia` varchar(50) NOT NULL,
  `codEntrevista` int(11) NOT NULL,
  `dt_entrevista` varchar(45) DEFAULT NULL,
  `codEntrevistador` int(11) NOT NULL,
  `codComunidade` int(11) NOT NULL,
  PRIMARY KEY (`codFamilia`),
  KEY `fk_familia_entrevistador1` (`codEntrevistador`),
  KEY `fk_familia_comunidade1` (`codComunidade`),
  CONSTRAINT `fk_familia_comunidade1` FOREIGN KEY (`codComunidade`) REFERENCES `comunidade` (`codComunidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_familia_entrevistador1` FOREIGN KEY (`codEntrevistador`) REFERENCES `entrevistador` (`codEntrevistador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `familia`
--

LOCK TABLES `familia` WRITE;
/*!40000 ALTER TABLE `familia` DISABLE KEYS */;
INSERT INTO `familia` VALUES (54,'',0,'2010-07-07',5,12),(55,'',0,'2010-07-07',6,12),(56,'',0,'2010-07-07',7,12),(57,'',0,'2010-07-07',6,12),(58,'',0,'2010-07-07',8,12),(59,'',0,'2010-07-20',9,12),(60,'',0,'2010-07-07',6,12),(61,'',0,'2010-07-07',10,12),(62,'',0,'2010-07-07',12,12);
/*!40000 ALTER TABLE `familia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fontederenda`
--

DROP TABLE IF EXISTS `fontederenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fontederenda` (
  `codFonteRenda` int(11) NOT NULL AUTO_INCREMENT,
  `valorFonteDeRenda` double DEFAULT NULL,
  `codNomeFonteDeRenda` int(11) NOT NULL,
  `codFamilia` int(11) NOT NULL,
  PRIMARY KEY (`codFonteRenda`),
  KEY `fk_fonteDeRenda_nomeFonteDeRenda1` (`codNomeFonteDeRenda`),
  KEY `fk_fonteDeRenda_familia1` (`codFamilia`),
  CONSTRAINT `fk_fonteDeRenda_familia1` FOREIGN KEY (`codFamilia`) REFERENCES `familia` (`codFamilia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_fonteDeRenda_nomeFonteDeRenda1` FOREIGN KEY (`codNomeFonteDeRenda`) REFERENCES `nomefontederenda` (`codNomeFonteDeRenda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fontederenda`
--

LOCK TABLES `fontederenda` WRITE;
/*!40000 ALTER TABLE `fontederenda` DISABLE KEYS */;
INSERT INTO `fontederenda` VALUES (106,652.5,2,60),(107,30,3,60),(108,105,1,60),(109,10,8,60),(110,100,2,62),(111,100,5,62),(112,20,1,62),(113,40,7,62),(114,510,18,62);
/*!40000 ALTER TABLE `fontederenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcaopublica`
--

DROP TABLE IF EXISTS `funcaopublica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcaopublica` (
  `codQualFuncaoPublica` int(11) NOT NULL,
  `codCadastroComunitario` int(11) NOT NULL,
  PRIMARY KEY (`codQualFuncaoPublica`,`codCadastroComunitario`),
  KEY `fk_funcaoPublica_has_cadastroComunitario_cadastroComunitario1` (`codCadastroComunitario`),
  CONSTRAINT `fk_funcaoPublica_has_cadastroComunitario_cadastroComunitario1` FOREIGN KEY (`codCadastroComunitario`) REFERENCES `cadastrocomunitario` (`codCadastroComunitario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_funcaoPublica_has_cadastroComunitario_funcaoPublica1` FOREIGN KEY (`codQualFuncaoPublica`) REFERENCES `funcaopublicaqual` (`codQualFuncaoPublica`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcaopublica`
--

LOCK TABLES `funcaopublica` WRITE;
/*!40000 ALTER TABLE `funcaopublica` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcaopublica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcaopublicaqual`
--

DROP TABLE IF EXISTS `funcaopublicaqual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcaopublicaqual` (
  `codQualFuncaoPublica` int(11) NOT NULL AUTO_INCREMENT,
  `qualFuncaoPublica` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codQualFuncaoPublica`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcaopublicaqual`
--

LOCK TABLES `funcaopublicaqual` WRITE;
/*!40000 ALTER TABLE `funcaopublicaqual` DISABLE KEYS */;
INSERT INTO `funcaopublicaqual` VALUES (1,'ACS'),(2,'Professor'),(3,'Servente'),(4,'vigia'),(5,'secretária'),(6,'diretor administrativo'),(7,'sub prefeito'),(8,'técnico de enfermagem'),(9,'médico'),(10,'motorista'),(11,'supervisor'),(12,'acessor comunitário'),(13,'coordenadora pedagógica'),(14,'orientadora educacional'),(15,'outras funções');
/*!40000 ALTER TABLE `funcaopublicaqual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nomefontederenda`
--

DROP TABLE IF EXISTS `nomefontederenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nomefontederenda` (
  `codNomeFonteDeRenda` int(11) NOT NULL AUTO_INCREMENT,
  `nomeFonteDeRenda` varchar(50) NOT NULL,
  PRIMARY KEY (`codNomeFonteDeRenda`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nomefontederenda`
--

LOCK TABLES `nomefontederenda` WRITE;
/*!40000 ALTER TABLE `nomefontederenda` DISABLE KEYS */;
INSERT INTO `nomefontederenda` VALUES (1,'Pesca'),(2,'agricultura familiar'),(3,'criação de pequenos animais'),(4,'criação de peixes'),(5,'extrativismo vegetal'),(7,'caça'),(8,'pecuária'),(9,'vendedor ambulante'),(10,'comércio'),(11,'transporte'),(12,'marcenaria'),(13,'carpintaria'),(14,'construção civil'),(15,'cultura(artesanato, música)'),(16,'turismo'),(17,'funcionalismo público'),(18,'aposentadoria'),(19,'bolsa familia'),(20,'emprego sem carteira assinada'),(21,'empreitas'),(22,'diárias');
/*!40000 ALTER TABLE `nomefontederenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questaofundiaria`
--

DROP TABLE IF EXISTS `questaofundiaria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questaofundiaria` (
  `codQuestaoFundiaria` int(11) NOT NULL AUTO_INCREMENT,
  `areaEmQueMora` enum('propria','arrendada','cedida','heranca','mora com os pais','nao possui area de moradia') NOT NULL,
  `areaEmQueTrabalha` enum('propria','arrendada','cedida','heranca','trabalha na area dos pais','nao tem area de trabalho') NOT NULL,
  `documentoDaTerra` enum('LO','TD','escritura publica','recibo','historico de posse do STTR','declaracao da ACORJUVE','nenhum documento') NOT NULL,
  `principalFonteDeRenda` varchar(50) NOT NULL,
  `planejaInvestirRecursos` text NOT NULL,
  `beneficiosALCOA` enum('sim','nao') NOT NULL,
  `beneficiosSimALCOA` text NOT NULL,
  `danosALCOA` enum('sim','nao') NOT NULL,
  `danosSimALCOA` text NOT NULL,
  `avaliacaoALCOA` enum('ruim','pessima','regular','boa','excelente') NOT NULL,
  `codFamilia` int(11) NOT NULL,
  PRIMARY KEY (`codQuestaoFundiaria`,`codFamilia`),
  KEY `fk_questaoFundiaria_familia1` (`codFamilia`),
  CONSTRAINT `fk_questaoFundiaria_familia1` FOREIGN KEY (`codFamilia`) REFERENCES `familia` (`codFamilia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questaofundiaria`
--

LOCK TABLES `questaofundiaria` WRITE;
/*!40000 ALTER TABLE `questaofundiaria` DISABLE KEYS */;
INSERT INTO `questaofundiaria` VALUES (21,'heranca','propria','','Bolsa famÃ­lia','investir no campo e na roÃ§a.','nao','','sim','de modo em geral.','regular',54),(22,'cedida','cedida','LO','Oficina','Fazer plantios, criaÃ§Ã£o de peixes, galinha e manter o consumo de roupas e alimentos, pagar alguÃ©m para preparar o roÃ§ado.','nao','De maneira alguma','nao','nenhum dano','pessima',55),(23,'heranca','heranca','LO','Diarias','Melhorar alimentaÃ§Ã£o, saÃºde e educaÃ§Ã£o e investir na venda de bombom caseiro','nao','','nao','','ruim',56),(24,'propria','propria','','Aposentadoria','Investir na agricultura pagando 03 trÃªs pessoas em diante para fazer o roÃ§ado, comprar um bote, terminar a construÃ§Ã£o da casa  e comprar alimentos','nao','Somente para algumas pessoas da regiÃ£o, que trabalharam empregados temporariamente','nao','Somente para os vizinhos','regular',57),(25,'propria','propria','nenhum documento','Agruicultura Familiar','Investir na criaÃ§Ã£o de pequenos animais,criaÃ§Ã£o de peixes, investir na agricultura familiar, na educaÃ§Ã£o e saÃºde.','nao','','nao','','ruim',58),(26,'mora com os pais','','nenhum documento','Agricultura','Investir na Agricultura e na AlimentaÃ§Ã£o.','nao','','sim','','ruim',59),(27,'propria','propria','recibo','Agricultura Familia','Comprar um forno de torrar farinha, investir na agricultura, roÃ§a, campo, banana, limpeza de AÃ§ai. ','nao','trouxe medo de contaminaÃ§Ã£o e perda do nosso liquido precioso a grande devastaÃ§Ã£o causando grande calor. ','nao','inclusive minha filha estava no momento, teve sorte de nÃ£o ter sofrido nenhum dado.','pessima',60),(28,'heranca','heranca','recibo','Agricultura','Investir no Plantio de RoÃ§a, plantando curuÃ¡, abacaxi, bananas e mandioca, e a compra de uma mÃ¡quina para beneficiar o curuÃ¡.','nao','','nao','','pessima',61),(29,'propria','propria','LO','aposentadoria','Investir na reforma de um batelÃ£o','nao','','nao','','pessima',62);
/*!40000 ALTER TABLE `questaofundiaria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(50) NOT NULL,
  `senhaUsuario` varchar(50) NOT NULL,
  `emailUsuario` varchar(50) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (2,'admin','senha',''),(3,'dennie','senha01','mail@mail.com'),(4,'elengonzaga','gonzaga','gonzaga.jesus1@gmail.com'),(5,'simonecastro','maravilha','vencer.simone@gmail.com'),(6,'soraiasantos','gerdeonor','soraiaacorjuve@gmail.com'),(7,'zÃ©bentes','gerdeonor','jbentes.bentes@gmail.com'),(8,'patriciaferreira','luciana','patriciaacorjuve25@hotmail.com'),(9,'zebentes','muirapinima','zebentes@gmail.com');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-02-15 10:19:45
