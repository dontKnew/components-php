<?php
if(!session_start()){
	session_start();
}
class User
{
	private $user_id;
	private $user_name;
	private $user_email;
	private $user_password;
	private $user_profile;
	private $user_status;
	private $user_timestamp;
	private $user_verification_code;
	private $user_activation;
	private $last_login;
	public $connect;

	public function __construct()
	{
		require_once('config.php');

		$database_object = new Database_connection;

		$this->connect = $database_object->connect();
	}

	function setUserId($user_id)
	{
		$this->user_id = $user_id;
	}

	function getLastLogin()
	{
		return $this->last_login;
	}

	function setLastLogin($last_login)
	{
		$this->last_login = $last_login;
	}

	function getUserId()
	{
		return $this->user_id;
	}

	

	function setUserName($user_name)
	{
		$this->user_name = $user_name;
	}

	function getUserName()
	{
		return $this->user_name;
	}

	function setUserStatus($user_status)
	{
		$this->user_status = $user_status;
	}

	function getUserStatus()
	{
		$this->user_status;
	}

	function setUserEmail($user_email)
	{
		$this->user_email = $user_email;
	}

	function getUserEmail()
	{
		return $this->user_email;
	}

	function setUserPassword($user_password)
	{
		$this->user_password = $user_password;
	}

	function getUserPassword()
	{
		return $this->user_password;
	}

	function setUserProfile($user_profile)
	{
		$this->user_profile = $user_profile;
	}

	function getUserProfile()
	{
		return $this->user_profile;
	}

	function getUserCreatedOn()
	{
		return $this->user_timestamp;
	}

	function setUserVerificationCode($user_verification_code)
	{
		$this->user_verification_code = $user_verification_code;
	}

	function getUserVerificationCode()
	{
		return $this->user_verification_code;
	}

	function setUserActivation($user_activation)
	{
		$this->user_activation = $user_activation;
	}

	function getUserActivation()
	{
		return $this->user_activation;
	}
	function getUserLastLoginTime()
	{
		return $this->last_login;
	}

	function make_avatar($character)
	{
	    $path = __DIR__."../assets/image/".$character.time() . ".png";
		$image = imagecreate(200, 200);
		$red = rand(0, 255);
		$green = rand(0, 255);
		$blue = rand(0, 255);
	    imagecolorallocate($image, $red, $green, $blue);  
	    $textcolor = imagecolorallocate($image, 255,255,255);

	    $font = __DIR__.'../assets/font/arial.TTF';
	    imagettftext($image, 100, 0, 55, 150, $textcolor, $font, $character);
	    imagepng($image, $path);
	    imagedestroy($image);
	    return $path;
	}

	function get_user_data_by_email()
	{
		$query = "
		SELECT * FROM users 
		WHERE user_email = :user_email
		";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':user_email', $this->user_email);

		if($statement->execute())
		{
			$user_data = $statement->fetch(PDO::FETCH_ASSOC);
		}
		return $user_data;
	}

	function save_data()
	{
		$query = "
		INSERT INTO users (
			user_name, user_email, user_password, user_profile,  user_verification_code
			) 
		VALUES (
			:user_name, :user_email, :user_password, :user_profile, :user_verification_code
			)
		";
		$statement = $this->connect->prepare($query);

		$statement->bindParam(':user_name', $this->user_name);

		$statement->bindParam(':user_email', $this->user_email);

		$statement->bindParam(':user_password', $this->user_password);

		$statement->bindParam(':user_profile', $this->user_profile);

		$statement->bindParam(':user_verification_code', $this->user_verification_code);

		if($statement->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function is_valid_email_verification_code()
	{
		$query = "
		SELECT * FROM users 
		WHERE user_verification_code = :user_verification_code
		";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':user_verification_code', $this->user_verification_code);

		$statement->execute();

		if($statement->rowCount() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function enable_user_account()
	{
		$query = "
		UPDATE users 
		SET user_activation = :user_status 
		WHERE user_verification_code = :user_verification_code
		";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':user_status', $this->user_activation);

		$statement->bindParam(':user_verification_code', $this->user_verification_code);

		if($statement->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function get_user_data_by_id()
	{
		$query = "
		SELECT * FROM users 
		WHERE user_id = :user_id";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':user_id', $this->user_id);

		try
		{
			if($statement->execute())
			{
				$user_data = $statement->fetch(PDO::FETCH_ASSOC);
			}
			else
			{
				$user_data = array();
			}
		}
		catch (Exception $error)
		{
			echo $error->getMessage();
		}
		return $user_data;
	}

	function get_user_data_by_id_limit()
	{
		$query = "
		SELECT * FROM users 
		WHERE user_id = :user_id LIMIT 3";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':user_id', $this->user_id);

		try
		{
			if($statement->execute())
			{
				$user_data = $statement->fetch(PDO::FETCH_ASSOC);
			}
			else
			{
				$user_data = array();
			}
		}
		catch (Exception $error)
		{
			echo $error->getMessage();
		}
		return $user_data;
	}

	function move_image($user_profile)
	{
		try {
			$extension = explode('.', $user_profile['name']);
			$new_name = $this->getUserName() . rand() . '.' . $extension[1];
			$destination = '../assets/image/users/' . $new_name;
			move_uploaded_file($user_profile['tmp_name'], $destination);
			return $destination;
		}catch(Exception $e){
			return $e;
		}
	}

	function update_data()
	{
		$query = "
		UPDATE users 
		SET user_name = :user_name, 
		user_email = :user_email, 
		user_password = :user_password, 
		user_profile = :user_profile,
		user_verification_code = :user_verification_code    
		WHERE user_id = :user_id
		";

		$statement = $this->connect->prepare($query);
		$statement->bindParam(':user_name', $this->user_name);
		$statement->bindParam(':user_email', $this->user_email);
		$statement->bindParam(':user_password', $this->user_password);
		$statement->bindParam(':user_profile', $this->user_profile);
		$statement->bindParam(':user_verification_code', $this->user_verification_code);
		$statement->bindParam(':user_id', $this->user_id);

		if($statement->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function get_user_all_data()
	{
		$query = "
		SELECT * FROM users";

		$statement = $this->connect->prepare($query);
		$statement->execute();
		$data = $statement->fetchAll(PDO::FETCH_ASSOC);

		return $data;
	}
	function update_user_status(){
		$query = "
		UPDATE users 
			SET user_status = :user_status  
			WHERE user_id = :user_id
		";
		$statement = $this->connect->prepare($query);
		$statement->bindParam(':user_status', $this->user_status);
		$statement->bindParam(':user_id', $this->user_id);
		if($statement->execute()){
			return true;
		}else {
			return false;
		}
	}

	// function update_user_time(){
	// 	$query = "
	// 	UPDATE users 
	// 		SET last_login = :last_login  
	// 		WHERE user_id = :user_id
	// 	";
	// 	$statement = $this->connect->prepare($query);
	// 	$statement->bindParam(':last_login', $this->last_login);
	// 	$statement->bindParam(':user_id', $this->user_id);
	// 	if($statement->execute()){
	// 		return true;
	// 	}else {
	// 		return false;
	// 	}
	// }

	
	// function user_status(){
	// 	$query = "
	// 	SELECT user_status 
	// 		FROM users";
	// 	$statement = $this->connect->prepare($query);
	// 	$statement->bindParam(':user_status', $this->user_status);
	// 	$statement->bindParam(':user_id', $this->user_id);
	// 	if($statement->execute()){
	// 		return true;
	// 	}else {
	// 		return false;
	// 	}
	// }
	
}
?>

