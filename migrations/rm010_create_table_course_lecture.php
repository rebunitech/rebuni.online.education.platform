<?php

class rm010_create_table_course_lecture
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `course_lecture` (
				    `course_fk` INT NOT NULL,
				    `lecture_fk` INT NOT NULL,
				    CONSTRAINT `fk_cource_cl` FOREIGN KEY (`course_fk`) REFERENCES `rebuni_db`.`courses`(`id`) ON DELETE CASCADE,
				    CONSTRAINT `fk_lecture_cl` FOREIGN KEY (`lecture_fk`) REFERENCES `rebuni_db`.`lectures`(`user_fk`) ON DELETE CASCADE,
				    CONSTRAINT `pk_cource_lecture` PRIMARY KEY (`course_fk`, `lecture_fk`)
				) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `course_lecture`;";
		$db->pdo->exec($SQL);	
	}
}

?>