<?php
App::import('Model','User'); 

class QueryBot {

	function tidy($data) {
		if (trim($data == "")) { return NULL; }
		return trim($data); }

    function perform($sql, $bound) {
    	$this->loadModel('User');
    	$db = $this->User->getDataSource();
    	return $db->fetchAll($sql, $bound); }

    function perform_free($sql) {
    	$this->loadModel('User');
    	$db = $this->User->getDataSource();
    	return $db->fetchAll($sql); }


    /************ COCKTAIL OPERATIONS  ************/


    public function index_cocktails($availability, $name, $tag) {
		$this->loadModel('Cocktail');
		$db = $this->Cocktail->getDataSource();

		if (strcmp($availability, 'all') == 0 and is_null($name) and
			is_null($tag)) {

			$sql = "SELECT * FROM cocktail";

			return $db->fetchAll($sql);
		}

		elseif ((strcmp($availability, 'all') == 0) and !is_null($name) and
			is_null($tag)) {

			$sql = "SELECT * FROM cocktail
			WHERE name LIKE CONCAT('%',:name,'%')";

			return $db->fetchAll($sql, array(':name' => $name));
		}

		elseif (strcmp($availability, 'all') == 0 and is_null($name) and
			!is_null($tag)) {

			$sql = "SELECT * FROM cocktail 
			WHERE cocktail_id IN (SELECT cocktail_id FROM labels
									WHERE tag_id = :tag)";
			
			return $db->fetchAll($sql, array(':tag' => $tag));
		}

		elseif (strcmp($availability, 'all') == 0 and !is_null($name) and
			!is_null($tag)) {

			$sql = "SELECT * FROM cocktail 
			WHERE name LIKE CONCAT('%',:name,'%') 
			AND cocktail_id IN 
			(SELECT cocktail_id FROM labels
				WHERE tag_id = :tag)";
			
			return $db->fetchAll($sql, array(':name' => $name, 'tag' => $tag));
		}

		else { return $db->fetchAll('SELECT * FROM cocktail'); }}

	public function create_cocktail($name, $recipe) {
		$sql = "INSERT INTO cocktail (name, recipe) VALUES (:name, :recipe)";
		$bound = array('name' => $name, 'recipe' => $recipe);
		return self::perform($sql, $bound); }

	public function retrieve_cocktail_by_name($name) {
		$sql = "SELECT * FROM cocktail WHERE name = :name LIMIT 1";
		$bound = array('name' => $name);
		return self::perform($sql, $bound); }

	public function retrieve_cocktail($cocktail_id) {
		$sql = "SELECT * FROM cocktail WHERE cocktail_id = :cocktail_id LIMIT 1";
		$bound = array('cocktail_id' => $cocktail_id);
		return self::perform($sql, $bound); }

	public function update_cocktail_name($cocktail_id, $name) {
		$sql = "UPDATE cocktail SET name = :name WHERE cocktail_id = :cocktail_id";
		$bound = array('name' => $name, 'cocktail_id' => $cocktail_id);
		return self::perform($sql, $bound); }

	public function update_cocktail_recipe($cocktail_id, $recipe) {
		$sql = "UPDATE cocktail SET recipe = :recipe WHERE cocktail_id = :cocktail_id";
		$bound = array('recipe' => $recipe, 'cocktail_id' => $cocktail_id);
		return self::perform($sql, $bound); }


    /************ CONTAINS OPERATIONS ************/


    public function create_contains($cocktail_id, $ingredient_id, $volume) {
		$sql = "INSERT INTO contains (cocktail_id, ingredient_id, volume) VALUES (:cocktail_id, :ingredient_id, :volume)";
		$bound = array('cocktail_id' => $cocktail_id, 'ingredient_id' => $ingredient_id, 'volume' => $volume);
		return self::perform($sql, $bound); }

	public function update_contains($cocktail_id, $ingredient_id, $volume) {
		$sql = "UPDATE contains SET volume = :volume 
			WHERE cocktail_id = :cocktail_id
			AND ingredient_id = :ingredient_id";
		$bound = array('volume' => $volume, 'cocktail_id' => $cocktail_id, 'ingredient_id' => $ingredient_id); 
		return self::perform($sql, $bound); }

	public function delete_contains($cocktail_id, $ingredient_id) {
		$sql = "DELETE FROM contains WHERE cocktail_id = :cocktail_id AND ingredient_id = :ingredient_id";
		$bound = array('cocktail_id' => $cocktail_id, 'ingredient_id' => $ingredient_id);
		return self::perform($sql, $bound); }


	/************ INGREDIENT OPERATIONS  ************/


	public function create_ingredient($description, $brand) {
		$sql = "INSERT INTO ingredient (description, brand) VALUES (:description, :brand)";
		$bound = array("description" => $description, 'brand' => $brand);
		return self::perform($sql, $bound); }

	public function index_ingredients($description, $brand, $classification) {
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
		} else {
			return $db->fetchAll('SELECT * FROM ingredient');
		}}

	public function retrieve_ingredient($ingredient_id) {
		$sql = "SELECT * FROM ingredient WHERE ingredient_id = :ingredient_id LIMIT 1";
		$bound = (array('ingredient_id' => $ingredient_id)); 
		return self::perform($sql, $bound); }

	public function retrieve_ingredients_by_cocktail($cocktail_id) {
		$sql = "SELECT ing.ingredient_id, ing.description, ing.brand, con.volume FROM ingredient ing JOIN contains con ON ing.ingredient_id = con.ingredient_id AND con.cocktail_id = :cocktail_id";
		$bound = array('cocktail_id' => $cocktail_id);
		return self::perform($sql, $bound); } 

	public function retrieve_ingredient_brands_asc() {
		$sql = "SELECT ingredient_id, brand FROM ingredient ORDER BY brand ASC";
		return self::perform_free($sql); }


	/************ OWNS OPERATIONS ************/


	public function retrieve_owns($user_id, $ingredient_id) {
		$sql = "SELECT volume FROM owns 
			WHERE user_id = :user_id
			AND ingredient_id = :ingredient_id LIMIT 1";
		$bound = array('user_id' => $user_id, 'ingredient_id' => $ingredient_id); 
		return self::perform($sql, $bound); }

	public function update_owns($user_id, $ingredient_id, $volume) {
		$sql = "UPDATE owns SET volume = :volume 
			WHERE user_id = :user_id
			AND ingredient_id = :ingredient_id";
		$bound = array('volume' => $volume, 'user_id' => $user_id, 'ingredient_id' => $ingredient_id); 
		return self::perform($sql, $bound); }


	/************ PRICE OPERATIONS ************/


	public function retrieve_prices($ingredient_id) {
		$sql = "SELECT volume, price FROM price WHERE ingredient_id = :ingredient_id";
		$bound = array('ingredient_id' => $ingredient_id);
		return self::perform($sql, $bound); }


	/************ PROOF OPERATIONS ************/


	public function retrieve_proof($ingredient_id) {
		$sql = "SELECT proof FROM proof WHERE ingredient_id = :ingredient_id";
		$bound = array('ingredient_id' => $ingredient_id);
		return self::perform($sql, $bound); }


	/************ TAG OPERATIONS ************/


	public function retrieve_tag_names_asc() {
		$sql = "SELECT * FROM tag ORDER BY name ASC";
		return self::perform_free($sql); }

}