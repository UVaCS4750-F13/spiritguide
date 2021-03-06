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


    public function index_cocktails($availability, $name, $tag, $user_id) {
		if (strcmp($availability, 'all') == 0) {
			if(is_null($name)) {
				if(is_null($tag)) {
					$sql = "SELECT * FROM cocktail";
					return self::perform_free($sql); }
				else {
					$sql = "SELECT * FROM cocktail WHERE cocktail_id IN 
						(SELECT cocktail_id FROM labels WHERE tag_id = :tag)";
					$bound = array(':tag' => $tag);
					return self::perform($sql, $bound); }
			} else {
				if (is_null($tag)) {
					$sql = "SELECT * FROM cocktail
						WHERE name LIKE CONCAT('%',:name,'%')";
					$bound = array('name' => $name);
					return self::perform($sql, $bound); }
				else {
					$sql = "SELECT * FROM cocktail 
								WHERE name LIKE CONCAT('%',:name,'%') 
								AND cocktail_id IN 
									(SELECT cocktail_id FROM labels
									WHERE tag_id = :tag)";
					$bound = array(':name' => $name, 'tag' => $tag);
					return self::perform($sql, $bound); }
			}
		} elseif (strcmp($availability, 'power') == 0) {
			if(is_null($name)) {
				if(is_null($tag)) {
					$sql = "SELECT * FROM cocktail WHERE cocktail_id NOT IN
										(select distinct cocktail_id 
											from (select * from owns where user_id = :user_id) as o 
											right join contains as c on c.ingredient_id = o.ingredient_id
											where o.volume is null or o.volume < c.volume)";
					$bound = array('user_id' => $user_id);
					return self::perform($sql, $bound); }
				else {
					$sql = "SELECT * FROM cocktail WHERE cocktail_id IN 
						(SELECT cocktail_id FROM labels WHERE tag_id = :tag) AND cocktail_id NOT IN
										(select distinct cocktail_id 
											from (select * from owns where user_id = :user_id) as o 
											right join contains as c on c.ingredient_id = o.ingredient_id
											where o.volume is null or o.volume < c.volume)";
					$bound = array(':tag' => $tag, 'user_id' => $user_id);
					return self::perform($sql, $bound); }
			} else {
				if (is_null($tag)) {
					$sql = "SELECT * FROM cocktail
						WHERE name LIKE CONCAT('%',:name,'%') AND cocktail_id NOT IN
										(select distinct cocktail_id 
											from (select * from owns where user_id = :user_id) as o 
											right join contains as c on c.ingredient_id = o.ingredient_id
											where o.volume is null or o.volume < c.volume)";
					$bound = array('name' => $name, 'user_id' => $user_id);
					return self::perform($sql, $bound); }
				else {
					$sql = "SELECT * FROM cocktail 
								WHERE name LIKE CONCAT('%',:name,'%') 
								AND cocktail_id IN 
									(SELECT cocktail_id FROM labels
									WHERE tag_id = :tag) AND cocktail_id NOT IN
										(select distinct cocktail_id 
											from (select * from owns where user_id = :user_id) as o 
											right join contains as c on c.ingredient_id = o.ingredient_id
											where o.volume is null or o.volume < c.volume)";
					$bound = array(':name' => $name, 'tag' => $tag, 'user_id' => $user_id);
					return self::perform($sql, $bound); }
			}
		} else {
			$sql = "SELECT * FROM cocktail";
			return self::perform_free($sql); 
		}
	}
		 

	public function create_cocktail($name, $recipe, $creator_id) {
		$sql = "INSERT INTO cocktail (name, recipe, creator_id) VALUES (:name, :recipe, :creator_id)";
		$bound = array('name' => $name, 'recipe' => $recipe, 'creator_id' => $creator_id);
		return self::perform($sql, $bound); }

	public function retrieve_cocktail_by_name($name) {
		$sql = "SELECT * FROM cocktail WHERE name = :name LIMIT 1";
		$bound = array('name' => $name);
		return self::perform($sql, $bound); }

	public function retrieve_cocktail_like_name($name) {
		$sql = "SELECT * FROM cocktail WHERE name LIKE CONCAT('%',:name,'%')";
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

	public function delete_cocktail($cocktail_id) {
		$sql = "DELETE FROM cocktail WHERE cocktail_id = :cocktail_id";
		$bound = array('cocktail_id' => $cocktail_id);
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


	/************ FAVORITES OPERATIONS ************/

	public function create_favorites($user_id, $cocktail_id) {
		$sql = "INSERT INTO favorites (user_id, cocktail_id) VALUES (:user_id, :cocktail_id)";
		$bound = array('user_id' => $user_id, 'cocktail_id' => $cocktail_id);
	return self::perform($sql, $bound); }

	public function delete_favorite($user_id, $cocktail_id) {
		$sql = "DELETE FROM favorites WHERE user_id = :user_id AND cocktail_id = :cocktail_id";
		$bound = array('user_id' => $user_id, 'cocktail_id' => $cocktail_id);
	return self::perform($sql, $bound); }

	public function retrieve_favorite($user_id, $cocktail_id) {
		$sql = "SELECT * FROM favorites WHERE user_id = :user_id AND cocktail_id = :cocktail_id";
		$bound = array('user_id' => $user_id, 'cocktail_id' => $cocktail_id);
	return self::perform($sql, $bound); }

	public function retrieve_user_favorites($user_id) {
		$sql = "SELECT * FROM favorites JOIN cocktail ON favorites.cocktail_id = cocktail.cocktail_id WHERE favorites.user_id = :user_id";
		$bound = array('user_id' => $user_id);
	return self::perform($sql, $bound); }


	/************ INGREDIENT OPERATIONS  ************/


	public function create_ingredient($description, $brand) {
		$sql = "INSERT INTO ingredient (description, brand) VALUES (:description, :brand)";
		$bound = array("description" => $description, 'brand' => $brand);
		return self::perform($sql, $bound); }

	public function index_ingredients() {
			$sql = "SELECT * FROM ingredient";
			return self::perform_free($sql); }

	public function index_alcohols() {
		$sql = "SELECT * FROM alcohol";
		return self::perform_free($sql); }

	public function index_mixers() {
		$sql = "SELECT * FROM mixer";
		return self::perform_free($sql); }

	public function retrieve_ingredient($ingredient_id) {
		$sql = "SELECT * FROM ingredient WHERE ingredient_id = :ingredient_id LIMIT 1";
		$bound = (array('ingredient_id' => $ingredient_id)); 
		return self::perform($sql, $bound); }

	public function retrieve_ingredient_id($description, $brand) {
		$sql = "SELECT * FROM ingredient WHERE description = :description AND brand = :brand LIMIT 1";
		$bound = array("description" => $description, 'brand' => $brand);
	return self::perform($sql, $bound); }

	public function retrieve_like_ingredient($string) {
		$sql = "SELECT * FROM ingredient WHERE brand LIKE CONCAT('%',:string,'%') OR description LIKE CONCAT('%',:string,'%')";
		$bound = array('string' => $string);
		return self::perform($sql, $bound); }

	public function retrieve_ingredients_by_cocktail($cocktail_id) {
		$sql = "SELECT ing.ingredient_id, ing.description, ing.brand, con.volume FROM ingredient ing JOIN contains con ON ing.ingredient_id = con.ingredient_id AND con.cocktail_id = :cocktail_id";
		$bound = array('cocktail_id' => $cocktail_id);
		return self::perform($sql, $bound); } 

	public function retrieve_ingredient_brands_asc() {
		$sql = "SELECT ingredient_id, brand FROM ingredient ORDER BY brand ASC";
		return self::perform_free($sql); }


	/************ LABELS OPERATIONS ************/

	public function create_labels($tag_id, $cocktail_id) {
		$sql = "INSERT INTO labels (tag_id, cocktail_id) VALUES (:tag_id, :cocktail_id)";
		$bound = array('tag_id' => $tag_id, 'cocktail_id' => $cocktail_id);
	return self::perform($sql, $bound); }

	public function delete_labels($tag_id, $cocktail_id) {
		$sql = "DELETE FROM labels WHERE tag_id = :tag_id AND cocktail_id = :cocktail_id";
		$bound = array('tag_id' => $tag_id, 'cocktail_id' => $cocktail_id);
	return self::perform($sql, $bound); }

	/************ OWNS OPERATIONS ************/

	public function create_owns($user_id, $ingredient_id, $volume) {
		$sql = "INSERT INTO owns VALUES (:user_id, :ingredient_id, :volume)";
		$bound = array('volume' => $volume, 'user_id' => $user_id, 'ingredient_id' => $ingredient_id); 
	return self::perform($sql, $bound); }

	public function retrieve_owns($user_id, $ingredient_id) {
		$sql = "SELECT volume FROM owns 
			WHERE user_id = :user_id
			AND ingredient_id = :ingredient_id LIMIT 1";
		$bound = array('user_id' => $user_id, 'ingredient_id' => $ingredient_id); 
		return self::perform($sql, $bound); }

	public function retrieve_inventory($user_id) {
		$sql = "SELECT ingredient.ingredient_id, brand, description, volume FROM owns 
			JOIN ingredient ON ingredient.ingredient_id = owns.ingredient_id
			WHERE user_id = :user_id";
		$bound = array('user_id' => $user_id); 
		return self::perform($sql, $bound); }

	public function update_owns($user_id, $ingredient_id, $volume) {
		$sql = "UPDATE owns SET volume = :volume 
			WHERE user_id = :user_id
			AND ingredient_id = :ingredient_id";
		$bound = array('volume' => $volume, 'user_id' => $user_id, 'ingredient_id' => $ingredient_id); 
		return self::perform($sql, $bound); }

		public function delete_owns($user_id, $ingredient_id) {
		$sql = "DELETE FROM owns WHERE user_id = :user_id AND ingredient_id = :ingredient_id";
		$bound = array('user_id' => $user_id, 'ingredient_id' => $ingredient_id); 
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


	public function retrieve_tags_by_cocktail($cocktail_id) {
		$sql = "SELECT tag.tag_id, tag.name FROM tag JOIN labels ON tag.tag_id = labels.tag_id WHERE labels.cocktail_id = :cocktail_id";
		$bound = array('cocktail_id' => $cocktail_id);
		return self::perform($sql, $bound); } 


	/************ SPECIAL OPERATIONS ************/


	public function export() {
		$sql = "SHOW TABLES";
		$tables = array();
		foreach (self::perform_free($sql) as $table_outer) {
			foreach ($table_outer as $table_inner) {
				foreach($table_inner as $table) {
					array_push($tables, $table);
				}
			}
		}

		$output = "";
		foreach ($tables as $table) {
			$output = $output.$table."\r\n";
			$sql = "SHOW COLUMNS FROM ".$table;
			foreach(self::perform_free($sql) as $column) {
				$end = end($column);
				$i = 1;
				foreach ($column as $c) {
					foreach ($c as $header) {
						if ($i % 5  == 1) {
							$i++;
							$output = $output.$header;
							if ($header != $end) {
								$output = $output.",";
							}
						}
					}
				}
			}
			$output = $output.$table."\r\n";

			$sql = "SELECT * FROM ".$table;
			foreach (self::perform($sql, array('table' => $table)) as $result) {
				$end = end($result[$table]);
				foreach ($result[$table] as $atr) {
					$output = $output.$atr;
					if ($atr != $end) {
						$output = $output.",";
					}
				} $output = $output."\r\n";
			} $output = $output."\r\n";
		}

		return $output;
	}

}