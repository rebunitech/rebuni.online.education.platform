<?php

class rm008_create_table_sector_school
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `sector_school` (
				    `sector_fk` INT NOT NULL,
				    `school_fk` INT NOT NULL,
				    CONSTRAINT `fk_sector_sector` FOREIGN KEY (`sector_fk`) REFERENCES `rebuni_db`.`sectors`(`id`) ON DELETE CASCADE,
				    CONSTRAINT `fk_school_sector` FOREIGN KEY (`school_fk`) REFERENCES `rebuni_db`.`schools`(`user_fk`) ON DELETE CASCADE,
				    CONSTRAINT `pk_sector_school` PRIMARY KEY (`sector_fk`, `school_fk`)
				) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `sector_school`;";
		$db->pdo->exec($SQL);	
	}
}

?>