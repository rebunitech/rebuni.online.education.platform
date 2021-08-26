<?php

class rm002_create_table_sector
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `sectors` (
				    `id` INT PRIMARY KEY AUTO_INCREMENT,
				    `name` VARCHAR(150) NOT NULL UNIQUE
				) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `sectors`;";
		$db->pdo->exec($SQL);	
	}
}

?>