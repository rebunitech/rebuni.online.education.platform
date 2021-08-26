<?php

class rm013_create_table_followers
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `followers` (
				    `following_fk` INT NOT NULL,
				    `follower_fk` INT NOT NULL,
				    CONSTRAINT `fk_following_followers` FOREIGN KEY (`following_fk`) REFERENCES `rebuni_db`.`users`(`id`) ON DELETE CASCADE,
				    CONSTRAINT `fk_follower_followers` FOREIGN KEY (`follower_fk`) REFERENCES `rebuni_db`.`users`(`id`) ON DELETE CASCADE,
				    CONSTRAINT `pk_following_follower` PRIMARY KEY (`following_fk`, `follower_fk`)
				) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `followers`;";
		$db->pdo->exec($SQL);	
	}
}

?>