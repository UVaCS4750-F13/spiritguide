<?php

// model imports
App::import('Model','Ingredient'); 
App::import('Model','Cocktail'); 
App::import('Model','User'); 

// define database constants
define("SERVER", "stardock.cs.virginia.edu");
define("USER", "cs4750baw4ux");
define("PASS", "fall2013");
define("DB", "cs4750baw4ux");

class QueryBot {

	public function db_connect() {
		$db_connection = new mysqli(SERVER, USER, PASS, DB);
		if (mysqli_connect_error()) {
			echo "Can't connect!";
			echo "<br>" . mysqli_connect_error();
			return null;
		} return $db_connection;
	}

	function run($db, $stmt) {
		$success = $stmt->execute();
		if (!$success) {
			throw new BadRequestException("Error: ".htmlspecialchars($stmt->error));
		} $stmt->close(); $db->close();
		return $success;
	}

	/************ INGREDIENT FILTER  ************/

	public function ingredient_query($description, $brand, $type) {
		$this->loadModel('Ingredient');
		$db = $this->Ingredient->getDataSource();

		// select alcohols

		if (is_null($description) and is_null($brand) and $type == 'alcohols') {
			$sql =  "SELECT * FROM ingredient WHERE ingredient_id IN (SELECT ingredient_id FROM proof)";
			return $db->fetchAll($sql);
		} 

		elseif (is_null($description) and !is_null($brand) and $type == 'alcohols') {
			return $db->fetchAll("SELECT * FROM ingredient WHERE brand LIKE CONCAT('%',:brand,'%')
				AND ingredient_id IN (SELECT ingredient_id FROM proof)", array('brand' => $brand));
		}

		elseif (!is_null($description) and is_null($brand) and $type == 'alcohols') {
			$sql = "SELECT * FROM ingredient WHERE description LIKE CONCAT('%',:description,'%') 
				AND ingredient_id IN (SELECT ingredient_id FROM proof)";
			return $db->fetchAll($sql, array('description' => $description));
		}

		elseif (!is_null($description) and !is_null($brand) and $type == 'alcohols') {
			$sql = "SELECT * FROM ingredient WHERE description LIKE CONCAT('%',:description,'%') 
				AND brand LIKE CONCAT('%',:brand,'%') 
				AND ingredient_id IN (SELECT ingredient_id FROM proof)";
			return $db->fetchAll($sql, array('description' => $description, 'brand' => $brand));
		}

		// select from mixers

		elseif (is_null($description) and is_null($brand) and $type == 'mixers') {
			$sql =  "SELECT * FROM ingredient WHERE ingredient_id NOT IN(SELECT ingredient_id FROM proof)";
			return $db->fetchAll($sql);
		} 

		elseif (is_null($description) and !is_null($brand) and $type == 'mixers') {
			$sql = "SELECT * FROM ingredient WHERE brand LIKE CONCAT('%',:brand,'%') 
				AND ingredient_id NOT IN(SELECT ingredient_id FROM proof)";
			return $db->fetchAll($sql, array('brand' => $brand));
		}

		elseif (!is_null($description) and is_null($brand) and $type == 'mixers') {
			$sql = "SELECT * FROM ingredient WHERE description LIKE CONCAT('%',:description,'%') 
				AND ingredient_id NOT IN(SELECT ingredient_id FROM proof)";
			return $db->fetchAll($sql, array('description' => $description));
		}

		elseif (!is_null($description) and !is_null($brand) and $type == 'mixers') {
			$sql = "SELECT * FROM ingredient WHERE description LIKE CONCAT('%',:description,'%') 
				AND brand LIKE CONCAT('%',:brand,'%') 
				AND ingredient_id NOT IN(SELECT ingredient_id FROM proof)";
			return $db->fetchAll($sql, array('description' => $description, 'brand' => $brand));

		}

		// select all ingredients

		elseif (is_null($description) and is_null($brand) and $type == 'all') {
			$sql =  "SELECT * FROM ingredient";
			return $db->fetchAll($sql);
		} 

		elseif (is_null($description) and !is_null($brand) and $type == 'all') {
			$sql = "SELECT * FROM ingredient WHERE brand LIKE CONCAT('%',:brand,'%')";
			return $db->fetchAll($sql, array('brand' => $brand));
		}

		elseif (!is_null($description) and is_null($brand) and $type == 'all') {
			$sql = "SELECT * FROM ingredient WHERE description LIKE CONCAT('%',:description,'%')";
			return $db->fetchAll($sql, array('description' => $description));
		}

		elseif (!is_null($description) and !is_null($brand) and $type == 'all') {
			$sql = "SELECT * FROM ingredient WHERE description LIKE CONCAT('%',:description,'%') 
				AND brand LIKE CONCAT('%',:brand,'%')";
			return $db->fetchAll($sql, array('description' => $description, 'brand' => $brand));

		}

		else { return $db->fetchAll( "SELECT * FROM ingredient"); }
	}

	/************ COCKTAIL FILTER  ************/

	public function cocktail_query($available, $name, $tag) {
		$this->loadModel('Cocktail');
		$db = $this->Cocktail->getDataSource();

		return $db->fetchAll('SELECT * FROM cocktail');

	}



	/************ MODEL SELECTIONS ************/

	public function get_ingredient_brands_asc() {
		$this->loadModel('Ingredient');
		$db = $this->Ingredient->getDataSource();

		$sql = "SELECT ingredient_id, brand FROM ingredient ORDER BY brand ASC";
		return $db->fetchAll($sql);
	}

	public function get_cocktail_by_id($cocktail_id) {
		$this->loadModel('Cocktail');
		$db = $this->Cocktail->getDataSource();

		$sql = "SELECT * FROM cocktail WHERE cocktail_id = :cocktail_id LIMIT 1";
		return $db->fetchAll($sql, array('cocktail_id' => $cocktail_id));
	}

	public function get_cocktail_by_name($name) {
		$this->loadModel('Cocktail');
		$db = $this->Cocktail->getDataSource();

		$sql = "SELECT * FROM cocktail WHERE name = :name LIMIT 1";
		return $db->fetchAll($sql, array('name' => $name));
	}

	public function get_cocktail_ingredients($cocktail_id) {
		$this->loadModel('Cocktail');
		$db = $this->Cocktail->getDataSource();

		$sql = "SELECT ing.ingredient_id, description, brand, volume
			FROM cocktail coc
				JOIN contains con ON coc.cocktail_id=con.cocktail_id
				JOIN ingredient ing ON con.ingredient_id=ing.ingredient_id
				WHERE coc.cocktail_id = :cocktail_id";
		return $db->fetchAll($sql, array('cocktail_id' => $cocktail_id));
	}

	public function get_user_ingredient($user_id, $ingredient_id) {
		$this->loadModel('User');
		$db = $this->User->getDataSource();

		$sql = "SELECT o.volume_in_ml
			FROM user u
				JOIN owns o ON u.user_id=o.user_id
				JOIN ingredient i ON o.ingredient_id=i.ingredient_id
				WHERE u.user_id = :user_id AND i.ingredient_id = :ingredient_id LIMIT 1";
		return $db->fetchAll($sql, array('user_id' => $user_id, 'ingredient_id' => $ingredient_id));
	}



	/************ MODEL INSERTIONS ************/

	public function insert_contains($cocktail_id, $ingredient_id, $volume) {
		$db = self::db_connect();
		$sql = "INSERT INTO contains (cocktail_id, ingredient_id, volume) VALUES (? , ?, ?)";

		$stmt = $db->prepare($sql);
		$stmt->bind_param("sss", $cocktail_id, $ingredient_id, $volume);
		return self::run($db, $stmt);
	}

	public function insert_cocktail($name, $recipe) {
		$db = self::db_connect();
		$sql = "INSERT INTO cocktail (name, recipe) VALUES (?, ?)";
		
		$stmt = $db->prepare($sql);
		$stmt->bind_param("ss", $name, $recipe);
		return self::run($db, $stmt);
	}


	/************ MODEL UPDATES ************/

	public function update_cocktail_name($cocktail_id, $name) {
		$db = self::db_connect();
		$sql = "UPDATE cocktail SET name = IF(LENGTH(?)=0, NULL) WHERE cocktail_id = ?";
		
		$stmt = $db->prepare($sql);
		$stmt->bind_param("ss", $name, $cocktail_id);
		return self::run($db, $stmt);
	}

	public function update_cocktail_recipe($cocktail_id, $recipe) {
		$db = self::db_connect();
		$sql = "UPDATE cocktail SET recipe = ? WHERE cocktail_id = ?";
		
		$stmt = $db->prepare($sql);
		$stmt->bind_param("ss", $recipe, $cocktail_id);
		return self::run($db, $stmt);
	}


	/************ MODEL DELETES **********/

	public function delete_contains($cocktail_id, $ingredient_id) {
		$db = self::db_connect();
		$sql = "DELETE FROM contains WHERE cocktail_id = ? AND ingredient_id = ?";
		
		$stmt = $db->prepare($sql);
		$stmt->bind_param("ss", $cocktail_id, $ingredient_id);
		return self::run($db, $stmt);
	}

}