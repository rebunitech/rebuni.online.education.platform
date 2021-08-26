<?php

class rm001_initial
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `users` (
				    `id` INT PRIMARY KEY AUTO_INCREMENT,
				    `first_name` VARCHAR(150),
				    `last_name` VARCHAR(150),
				    `date_of_birth` DATE,
				    `username` VARCHAR(150) NOT NULL UNIQUE,
				    `password` VARCHAR(300) NOT NULL,
				    `is_active` BOOLEAN DEFAULT 1 NOT NULL,
				    `is_staff` BOOLEAN DEFAULT 0 NOT NULL,
				    `email` VARCHAR(255) NOT NULL UNIQUE,
				    `phone_number` VARCHAR(15),
				    `p_o_box` INT(5),
				    `region` VARCHAR(200),
				    `state`  VARCHAR(200),
				    `user_type` VARCHAR(10),
				    `date_registerd` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
				) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `users`;";
		$db->pdo->exec($SQL);	
	}
}

?>