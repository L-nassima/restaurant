<?php

class MealModel {
	private $db;

	function __construct() {
		$this->db = new Database();
	}

	function getMealList() {
		return $this->db->query('SELECT * FROM meal', []);
	}

	function getMealById($id) {
		return $this->db->queryOne('SELECT Id, Name, Photo, Description, SalePrice FROM meal WHERE Id = ?', [$id]);
	}

	function addNewMeal($name, $photo, $description, $QuantityInStock, $buyPrice, $salePrice ) {
		
			$this->db->executeSql('INSERT INTO meal(`Name`, `Photo`, `Description`, `QuantityInStock`, `BuyPrice`, `SalePrice`) VALUES(?, ?, ?, ?, ?, ?)',[$name, $photo, $description, $QuantityInStock, $buyPrice, $salePrice]);

	}

	function remouveMealName($id){
			$this->db->executeSql('DELETE FROM `meal` WHERE `Id` = ?', [$id]);
	}

		
}