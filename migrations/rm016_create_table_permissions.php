<?php

class rm016_create_table_permissions
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `permissions` (
				    `id` INT PRIMARY KEY AUTO_INCREMENT,
				    `name` VARCHAR(150) NOT NULL,
				    `code_name` VARCHAR(150) NOT NULL UNIQUE
				) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `permissions`;";
		$db->pdo->exec($SQL);	
	}
}

?>