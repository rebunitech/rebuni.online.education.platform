<?php

class rm005_create_table_students
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `students` (
				`user_fk` INT NOT NULL UNIQUE,
				CONSTRAINT `fk_student_user` FOREIGN KEY (`user_fk`) REFERENCES `rebuni_db`.`users`(`id`) ON DELETE CASCADE
				) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `students`;";
		$db->pdo->exec($SQL);	
	}
}

?>