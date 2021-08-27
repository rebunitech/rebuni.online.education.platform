<?php

class rm006_create_table_courses
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `courses` (
				    `id` INT PRIMARY KEY AUTO_INCREMENT,
				    `school_fk` INT NOT NULL ,
				    `title` VARCHAR(200),
				    `sector_pk` INT NOT NULL DEFAULT 0, 
				    `is_paid` BOOLEAN DEFAULT 0 NOT NULL,
				    `price` DECIMAL,
					`description` TEXT,
				    `date_create` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
				    CONSTRAINT `fk_school_course` FOREIGN KEY (`school_fk`) REFERENCES `rebuni_db`.`schools`(`user_fk`) ON DELETE CASCADE
				) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `courses`;";
		$db->pdo->exec($SQL);	
	}
}

?>