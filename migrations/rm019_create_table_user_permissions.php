<?php

class rm019_create_table_user_permissions
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `user_permissions` (
				    `user_fk` INT NOT NULL,
				    `permission_fk` INT NOT NULL,
				    CONSTRAINT `fk_user_up` FOREIGN KEY (`user_fk`) REFERENCES `rebuni_db`.`users`(`id`) ON DELETE CASCADE,
				    CONSTRAINT `fk_permission_up` FOREIGN KEY (`permission_fk`) REFERENCES `rebuni_db`.`permissions`(`id`) ON DELETE CASCADE,
				    CONSTRAINT `pk_user_permissions` PRIMARY KEY (`user_fk`, `permission_fk`)
				) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `user_permissions`;";
		$db->pdo->exec($SQL);	
	}
}

?>