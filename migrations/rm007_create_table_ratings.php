<?php

class rm007_create_table_ratings
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `ratings` (
				    `id` INT PRIMARY KEY AUTO_INCREMENT,
				    `user_fk` INT NOT NULL UNIQUE,
				    `is_school` BOOLEAN,
				    `rate` INT,
				    CONSTRAINT `fk_rating_user` FOREIGN KEY (`user_fk`) REFERENCES `rebuni_db`.`users`(`id`)    
				) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `ratings`;";
		$db->pdo->exec($SQL);	
	}
}

?>