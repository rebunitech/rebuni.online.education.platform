<?php

class rm009_create_table_sector_lecture
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "CREATE TABLE IF NOT EXISTS `sector_lecture` (
				    `sector_fk` INT NOT NULL,
				    `lecture_fk` INT NOT NULL,
				    CONSTRAINT `fk_sector_ss` FOREIGN KEY (`sector_fk`) REFERENCES `rebuni_db`.`sectors`(`id`) ON DELETE CASCADE,
				    CONSTRAINT `fk_lecture_ss` FOREIGN KEY (`lecture_fk`) REFERENCES `rebuni_db`.`lectures`(`user_fk`) ON DELETE CASCADE,
				    CONSTRAINT `pk_sector_lecture` PRIMARY KEY (`sector_fk`, `lecture_fk`)
				) ENGINE=INNODB;";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DROP TABLE IF EXISTS `sector_lecture`;";
		$db->pdo->exec($SQL);	
	}
}

?>