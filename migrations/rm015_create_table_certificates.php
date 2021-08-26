<?php

class rm015_create_table_certificates
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `certificates` (
				    `id` INT PRIMARY KEY AUTO_INCREMENT,
				    `user_fk` INT NOT NULL,
				    `course_fk` INT NOT NULL,
				    `file` VARCHAR(200) NOT NULL,
				    `date_issued` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
				    CONSTRAINT `fk_user_certificates` FOREIGN KEY (`user_fk`) REFERENCES `rebuni_db`.`users`(`id`) ON DELETE CASCADE,
				    CONSTRAINT `fk_course_certificates` FOREIGN KEY (`course_fk`) REFERENCES `rebuni_db`.`courses`(`id`) ON DELETE CASCADE
				) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `certificates`;";
		$db->pdo->exec($SQL);	
	}
}

?>