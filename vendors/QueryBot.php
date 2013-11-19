<?php

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

	public function ingredient_brands_asc() {
		return "SELECT ingredient_id, brand FROM ingredient ORDER BY brand ASC";
	}

	public function cocktail_id_by_name($name) {
		return "SELECT cocktail_id FROM cocktail WHERE name='".$name."' LIMIT 1";
	}

	public function insert_cocktail($name, $recipe) {
		return "INSERT INTO cocktail (name, recipe) VALUES ('".$name."', '".$recipe."')";
	}

	public function insert_contains($cocktail_id, $ingredient_id, $volume) {
		return "INSERT INTO contains (cocktail_id, ingredient_id, volume) VALUES ('".$cocktail_id."', '".$ingredient_id."', '".$volume."')";
	}

}

?>