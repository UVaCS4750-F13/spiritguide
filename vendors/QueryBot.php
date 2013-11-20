<?php
App::import('Model','Ingredient'); 
App::import('Model','Cocktail');
App::import('Model','Owns');  
App::import('Model','Price'); 
App::import('Model','Proof'); 
App::import('Model','User'); 

define("SERVER", "stardock.cs.virginia.edu");
define("USER", "cs4750baw4ux");
define("PASS", "fall2013");
define("DB", "cs4750baw4ux");

class QueryBot {

	
	function db_connect() {
		$db_connection = new mysqli(SERVER, USER, PASS, DB);
		if (mysqli_connect_error()) {
			echo "Can't connect!";
			echo "<br>" . mysqli_connect_error();
			return null;
		} return $db_connection;}
	
	function run($db, $stmt) {
		$success = $stmt->execute();
		if (!$success) {
			throw new BadRequestException("Error: ".htmlspecialchars($stmt->error));
		} $stmt->close(); $db->close();
		return $success;}
	
	public function request($index, $attribute) {
    	$result = trim($this->request->data[$index][$attribute]);
       	if (strcmp($result, "") == 0) {
    		return NULL;
    	} else { 
    		return $request;
    	}}


    /************ COCKTAIL OPERATIONS  ************/


    public function index_cocktails($available, $name, $tag) {
		$this->loadModel('Cocktail');
		$db = $this->Cocktail->getDataSource();

		return $db->fetchAll('SELECT * FROM cocktail');}

	public function create_cocktail($name, $recipe) {
		$db = self::db_connect();
		
		$sql = "INSERT INTO cocktail (name, recipe) VALUES (:name, :recipe)";
		
		$stmt = $db->prepare($sql);
		$stmt->bind_param(':name', $name);
		$stmt->bind_param(':recipe', $recipe);

		return self::run($db, $stmt); }


    /************ CONTAINS OPERATIONS ************/


    public function create_contains($cocktail_id, $ingredient_id, $volume) {
		$db = self::db_connect();
		
		$sql = "INSERT INTO contains (cocktail_id, ingredient_id, volume) VALUES (:cocktail_id, :ingredient_id, :volume)";
		
		$stmt = $db->prepare($sql);
		$stmt->bind_param(':cocktail_id', $cocktail_id);
		$stmt->bind_param(':ingredient_id', $ingredient_id);
		$stmt->bind_param(':volume', $volume);

		return self::run($db, $stmt);}

	public function delete_contains($cocktail_id, $ingredient_id) {
		$db = self::db_connect();

		$sql = "DELETE FROM contains 
		WHERE cocktail_id = :cocktail_id 
		AND ingredient_id = :ingredient_id";
		
		$stmt = $db->prepare($sql);
		$stmt->bind_param(':cocktail_id', $cocktail_id);
		$stmt->bind_param(':ingredient_id', $ingredient_id);

		return self::run($db, $stmt);}


	/************ INGREDIENT OPERATIONS  ************/


	public function create_ingredient($description, $brand) {
		$db = self::db_connect();

		$sql = "INSERT INTO ingredient (description, brand) VALUES (:description, :brand)";

		$stmt = $db->prepare($sql);
		$stmt->bind_param(':description', $description);
		$stmt->bind_param(':brand', $brand);

		return self::run($db, $stmt);}

