<?php

class rm004_create_table_lectures
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `lectures` (
				    `user_fk` INT NOT NULL UNIQUE,
				    CONSTRAINT `fk_lecture_user` FOREIGN KEY (`user_fk`) REFERENCES `rebuni_db`.`users`(`id`) ON DELETE CASCADE    
				) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `lectures`;";
		$db->pdo->exec($SQL);	
	}
}

?>