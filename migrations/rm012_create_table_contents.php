<?php

class rm012_create_table_contents
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `contents` (
				    `id` INT PRIMARY KEY AUTO_INCREMENT,
				    `course_fk` INT NOT NULL,
				    `lecture_fk` INT,
				    `title` VARCHAR(150) NOT NULL,
				    `video` VARCHAR(200) NOT NULL,
				    `description` TEXT NOT NULL,
				    `date_created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
				    CONSTRAINT `fk_cource_content` FOREIGN KEY (`course_fk`) REFERENCES `rebuni_db`.`courses`(`id`) ON DELETE CASCADE,
				    CONSTRAINT `fk_lecture_content` FOREIGN KEY (`lecture_fk`) REFERENCES `rebuni_db`.`lectures`(`user_fk`) ON DELETE SET NULL
				) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `contents`;";
		$db->pdo->exec($SQL);	
	}
}

?>