<?php

class rm017_create_table_groups
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `groups` (
			    `id` INT PRIMARY KEY AUTO_INCREMENT,
			    `name` VARCHAR(150) NOT NULL
			) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `groups`;";
		$db->pdo->exec($SQL);	
	}
}

?>