<?php

class rm018_create_table_group_permissions
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `group_permissions` (
			    `group_fk` INT NOT NULL,
			    `permission_fk` INT NOT NULL,
			    CONSTRAINT `fk_group_gp` FOREIGN KEY (`group_fk`) REFERENCES `rebuni_db`.`groups`(`id`) ON DELETE CASCADE,
			    CONSTRAINT `fk_permission_gp` FOREIGN KEY (`permission_fk`) REFERENCES `rebuni_db`.`permissions`(`id`) ON DELETE CASCADE,
			    CONSTRAINT `pk_group_permissions` PRIMARY KEY (`group_fk`, `permission_fk`)
			) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `group_permissions`;";
		$db->pdo->exec($SQL);	
	}
}

?>