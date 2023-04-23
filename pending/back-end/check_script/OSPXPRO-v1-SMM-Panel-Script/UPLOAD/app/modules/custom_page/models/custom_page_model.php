<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class custom_page_model extends MY_Model {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_orders;
	public $tb_tickets;
	public $tb_ticket_message;

	public function __construct(){
		parent::__construct();

	}

}
