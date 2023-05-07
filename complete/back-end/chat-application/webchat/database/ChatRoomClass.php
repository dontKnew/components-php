<?php

class ChatRooms
{
	private $chat_id;
	private $user_id;
	private $message;
	private $timestamp;
	protected $connect;

	public function setChatId($chat_id)
	{
		$this->chat_id = $chat_id;
	}

	function getChatId()
	{
		return $this->chat_id;
	}

	function setUser_Id($user_id)
	{
		$this->user_id = $user_id;
	}

	function getUser_Id()
	{
		return $this->user_id;
	}

	function setMessage($message)
	{
		$this->message = $message;
	}

	function getMessage()
	{
		return $this->message;
	}

	function getTimestamp()
	{
		return $this->timestamp;
	}

	public function __construct()
	{
		require_once("config.php");
		$database_object = new Database_connection;
		$this->connect = $database_object->connect();
	}

	function save_chat()
	{
		$query = "
		INSERT INTO chatrooms 
			(user_id, msg) 
			VALUES (:user_id, :msg)
		";
		$statement = $this->connect->prepare($query);
		$statement->bindParam(':user_id', $this->user_id);
		$statement->bindParam(':msg', $this->message);
		try {
			if ($statement->execute()) {
				return "true";
			} else {
				return "Unable to saved data";
			}
		} catch (Exception $e) {
			return "Error " . $e;
		}
	}

	function get_all_chat_data()
	{
		$query = "
		SELECT * FROM chatrooms 
			INNER JOIN users 
			ON users.user_id = chatrooms.user_id 
			ORDER BY chatrooms.chat_id ASC
		";
		$statement = $this->connect->prepare($query);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
}
