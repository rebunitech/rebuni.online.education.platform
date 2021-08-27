<?php

namespace app\core;

use app\core\Application;
use PDO;

abstract class DBModel extends Model
{
	abstract public function tableName(): string;
	abstract public function attributes(): array;

	public function save($extra_attributes = [])
	{
		$tableName = $this->tableName();
		$attributes = $this->attributes();
		foreach ($extra_attributes as $attr){
			$attributes[] = $attr;
		}
		$params = array_map(fn($attr) => ":$attr", $attributes);
		$stmt = self::prepare("INSERT INTO $tableName (".implode(",", $attributes).") 
							  VALUES (".implode(",", $params).");");

		foreach ($attributes as $attribute) {
			$stmt->bindValue($attribute, $this->{$attribute});
		}
		$stmt->execute();
		
		return true;
	}

	public function update($where, $extra_attributes = [])
	{

		
		$tableName = $this->tableName();
		$attributes = $this->attributes();
		
		foreach ($extra_attributes as $attr){
			$attributes[] = $attr;
		}
		$sql = implode(", ", array_map(fn($attr) => "$attr = :$attr", $attributes));
		$condition = implode(" AND ", array_map(fn($con) => "$con = :$con", array_keys($where)));

		$stmt = self::prepare("UPDATE $tableName SET $sql WHERE $condition");
		foreach ($attributes as $attribute) {
			$stmt->bindValue($attribute, $this->{$attribute});
		}
		foreach ($where as $key => $value) {
			$stmt->bindValue($key, $value);
		}
		$stmt->execute();
	}

	public function put($attribute, $value, $where)
	{
		$tableName = $this->tableName();
		$condition = implode(" AND ", array_map(fn($con) => "$con = :$con", array_keys($where)));
		$stmt = self::prepare("UPDATE $tableName SET $attribute = :$attribute WHERE $condition");
		
		$stmt->bindValue($attribute, $value);

		foreach ($where as $key => $value) {
			$stmt->bindValue($key, $value);
		}
		$stmt->execute();
		return true;
	}
	public static function findOne($where)
	{
		$tableName = static::tableName();
		$attributes = array_keys($where);
		$sql = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
		$stmt = self::prepare("SELECT * FROM $tableName WHERE $sql;");
		foreach ($where as $key => $value){
			$stmt->bindValue(":$key", $value);
		}
		$stmt->execute();	
		return $stmt->fetchObject(static::class);
	}

	public static function exist($where, $tableName)
	{
		$attributes = array_keys($where);
		$sql = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
		$stmt = self::prepare("SELECT * FROM $tableName WHERE $sql;");
		foreach ($where as $key => $value){
			$stmt->bindValue(":$key", $value);
		}
		$stmt->execute();	
		return $stmt->fetchObject(static::class);
	}
	
	public static function loadRelated($relationTable, $relations)
	{	
		$sql = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", array_keys($relations)));
		$stmt = self::prepare("SELECT * FROM $relationTable WHERE $sql;");
		$stmt->execute($relations);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public static function prepare($sql)
	{

		return 	Application::$app->db->pdo->prepare($sql);
	}
}

?>