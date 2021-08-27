<?php

class rm011_create_table_course_student
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `course_student` (
				    `course_fk` INT NOT NULL,
				    `student_fk` INT NOT NULL,
				    `paid` BOOLEAN DEFAULT 0 NOT NULL,
				    CONSTRAINT `fk_course_cs` FOREIGN KEY (`course_fk`) REFERENCES `rebuni_db`.`courses`(`id`) ON DELETE CASCADE,
				    CONSTRAINT `fk_student_cs` FOREIGN KEY (`student_fk`) REFERENCES `rebuni_db`.`users`(`id`) ON DELETE CASCADE,
				    CONSTRAINT `pk_course_student` PRIMARY KEY (`course_fk`, `student_fk`)
				) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `course_student`;";
		$db->pdo->exec($SQL);	
	}
}

?>