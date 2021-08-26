
<?php

class rm020_insert_into_sector
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "INSERT IGNORE INTO `sectors` (name) VALUES
			    ('Business Schools'),
			    ('Trade/Vocational Schools'),
			    ('IT/Computer Schools'),
			    ('Learning Centers'),
			    ('Tutoring Services'),
			    ('Assessment Services');";
		$db->pdo->exec($SQL);	
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$SQL = "DELETE FROM `user_permissions` WHERE name = 'Business Schools';
				DELETE FROM `user_permissions` WHERE name = 'Trade/Vocational Schools';
				DELETE FROM `user_permissions` WHERE name = 'IT/Computer Schools';
				DELETE FROM `user_permissions` WHERE name = 'Learning Centers';
				DELETE FROM `user_permissions` WHERE name = 'Tutoring Services';
				DELETE FROM `user_permissions` WHERE name = 'Assessment Services';";
		$db->pdo->exec($SQL);	
	}
}

?>