	public function index_ingredient($description, $brand, $classification) {
		$this->loadModel('Ingredient');
		$db = $this->Ingredient->getDataSource();

		// Select from Alcohols

		if (is_null($description) and is_null($brand) 
			and strcmp($classification, 'alcohols') == 0) {
			
			$sql =  "SELECT * FROM ingredient 
					WHERE ingredient_id IN 
					(SELECT ingredient_id FROM proof)";
		
			return $db->fetchAll($sql);
		} 

		elseif (is_null($description) and !is_null($brand) 
			and $classification == 'alcohols') {
			
			$sql = "SELECT * FROM ingredient 
				WHERE brand LIKE CONCAT('%',:brand,'%')
				AND ingredient_id IN (SELECT ingredient_id FROM proof)";

			return $db->fetchAll($sql, array('brand' => $brand));
		}

		elseif (!is_null($description) and is_null($brand)
			and $classification == 'alcohols') {

			$sql = "SELECT * FROM ingredient 
				WHERE description LIKE CONCAT('%',:description,'%') 
				AND ingredient_id IN (SELECT ingredient_id FROM proof)";
			
			return $db->fetchAll($sql, array('description' => $description));
		}

		elseif (!is_null($description) and !is_null($brand)
			and $classification == 'alcohols') {
			
			$sql = "SELECT * FROM ingredient
				WHERE description LIKE CONCAT('%',:description,'%') 
				AND brand LIKE CONCAT('%',:brand,'%') 
				AND ingredient_id IN (SELECT ingredient_id FROM proof)";
			
			return $db->fetchAll($sql, array('description' => $description, 'brand' => $brand));
		}

		// Select from Mixers

		elseif (is_null($description) and is_null($brand)
			and $classification == 'mixers') {
			
			$sql = "SELECT * FROM ingredient
				WHERE ingredient_id NOT IN (SELECT ingredient_id FROM proof)";
			
			return $db->fetchAll($sql);
		} 

		elseif (is_null($description) and !is_null($brand) 
			and $classification == 'mixers') {
			
			$sql = "SELECT * FROM ingredient
				WHERE brand LIKE CONCAT('%',:brand,'%') 
				AND ingredient_id NOT IN (SELECT ingredient_id FROM proof)";
			
			return $db->fetchAll($sql, array('brand' => $brand));
		}

		elseif (!is_null($description) and is_null($brand)
			and $classification == 'mixers') {
			
			$sql = "SELECT * FROM ingredient
				WHERE description LIKE CONCAT('%',:description,'%') 
				AND ingredient_id NOT IN (SELECT ingredient_id FROM proof)";

			return $db->fetchAll($sql, array('description' => $description));
		}

		elseif (!is_null($description) and !is_null($brand)
			and $classification == 'mixers') {
			
			$sql = "SELECT * FROM ingredient 
				WHERE description LIKE CONCAT('%',:description,'%') 
				AND brand LIKE CONCAT('%',:brand,'%') 
				AND ingredient_id NOT IN(SELECT ingredient_id FROM proof)";
			
			return $db->fetchAll($sql, array('description' => $description, 'brand' => $brand));
		}

		// Select from All Ingredients

		elseif (is_null($description) and is_null($brand)
			and $classification == 'all') {
			
			$sql =  "SELECT * FROM ingredient";
			
			return $db->fetchAll($sql);
		} 

		elseif (is_null($description) and !is_null($brand) 
			and $classification == 'all') {
			
			$sql = "SELECT * FROM ingredient
				WHERE brand LIKE CONCAT('%',:brand,'%')";
			
			return $db->fetchAll($sql, array('brand' => $brand));
		}

		elseif (!is_null($description) and is_null($brand) 
			and $classification == 'all') {
			
			$sql = "SELECT * FROM ingredient
				WHERE description LIKE CONCAT('%',:description,'%')";
			
			return $db->fetchAll($sql, array('description' => $description));
		}

		elseif (!is_null($description) and !is_null($brand)
			and $classification == 'all') {
			
			$sql = "SELECT * FROM ingredient
				WHERE description LIKE CONCAT('%',:description,'%') 
				AND brand LIKE CONCAT('%',:brand,'%')";
			
			return $db->fetchAll($sql, array('description' => $description, 'brand' => $brand));
		}

		return $db->fetchAll( "SELECT * FROM ingredient");}

	public function retrieve_ingredient($ingredient_id) {
		$this->loadModel('Ingredient');
		$db = $this->Ingredient->getDataSource();

		$sql = "SELECT *  FROM ingredient WHERE ingredient_id = :ingredient_id LIMIT 1";
		
		return $db->fetchAll($sql, array('ingredient_id' => $ingredient_id)); }


	/************ OWNS OPERATIONS ************/


	public function retrieve_owns($user_id, $ingredient_id) {
		$this->loadModel('Owns');
		$db = $this->Price->getDataSource();

		$sql = "SELECT volume FROM owns 
			WHERE user_id = :user_id
			AND ingredient_id = :ingredient_id LIMIT 1";
		
		return $db->fetchAll($sql, array('user_id' => $user_id, 
			'ingredient_id' => $ingredient_id)); }


	/************ PRICE OPERATIONS ************/


	public function retrieve_prices($ingredient_id) {
		$this->loadModel('Price');
		$db = $this->Price->getDataSource();

		$sql = "SELECT volume, price FROM price WHERE ingredient_id = :ingredient_id";
		return $db->fetchAll($sql, array('ingredient_id' => $ingredient_id)); }


	/************ PROOF OPERATIONS ************/


	public function retrieve_proofs($ingredient_id) {
		$this->loadModel('Proof');
		$db = $this->Proof->getDataSource();

		$sql = "SELECT proof FROM proof WHERE ingredient_id = :ingredient_id";
		
		return $db->fetchAll($sql, array('ingredient_id' => $ingredient_id)); }


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

	





	/************ MODEL INSERTIONS ************/






	/************ MODEL UPDATES ************/

	public function update_cocktail_name($cocktail_id, $name) {
		$db = self::db_connect();
		$sql = "UPDATE cocktail SET name = ? WHERE cocktail_id = ?";
		
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

	


 	

}