<?php

class QueryBot {

	public function login_query($username, $password) {
		return "SELECT user_id FROM user WHERE username = '".$username."' AND password = '".$password."' LIMIT 1";
	}
	
}

?>