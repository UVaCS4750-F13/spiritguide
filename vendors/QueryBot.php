<?php

// model imports
App::import('Model','Ingredient'); 
App::import('Model','Cocktail'); 

class QueryBot {

	public function ingredient_query() {
		$description = Configure::read('ingredient_query.descr');
		$brand = Configure::read('ingredient_query.brand');
		$type = Configure::read('ingredient_query.type');

		if (is_null($description) and is_null($brand) and $type == 'alcohols') {
			return "SELECT * FROM ingredient WHERE ingredient_id IN (SELECT ingredient_id FROM proof)";
		} elseif (is_null($description) and !is_null($brand) and $type == 'alcohols') {
			return "SELECT * FROM ingredient WHERE brand LIKE '%".$brand."%' 
				AND ingredient_id IN (SELECT ingredient_id FROM proof)";
		} elseif (!is_null($description) and is_null($brand) and $type == 'alcohols') {
			return "SELECT * FROM ingredient WHERE description LIKE '%".$description."%' 
				AND ingredient_id IN (SELECT ingredient_id FROM proof)";
		} elseif (!is_null($description) and !is_null($brand) and $type == 'alcohols') {
			return "SELECT * FROM ingredient WHERE description LIKE '%".$description."%' 
				AND brand LIKE '%".$brand."%' 
				AND ingredient_id IN (SELECT ingredient_id FROM proof)";
		}

		elseif (is_null($description) and is_null($brand) and $type == 'mixers') {
			return "SELECT * FROM ingredient WHERE ingredient_id NOT IN (SELECT ingredient_id FROM proof)";
		} elseif (is_null($description) and !is_null($brand) and $type == 'mixers') {
			return "SELECT * FROM ingredient WHERE brand LIKE '%".$brand."%' 
				AND ingredient_id NOT IN (SELECT ingredient_id FROM proof)";
		} elseif (!is_null($description) and is_null($brand) and $type == 'mixers') {
			return "SELECT * FROM ingredient WHERE description LIKE '%".$description."%' 
				AND ingredient_id NOT IN (SELECT ingredient_id FROM proof)";
		} elseif (!is_null($description) and !is_null($brand) and $type == 'mixers') {
			return "SELECT * FROM ingredient WHERE description LIKE '%".$description."%' 
				AND brand LIKE '%".$brand."%' 
				AND ingredient_id NOT IN (SELECT ingredient_id FROM proof)";
		}

		elseif (is_null($description) and is_null($brand) and $type == "all") {
			return "SELECT * FROM ingredient WHERE ingredient_id IN (SELECT ingredient_id FROM proof)";
		} elseif (is_null($description) and !is_null($brand) and $type == "all") {
			return "SELECT * FROM ingredient WHERE brand LIKE '%".$brand."%'";
		} elseif (!is_null($description) and is_null($brand) and $type == "all") {
			return "SELECT * FROM ingredient WHERE description LIKE '%".$description."%'";
		} elseif (!is_null($description) and !is_null($brand) and $type == "all") {
			return "SELECT * FROM ingredient WHERE description LIKE '%".$description."%' AND brand LIKE '%".$brand."%'";
		}

		else { return "SELECT * FROM ingredient"; }
	}


	/** Model Getters **/

	public function get_ingredient_brands_asc() {
		$this->loadModel('Ingredient');
		$db = $this->Ingredient->getDataSource();

		$sql = "SELECT ingredient_id, brand FROM ingredient ORDER BY brand ASC";

		return $db->fetchAll($sql);
	}

	public function get_cocktail_by_id($cocktail_id) {
		return "SELECT * FROM cocktail WHERE cocktail_id='".$cocktail_id."' LIMIT 1";
	}

	public function get_cocktail_by_name($name) {
		return "SELECT * FROM cocktail WHERE name='".$name."' LIMIT 1";
	}

	public function get_ingredients_in_cocktail($cocktail_id) {
		return "SELECT description, brand, volume
			FROM cocktail coc
				JOIN contains con ON coc.cocktail_id=con.cocktail_id
				JOIN ingredient ing ON con.ingredient_id=ing.ingredient_id
				WHERE coc.cocktail_id='".$cocktail_id."'";
	}



	/** Model Insertions **/

	public function insert_contains($cocktail_id, $ingredient_id, $volume) {

			// database constants
	$SERVER = "stardock.cs.virginia.edu";
	$USER = "cs4750baw4ux";
	$PASS = "fall2013";
	$DB = "cs4750baw4ux";

		$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
		if (mysqli_connect_error()) {
			echo "Can't connect!";
			echo "<br>" . mysqli_connect_error();
			return null;
		}

		$sql = "INSERT INTO contains (cocktail_id, ingredient_id, volume) VALUES (? , ?, ?)";
		$stmt = $db_connection->prepare($sql);
	
		// bind parameters
		$stmt->bind_param("sss", $cocktail_id, $ingredient_id, $volume);
		
		//run the query
		$success = $stmt->execute();

		if (!$success) {
			 die('execute() failed: ' . htmlspecialchars($stmt->error));
		}

		$stmt->close();
		$db_connection->close();

		return $success;

	}

	public function insert_cocktail($name, $recipe) {

		// database constants
		$SERVER = "stardock.cs.virginia.edu";
		$USER = "cs4750baw4ux";
		$PASS = "fall2013";
		$DB = "cs4750baw4ux";

		$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
		if (mysqli_connect_error()) {
			echo "Can't connect!";
			echo "<br>" . mysqli_connect_error();
			return null;
		}

		$stmt = $db_connection->prepare("INSERT INTO cocktail (name, recipe) VALUES (?, ?)");
	
		// bind parameters
		$stmt->bind_param("ss", $name, $recipe);
		
		//run the query
		$success = $stmt->execute();

		if (!$success) {
			$this->redirect(array('action' => 'add'));
			$this->Session->setFlash('boo');
		}

		$stmt->close();
		$db_connection->close();

		return $success;

	}

}