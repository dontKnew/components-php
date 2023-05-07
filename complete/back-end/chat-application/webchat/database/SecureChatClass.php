<?php

class SecureChat
{
	private $secure_chat_id;
	private $to_user_id;
	private $from_user_id;
	private $chat_message;
	private $timestamp;

	protected $connect;

	public function __construct()
	{
		require_once('config.php');

		$db = new Database_connection();

		$this->connect = $db->connect();
	}

	function setSecureChatId($secure_chat_id)
	{
		$this->secure_chat_id = $secure_chat_id;
	}

	function getSecureChatId()
	{
		return $this->secure_chat_id;
	}

	function setToUserId($to_user_id)
	{
		$this->to_user_id = $to_user_id;
	}

	function getToUserId()
	{
		return $this->to_user_id;
	}

	function setFromUserId($from_user_id)
	{
		$this->from_user_id = $from_user_id;
	}

	function getFromUserId()
	{
		return $this->from_user_id;
	}

	function setChatMessage($chat_message)
	{
		$this->chat_message = $chat_message;
	}

	function getChatMessage()
	{
		return $this->chat_message;
	}

	function getTimestamp()
	{
		return $this->timestamp;
	}

	function get_all_chat_data1()
	{
		$query = "
		SELECT a.user_name as from_user_name, a.user_profile as from_user_profile, b.user_profile as to_user_profile, b.user_name as to_user_name, chat_msg, timestamp, to_user_id, from_user_id  
			FROM securechat 
		INNER JOIN users a 
			ON securechat.from_user_id = a.user_id 
		INNER JOIN users b 
			ON securechat.to_user_id = b.user_id 
		WHERE (securechat.from_user_id = :from_user_id AND securechat.to_user_id = :to_user_id) 
		OR (securechat.from_user_id = :to_user_id AND securechat.to_user_id = :from_user_id)
		";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':from_user_id', $this->from_user_id);

		$statement->bindParam(':to_user_id', $this->to_user_id);

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	function get_all_chat_data()
	{
		$query = "
		SELECT * FROM securechat 
		   INNER JOIN users ON securechat.to_user_id = users.user_id
		         WHERE to_user_id = :to_user_id AND from_user_id = :from_user_id";

		$statement = $this->connect->prepare($query);
		$statement->bindParam(':from_user_id', $this->from_user_id);
		$statement->bindParam(':to_user_id', $this->to_user_id);
		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	function save_chat() 
	{
		$query = "
		INSERT INTO secureChat 
			(to_user_id, from_user_id, chat_msg) 
			VALUES (:to_user_id, :from_user_id, :chat_msg)
		";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':to_user_id', $this->to_user_id);

		$statement->bindParam(':from_user_id', $this->from_user_id);

		$statement->bindParam(':chat_msg', $this->chat_message);

		$statement->execute();

		return $this->connect->lastInsertId();
	}

	

	function change_chat_status(){
		$query = "
		UPDATE chat_message 
			SET status = 'Yes' 
			WHERE from_user_id = :from_user_id 
			AND to_user_id = :to_user_id 
			AND status = 'No'
		";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':from_user_id', $this->from_user_id);

		$statement->bindParam(':to_user_id', $this->to_user_id);

		$statement->execute();
	}

}



?>