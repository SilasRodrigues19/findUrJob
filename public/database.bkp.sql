CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` varchar(32) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela para guardar informações sobre as vagas';

CREATE TABLE IF NOT EXISTS `report` (
  `report_id` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `report_job_id` varchar(255) NOT NULL,
  `report_reason` enum('Fraudulent','Misleading','Discriminatory','Illegal','Invalid','Default') NOT NULL DEFAULT 'Default',
  `report_observation` varchar(255) DEFAULT NULL,
  `report_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela para guardar informações de vagas reportadas';


CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_level` enum('User','Mod','Admin') NOT NULL DEFAULT 'User',
  `user_is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela para guardar informações de usuários';

CREATE TABLE IF NOT EXISTS `validemails` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_domain` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COMMENT='Tabela para guardar informações de e-mails confiáveis e não temporários';

INSERT INTO `validemails` (`email_id`, `email_domain`, `created_at`) VALUES
	(1, '@gmail', '2023-04-18 22:27:31'),
	(2, '@hotmail', '2023-04-18 22:27:31'),
	(3, '@outlook', '2023-04-18 22:27:31'),
	(4, '@yahoo', '2023-04-18 22:27:31'),
	(5, '@protonmail', '2023-04-18 22:27:31'),
	(6, '@zoho', '2023-04-18 22:27:31'),
	(7, '@icloud', '2023-04-18 22:27:31'),
	(8, '@aol', '2023-04-18 22:27:31'),
	(9, '@uol', '2023-04-18 22:27:31'),
	(10, '@gmx', '2023-04-18 22:27:31'),
	(11, '@fastmail', '2023-04-18 22:27:31'),
	(12, '@mail', '2023-04-18 22:27:31'),
	(13, '@hustmail', '2023-04-18 22:27:31'),
	(14, '@yandex', '2023-04-18 22:27:31'),
	(15, '@tutanota', '2023-04-18 22:27:31');