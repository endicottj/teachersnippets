<?php
require_once("config.php");
class Dao
{
	/**
	 * Creates and returns a PDO connection using the database connection
	 * url specified in the CLEARDB_DATABASE_URL environment variable.
	 */
	private function getConnection()
	{
		//$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

		$host = "us-cdbr-iron-east-05.cleardb.net";
		$db   = "heroku_fc4bc88759cfb52";
		$user = "bb752530790438";
		$pass = "c0b2b74a";

		try {
			$conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (Exception $e) {
			echo "could not connect";
			exit;
		}

		// Turn on exceptions for debugging. Comment this out for
		// production or make sure to use try-catch statements.

		return $conn; 
	}
	/**
	 * Returns the database connection status string.
	 */
	public function getConnectionStatus()
	{
		$conn = $this->getConnection();
		return $conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
	}

	/**
	* 
	*/
	public function userExists($email)
	{
		$conn = $this->getConnection();

		// prepare() compiles query.  We will pass parameters to query, not plain text.  This prevents SQL injection.
		$stmt = $conn->prepare("SELECT * FROM user WHERE email = :email");	// : tells that you are using a placeholder

		$stmt->bindParam(':email', $email);	// tells what to use in place of parameter

		$stmt->execute();	// now that parameters are bound, and the query is compiled, execute query

		if($stmt->fetch()) {
		return true;
		} else {
		return false;
		}
	}

	// Adds user to database
	public function addUser($email, $password, $name)
	{
	    
		$conn = $this->getConnection();
		$query = "INSERT INTO user (email, password, name) 
					VALUES (:email, :password, :name)";
		$stmt = $conn->prepare($query);

		// bind parameters
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':name', $name);

		// Execute query.  Try and catch things like duplicate user attempts.
		try {
			$stmt->execute();
			return true;
		} catch(PDOException $e) {
			//log message $e->getMessage();
			//print message echo($e->getMessage());
			return false;
		}
	}

	// Validates user.  True if valid user, false otherwise.
	public function validateUser($email, $password)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT user_id, password, name FROM user
								WHERE email = :email");

		$stmt->bindParam(':email', $email);
		$stmt->execute();

		if($user = $stmt->fetch()) {
			$digest = password_hash($user['password'], PASSWORD_DEFAULT);
			if(password_verify($password, $digest)) {
				// building new array so we don't have to send password
				return array('name' => $user['name'], 'id' => $user['user_id']);
			}
		}
		return false;
	}
}

?>
