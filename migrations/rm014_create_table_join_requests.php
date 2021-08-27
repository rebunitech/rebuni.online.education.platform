<?php

class rm014_create_table_join_requests
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `join_requests` (
			    `id` INT PRIMARY KEY AUTO_INCREMENT,
			    `lecture_fk` INT NOT NULL,
			    `school_fk` INT NOT NULL,
			    `status` BOOLEAN DEFAULT 0,
			    `date_requests` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL, 
			    CONSTRAINT `fk_lecture_jr` FOREIGN KEY (`lecture_fk`) REFERENCES `rebuni_db`.`users`(`id`) ON DELETE CASCADE,
			    CONSTRAINT `fk_school_jr` FOREIGN KEY (`school_fk`) REFERENCES `rebuni_db`.`schools`(`user_fk`) ON DELETE CASCADE
			) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `join_requests`;";
		$db->pdo->exec($SQL);	
	}
}

?>