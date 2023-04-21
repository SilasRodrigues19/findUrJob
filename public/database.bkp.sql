-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.25-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para findurjob
CREATE DATABASE IF NOT EXISTS `findurjob` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `findurjob`;

-- Copiando estrutura para tabela findurjob.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(255) NOT NULL,
  `job_requirements` varchar(255) NOT NULL,
  `job_link` varchar(255) NOT NULL,
  `job_level` enum('Senior','Pleno','Junior','Trainee','Estágio','Não informado') NOT NULL DEFAULT 'Não informado',
  `job_salary` varchar(255) NOT NULL,
  `job_currency` enum('Real','Dollar','Euro') NOT NULL DEFAULT 'Real',
  `job_mode` enum('Remoto','Presencial','Híbrido','Não informado') NOT NULL DEFAULT 'Não informado',
  `job_contract` enum('PJ','CLT','Não listado') NOT NULL DEFAULT 'Não listado',
  `job_email` varchar(255) DEFAULT NULL,
  `job_experience` tinyint(1) NOT NULL DEFAULT 0,
  `job_is_archived` tinyint(1) NOT NULL DEFAULT 0,
  `job_observation` varchar(255) DEFAULT NULL,
  `job_post_user` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2147483648 DEFAULT CHARSET=utf8mb4 COMMENT='Tabela para guardar informações sobre as vagas';

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela findurjob.report
CREATE TABLE IF NOT EXISTS `report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `report_job_id` varchar(255) NOT NULL,
  `report_reason` enum('Fraudulent','Misleading','Discriminatory','Illegal','Invalid','Default') NOT NULL DEFAULT 'Default',
  `report_observation` varchar(255) DEFAULT NULL,
  `report_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COMMENT='Tabela para guardar informações de vagas reportadas';

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela findurjob.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_level` enum('User','Mod','Admin') NOT NULL DEFAULT 'User',
  `user_is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COMMENT='Tabela para guardar informações de usuários';

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela findurjob.validemails
CREATE TABLE IF NOT EXISTS `validemails` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_domain` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COMMENT='Tabela para guardar informações de e-mails confiáveis e não temporários';

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
