<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_mail_logs_model extends MY_Model {
	public $tb_users;
	public $tb_user_logs;
	public $tb_user_mail_logs;

	public function __construct(){
		$this->tb_users 		     = USERS;
		$this->tb_user_logs          = USER_LOGS;
		$this->tb_user_mail_logs     = USER_MAIL_LOGS;
		parent::__construct();
	}

	function get_user_mail_logs_list($total_rows = false, $status = "", $limit = "", $start = ""){
		$data  = array();
		if ($limit != "" && $start >= 0) {
			$this->db->limit($limit, $start);
		}
		$this->db->select('uml.*, receive_u.email as received_email, receive_u.ids as received_user_ids, u.role as account_type, u.email as sent_by_user_email');
		$this->db->from($this->tb_user_mail_logs." uml");
		$this->db->join($this->tb_users." u", "u.id = uml.uid", 'left');
		$this->db->join($this->tb_users." receive_u", "receive_u.id = uml.received_uid", 'left');
		
		$this->db->order_by("uml.id", 'DESC');
		$query = $this->db->get();
		if ($total_rows) {
			$result = $query->num_rows();
			return $result;
		}else{
			$result = $query->result();
			return $result;
		}
		return false;
	}

	function get_user_mail_logs_by_search($k){
		$k = trim(htmlspecialchars($k));
		$this->db->select('uml.*, receive_u.email as received_email, receive_u.ids as received_user_ids, u.role as account_type, u.email as sent_by_user_email');
		$this->db->from($this->tb_user_mail_logs." uml");
		$this->db->join($this->tb_users." u", "u.id = uml.uid", 'left');
		$this->db->join($this->tb_users." receive_u", "receive_u.id = uml.received_uid", 'left');

		if ($k != "" && strlen($k) >= 2) {
			$this->db->where("(`uml`.`subject` LIKE '%".$k."%' ESCAPE '!' OR `uml`.`content` LIKE '%".$k."%' ESCAPE '!' OR `receive_u`.`email` LIKE '%".$k."%' ESCAPE '!' OR `u`.`email` LIKE '%".$k."%' ESCAPE '!' )");
		}
		$this->db->order_by('uml.id', 'DESC');

		$query = $this->db->get();
		$result = $query->result();
		return $result;

		return $result;
	}
}
