<?php

class rm003_create_table_schools
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `schools` (
				    `user_fk` INT NOT NULL UNIQUE,
				    `name` VARCHAR(200) NOT NULL,
				    `email` VARCHAR(200) NOT NULL,
				    `phone_number` VARCHAR(15),
				    `p_o_box` VARCHAR(25),
					`payment_id` VARCHAR(10),
				    `region` VARCHAR(200),
				    `state`  VARCHAR(200),
				    `is_open` BOOLEAN DEFAULT 0 NOT NULL,
				    `date_registerd` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
				     CONSTRAINT `fk_school_user` FOREIGN KEY (`user_fk`) REFERENCES `rebuni_db`.`users`(`id`) ON DELETE CASCADE
				) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `schools`;";
		$db->pdo->exec($SQL);	
	}
}

?>