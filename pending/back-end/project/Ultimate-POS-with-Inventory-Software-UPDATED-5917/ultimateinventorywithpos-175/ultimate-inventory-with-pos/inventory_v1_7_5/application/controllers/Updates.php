<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updates extends CI_Controller {
	//public $source_version = app_version();
	public function __construct(){
			parent::__construct();
			/*if($this->get_current_version_of_app_db()=='1.6.3'){
				if($this->update_db()=='success'){
					redirect('dashboard','refresh');exit();
				}
			}
			$this->load_global();*/
			
			set_time_limit(0);
		}
	public function get_current_version_of_app_db(){
          return $this->db->select('version')->from('db_sitesettings')->get()->row()->version;
        }

	/*public function index()
	{
		$this->permission_check('users_add');
		$data=$this->data;//My_Controller constructor data accessed here
		$data['page_title']=$this->lang->line('database_updater');
		$data['current_version']=$this->get_current_version_of_app_db();
		$data['latest_version']=$this->source_version;
		$this->load->view('database_updater', $data);
	}*/
	public function fun_temp_update_suppliers_purchase_due(){
		$this->load->model('purchase_model');
		if(!$this->purchase_model->update_purchase_payment_status()){
			return false;
		}
		return true;
	}

	public function fun_temp_update_customers_sales_due(){
		$this->load->model('sales_model');
		if(!$this->sales_model->update_sales_payment_status()){
			return false;
		}
		return true;
	}

	public function update_db(){
		if($this->get_current_version_of_app_db()==app_version()){
			//echo "Database Already Updated!";
			redirect(base_url('login'),'refresh');
			exit();
		}

		//Update database
		$this->db->trans_begin();
		$current_db_name=$this->db->database;

		if($this->get_current_version_of_app_db()=='1.0' || $this->get_current_version_of_app_db()=='1.1'){
			//Provide 1.2 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.2' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("INSERT INTO `db_languages` (`language`, `status`) VALUES ('Spanish', '1')");if(!$q1){ echo "failed"; exit();}
		}

		if($this->get_current_version_of_app_db()=='1.2'){
			//Provide 1.3 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.3' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_roles` ADD COLUMN `description` TEXT NULL AFTER `role_name`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("UPDATE `db_roles` SET `description` = 'All Rights Permitted.' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("CREATE TABLE `db_permissions` (`id` int(5) NOT NULL AUTO_INCREMENT,`role_id` int(5) DEFAULT NULL,`permissions` varchar(50) DEFAULT NULL,PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=latin1");if(!$q1){ echo "failed"; exit();}

		}
		if($this->get_current_version_of_app_db()=='1.3'){
			//Provide 1.3.1 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.3.1' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
		}
		if($this->get_current_version_of_app_db()=='1.3.1'){
			//Provide 1.3.2 updates 
			$q1 = $this->db->query("ALTER DATABASE ".$current_db_name." CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_category  CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_company CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_country CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_customers CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_expense_category CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_items CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_paymenttypes CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_permissions CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_purchase CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_purchaseitems CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_purchasepayments CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_roles CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_salespayments CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_sitesettings CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_states CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_stockentry CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_suppliers CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_tax CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_timezone CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_units CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_users CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_warehouse CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE temp_holdinvoice CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.3.2' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("INSERT INTO `db_languages` (`language`, `status`) VALUES ('Arabic', '1')");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("INSERT INTO `db_currency` (`currency_name`, `currency`, `status`) VALUES ('Saudi Riyal', '﷼. ', '1')");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("INSERT INTO `db_currency` (`currency_name`, `currency`, `status`) VALUES ('Dubai-United Arab Emirates dirham', 'د.إ', '1')");if(!$q1){ echo "failed"; exit();}
		}

		if($this->get_current_version_of_app_db()=='1.3.2'){
			//Provide 1.3.3 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.3.3' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("INSERT INTO `db_languages` (`language`, `status`) VALUES ('Albanian', '1')");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("INSERT INTO `db_languages` (`language`, `status`) VALUES ('Dutch', '1')");if(!$q1){ echo "failed"; exit();}
		}
		if($this->get_current_version_of_app_db()=='1.3.3'){
			//Provide 1.3.3 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.3.4' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
		}
		if($this->get_current_version_of_app_db()=='1.3.4'){
			//Provide 1.3.3 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.3.5' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
		}
		if($this->get_current_version_of_app_db()=='1.3.5'){
			//Provide 1.3.3 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.3.6' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
		}
		if($this->get_current_version_of_app_db()=='1.3.6'){
			//Provide 1.3.3 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.3.7' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
		}
		if($this->get_current_version_of_app_db()=='1.3.7'){
			//Provide 1.3.8 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.3.8' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_salespayments` ADD COLUMN `change_return` DOUBLE(10,2) NULL COMMENT 'Refunding the greater amount' AFTER `payment_note`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_sitesettings` ADD COLUMN `change_return` INT(1) NULL COMMENT 'show in pos' AFTER `purchase_code`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `change_return` = '0' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("CREATE TABLE `db_brands` ( `id` INT(5) NOT NULL AUTO_INCREMENT, `brand_code` VARCHAR(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `brand_name` VARCHAR(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `description` MEDIUMTEXT COLLATE utf8mb4_unicode_ci, `company_id` INT(5) DEFAULT NULL, `status` INT(1) DEFAULT NULL, PRIMARY KEY (`id`) ) ENGINE=INNODB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_items` ADD COLUMN `brand_id` INT(5) NULL AFTER `alert_qty`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_items` ADD COLUMN `lot_number` VARCHAR(50) NULL AFTER `alert_qty`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_items` ADD COLUMN `expire_date` DATE NULL AFTER `lot_number`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_currency` ADD COLUMN `currency_code` VARCHAR(20) NULL AFTER `currency_name`");if(!$q1){ echo "failed"; exit();}
		}

		if($this->get_current_version_of_app_db()=='1.3.8'){
			//Provide 1.3.9 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.3.9' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
		}
		if($this->get_current_version_of_app_db()=='1.3.9'){
			//Provide 1.3.9.1 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.3.9.1' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("INSERT INTO `db_languages` (`language`, `status`) VALUES ('Bangla', '1');");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("INSERT INTO `db_languages` (`language`, `status`) VALUES ('Urdu', '1');");if(!$q1){ echo "failed"; exit();}

		}
		if($this->get_current_version_of_app_db()=='1.3.9.1'){
			//Provide 1.4 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.4' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("CREATE TABLE `db_smsapi`( `id` INT(5) NOT NULL AUTO_INCREMENT, `info` VARCHAR(150), `key` VARCHAR(600), `key_value` VARCHAR(600), `delete_bit` INT(5), PRIMARY KEY (`id`) )");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("CREATE TABLE `db_smstemplates`( `id` INT(5) NOT NULL AUTO_INCREMENT, `template_name` VARCHAR(100), `content` TEXT, `variables` TEXT, `company_id` INT(5), `status` INT(5), `undelete_bit` INT(5), PRIMARY KEY (`id`) )");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_company` ADD COLUMN `sms_status` INT(1) NULL COMMENT '1=Enable 0=Disable' AFTER `status`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("UPDATE `db_company` SET `sms_status` = '0' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("INSERT into `db_smsapi` (`info`, `key`, `key_value`, `delete_bit`) values('url','weblink','http://www.example.com',NULL)");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("INSERT into `db_smsapi` (`info`, `key`, `key_value`, `delete_bit`) values('mobile','mobiles','',NULL)");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("INSERT into `db_smsapi` (`info`, `key`, `key_value`, `delete_bit`) values('message','message','',NULL)");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("INSERT into `db_smstemplates` (`id`, `template_name`, `content`, `variables`, `company_id`, `status`, `undelete_bit`) values('1','GREETING TO CUSTOMER ON SALES','Hi {{customer_name}},\r\nYour sales Id is {{sales_id}},\r\nSales Date {{sales_date}},\r\nTotal amount  {{sales_amount}},\r\nYou have paid  {{paid_amt}},\r\nand due amount is  {{due_amt}}\r\nThank you Visit Again','{{customer_name}}<br>                          \r\n{{sales_id}}<br>\r\n{{sales_date}}<br>\r\n{{sales_amount}}<br>\r\n{{paid_amt}}<br>\r\n{{due_amt}}<br>\r\n{{company_name}}<br>\r\n{{company_mobile}}<br>\r\n{{company_address}}<br>\r\n{{company_website}}<br>\r\n{{company_email}}<br>',NULL,'1','1')");if(!$q1){ echo "failed"; exit();}

			$q1 = $this->db->query("ALTER TABLE `db_company` ADD COLUMN `company_logo` TEXT NULL AFTER `website`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("UPDATE `db_company` SET `company_logo` = 'company_logo.png' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_sitesettings` ADD COLUMN `sales_invoice_format_id` INT(5) NULL AFTER `change_return`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `sales_invoice_format_id` = '1' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_sitesettings` ADD COLUMN `sales_invoice_footer_text` TEXT NULL AFTER `sales_invoice_format_id`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `sales_invoice_footer_text` = ' This is footer text. You can set it from Site Settings.' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			
			
		}
		if($this->get_current_version_of_app_db()=='1.4'){
			//Provide 1.4.1 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.4.1' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
		}
		if($this->get_current_version_of_app_db()=='1.4.1'){
			//Provide 1.4.1 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.4.2' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
		}

		###############################################################################
		################################ 1.4.x ########################################
		###############################################################################
		if($this->get_current_version_of_app_db()=='1.4.2'){
			//Provide 1.4.x updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.5' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("INSERT INTO `db_languages` (`language`, `status`) VALUES ('Italian', '1')");if(!$q1){ echo "failed"; exit();}

			$q1 = $this->db->query("CREATE TABLE `db_purchasereturn` (
									  `id` int(5) NOT NULL AUTO_INCREMENT,
									  `purchase_id` int(11) DEFAULT NULL,
									  `return_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `reference_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `return_date` date DEFAULT NULL,
									  `return_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `supplier_id` int(5) DEFAULT NULL,
									  `warehouse_id` int(5) DEFAULT NULL,
									  `other_charges_input` double(10,2) DEFAULT NULL,
									  `other_charges_tax_id` int(5) DEFAULT NULL,
									  `other_charges_amt` double(10,2) DEFAULT NULL,
									  `discount_to_all_input` double(10,2) DEFAULT NULL,
									  `discount_to_all_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `tot_discount_to_all_amt` double(10,2) DEFAULT NULL,
									  `subtotal` double(10,2) DEFAULT NULL COMMENT 'Purchased qty',
									  `round_off` double(10,2) DEFAULT NULL COMMENT 'Pending Qty',
									  `grand_total` double(10,2) DEFAULT NULL,
									  `return_note` mediumtext COLLATE utf8mb4_unicode_ci,
									  `payment_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `paid_amount` double(10,2) DEFAULT NULL,
									  `created_date` date DEFAULT NULL,
									  `created_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `system_ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `system_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `company_id` int(5) DEFAULT NULL,
									  `status` int(1) DEFAULT NULL,
									  PRIMARY KEY (`id`)
									) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}

			$q1 = $this->db->query("CREATE TABLE `db_purchaseitemsreturn` (
									  `id` int(5) NOT NULL AUTO_INCREMENT,
									  `purchase_id` int(5) DEFAULT NULL,
									  `return_id` int(5) DEFAULT NULL,
									  `return_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `item_id` int(5) DEFAULT NULL,
									  `return_qty` int(10) DEFAULT NULL,
									  `price_per_unit` double(10,2) DEFAULT NULL,
									  `tax_id` int(5) DEFAULT NULL,
									  `tax_amt` double(10,2) DEFAULT NULL,
									  `unit_discount_per` double(10,2) DEFAULT NULL,
									  `discount_amt` double(10,2) DEFAULT NULL,
									  `unit_total_cost` double(10,2) DEFAULT NULL,
									  `total_cost` double(10,2) DEFAULT NULL,
									  `profit_margin_per` double(10,2) DEFAULT NULL,
									  `unit_sales_price` double(10,2) DEFAULT NULL,
									  `status` int(5) DEFAULT NULL,
									  PRIMARY KEY (`id`)
									) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}

			$q1 = $this->db->query("CREATE TABLE `db_purchasepaymentsreturn` (
									  `id` int(5) NOT NULL AUTO_INCREMENT,
									  `purchase_id` int(11) DEFAULT NULL,
									  `return_id` int(5) DEFAULT NULL,
									  `payment_date` date DEFAULT NULL,
									  `payment_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `payment` double(10,2) DEFAULT NULL,
									  `payment_note` mediumtext COLLATE utf8mb4_unicode_ci,
									  `system_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `system_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `created_time` time DEFAULT NULL,
									  `created_date` date DEFAULT NULL,
									  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `status` int(1) DEFAULT NULL,
									  PRIMARY KEY (`id`)
									) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}

			$q1 = $this->db->query("ALTER TABLE `db_company` ADD COLUMN `purchase_return_init` VARCHAR(5) NULL AFTER `purchase_init`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("UPDATE `db_company` SET `purchase_return_init` = 'PR' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_purchase` ADD COLUMN `return_bit` INT(1) NULL COMMENT 'Purchase return raised' AFTER `status`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("CREATE TABLE `db_salesreturn` (
										  `id` int(5) NOT NULL AUTO_INCREMENT,
										  `sales_id` int(5) DEFAULT NULL,
										  `return_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
										  `reference_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
										  `return_date` date DEFAULT NULL,
										  `return_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
										  `customer_id` int(5) DEFAULT NULL,
										  `warehouse_id` int(5) DEFAULT NULL,
										  `other_charges_input` double(10,2) DEFAULT NULL,
										  `other_charges_tax_id` int(5) DEFAULT NULL,
										  `other_charges_amt` double(10,2) DEFAULT NULL,
										  `discount_to_all_input` double(10,2) DEFAULT NULL,
										  `discount_to_all_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
										  `tot_discount_to_all_amt` double(10,2) DEFAULT NULL,
										  `subtotal` double(10,2) DEFAULT NULL,
										  `round_off` double(10,2) DEFAULT NULL,
										  `grand_total` double(10,2) DEFAULT NULL,
										  `return_note` mediumtext COLLATE utf8mb4_unicode_ci,
										  `payment_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
										  `paid_amount` double(10,2) DEFAULT NULL,
										  `created_date` date DEFAULT NULL,
										  `created_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
										  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
										  `system_ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
										  `system_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
										  `company_id` int(5) DEFAULT NULL,
										  `pos` int(1) DEFAULT NULL COMMENT '1=yes 0=no',
										  `status` int(1) DEFAULT NULL,
										  `return_bit` int(1) DEFAULT NULL COMMENT 'Return raised or not 1 or null',
										  PRIMARY KEY (`id`)
										) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("CREATE TABLE `db_salesitemsreturn` (
									  `id` int(5) NOT NULL AUTO_INCREMENT,
									  `sales_id` int(5) DEFAULT NULL,
									  `return_id` int(5) DEFAULT NULL,
									  `return_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `item_id` int(5) DEFAULT NULL,
									  `return_qty` int(10) DEFAULT NULL,
									  `price_per_unit` double(10,2) DEFAULT NULL,
									  `tax_id` int(5) DEFAULT NULL,
									  `tax_amt` double(10,2) DEFAULT NULL,
									  `unit_discount_per` double(10,2) DEFAULT NULL,
									  `discount_amt` double(10,2) DEFAULT NULL,
									  `unit_total_cost` double(10,2) DEFAULT NULL,
									  `total_cost` double(10,2) DEFAULT NULL,
									  `status` int(5) DEFAULT NULL,
									  PRIMARY KEY (`id`)
									) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("CREATE TABLE `db_salespaymentsreturn` (
									  `id` INT(5) NOT NULL AUTO_INCREMENT,
									  `sales_id` INT(5) DEFAULT NULL,
									  `return_id` INT(5) DEFAULT NULL,
									  `payment_date` DATE DEFAULT NULL,
									  `payment_type` VARCHAR(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `payment` DOUBLE(10,2) DEFAULT NULL,
									  `payment_note` MEDIUMTEXT COLLATE utf8mb4_unicode_ci,
									  `change_return` DOUBLE(10,2) DEFAULT NULL COMMENT 'Refunding the greater amount',
									  `system_ip` VARCHAR(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `system_name` VARCHAR(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `created_time` TIME DEFAULT NULL,
									  `created_date` DATE DEFAULT NULL,
									  `created_by` VARCHAR(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
									  `status` INT(1) DEFAULT NULL,
									  PRIMARY KEY (`id`)
									) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}

			$q1 = $this->db->query("ALTER TABLE `db_company` ADD COLUMN `sales_return_init` VARCHAR(5) NULL AFTER `sales_init`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("UPDATE `db_company` SET `sales_return_init` = 'PR' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_sales` ADD COLUMN `return_bit` INT(1) NULL COMMENT 'sales return raised' AFTER `status`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_sitesettings` ADD COLUMN `round_off` INT(1) NULL COMMENT '1=Enble, 0=Disable' AFTER `sales_invoice_footer_text`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `round_off` = '1' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}


			
			$q1=$this->fun_temp_update_suppliers_purchase_due();
			if(!$q1){ echo "failed"; exit();}

			$q1=$this->fun_temp_update_customers_sales_due();
			if(!$q1){ echo "failed"; exit();}

			$q1 = $this->db->query("ALTER TABLE `db_customers` ADD COLUMN `sales_return_due` DOUBLE(10,2) NULL AFTER `sales_due`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_suppliers` ADD COLUMN `purchase_return_due` DOUBLE(10,2) NULL AFTER `purchase_due`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("INSERT INTO `db_smstemplates` (`template_name`, `content`, `variables`, `company_id`, `status`, `undelete_bit`) VALUES('GREETING TO CUSTOMER ON SALES RETURN','Hi {{customer_name}},\r\nYour sales return Id is {{return_id}},\r\nReturn Date {{return_date}},\r\nTotal amount  {{return_amount}},\r\nWe paid  {{paid_amt}},\r\nand due amount is  {{due_amt}}\r\nThank you Visit Again','{{customer_name}}<br>                          \r\n{{return_id}}<br>\r\n{{return_date}}<br>\r\n{{return_amount}}<br>\r\n{{paid_amt}}<br>\r\n{{due_amt}}<br>\r\n{{company_name}}<br>\r\n{{company_mobile}}<br>\r\n{{company_address}}<br>\r\n{{company_website}}<br>\r\n{{company_email}}<br>',NULL,'1','1')");if(!$q1){ echo "failed"; exit();}


			/**/

		}

		if($this->get_current_version_of_app_db()=='1.5'){
			//Provide 1.6 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.6' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_tax` ADD COLUMN `group_bit` INT(1) NULL COMMENT '1=Yes, 0=No' AFTER `tax`, ADD COLUMN `subtax_ids` VARCHAR(10) NULL COMMENT 'Tax groups IDs' AFTER `group_bit`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_company` ADD COLUMN `invoice_view` INT(5) NULL COMMENT '1=Standard,2=Indian GST' AFTER `expense_init`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("UPDATE `db_company` SET `invoice_view` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_items` ADD COLUMN `hsn` VARBINARY(50) NULL AFTER `sku`");if(!$q1){ echo "failed"; exit();}
			
			$q1 = $this->db->query("CREATE TABLE `db_cobpayments` (
								  `id` INT(5) NOT NULL AUTO_INCREMENT,
								  `customer_id` INT(5) DEFAULT NULL,
								  `payment_date` DATE DEFAULT NULL,
								  `payment_type` VARCHAR(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
								  `payment` DOUBLE(10,2) DEFAULT NULL,
								  `payment_note` MEDIUMTEXT COLLATE utf8mb4_unicode_ci,
								  `system_ip` VARCHAR(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
								  `system_name` VARCHAR(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
								  `created_time` TIME DEFAULT NULL,
								  `created_date` DATE DEFAULT NULL,
								  `created_by` VARCHAR(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
								  `status` INT(1) DEFAULT NULL,
								  PRIMARY KEY (`id`)
								) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
								");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("CREATE TABLE `db_sobpayments` (
								  `id` INT(5) NOT NULL AUTO_INCREMENT,
								  `supplier_id` INT(5) DEFAULT NULL,
								  `payment_date` DATE DEFAULT NULL,
								  `payment_type` VARCHAR(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
								  `payment` DOUBLE(10,2) DEFAULT NULL,
								  `payment_note` MEDIUMTEXT COLLATE utf8mb4_unicode_ci,
								  `system_ip` VARCHAR(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
								  `system_name` VARCHAR(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
								  `created_time` TIME DEFAULT NULL,
								  `created_date` DATE DEFAULT NULL,
								  `created_by` VARCHAR(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
								  `status` INT(1) DEFAULT NULL,
								  PRIMARY KEY (`id`)
								) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
								");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_customers` ADD COLUMN `city` VARCHAR(50) NULL AFTER `state_id`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_suppliers` ADD COLUMN `city` VARCHAR(50) NULL AFTER `state_id`");if(!$q1){ echo "failed"; exit();}
			/**/
			

			/*############*/
		}//End 1.6
		if($this->get_current_version_of_app_db()=='1.6'){
			//Provide 1.6.1 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.6.1' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
		}//End 1.6.1
		if($this->get_current_version_of_app_db()=='1.6.1'){
			//Provide 1.6.2 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.6.2' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
		}//End 1.6.2
		if($this->get_current_version_of_app_db()=='1.6.2'){
			//Provide 1.6.3 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.6.3' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
		}//End 1.6.3
		if($this->get_current_version_of_app_db()=='1.6.3'){
			//Provide 1.6.4 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.6.4' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("INSERT INTO `db_languages` (`language`, `status`) VALUES ('Marathi', '1')");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_items` ADD COLUMN `custom_barcode` VARCHAR(100) NULL AFTER `item_code` ");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_users` ADD COLUMN `profile_picture` TEXT NULL AFTER `role_id`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_sitesettings` ADD COLUMN `machine_id` TEXT NULL AFTER `round_off`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `machine_id` = '".appinfo()."' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
		
		}//End 1.6.4

		if($this->get_current_version_of_app_db()=='1.6.4'){
			//Provide 1.6.5 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.6.5' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("CREATE TABLE `db_customer_payments`( `id` INT(5) NOT NULL AUTO_INCREMENT, `customer_id` INT(5), `payment_date` DATE, `payment_type` VARCHAR(50), `payment` DOUBLE(10,2), `payment_note` TEXT, `system_ip` VARCHAR(50), `system_name` VARCHAR(50), `created_time` VARCHAR(50), `created_date` VARCHAR(50), `created_by` VARCHAR(50), `status` INT(1), PRIMARY KEY (`id`), FOREIGN KEY (`customer_id`) REFERENCES `db_customers`(`id`) ON UPDATE CASCADE ON DELETE CASCADE )");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_items` CHANGE `stock` `stock` DOUBLE(10,2) NULL");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_salesitems` CHANGE `sales_qty` `sales_qty` DOUBLE(10,2) NULL");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_purchaseitems` CHANGE `purchase_qty` `purchase_qty` DOUBLE(10,2) NULL");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_purchaseitemsreturn` CHANGE `return_qty` `return_qty` DOUBLE(10,2) NULL");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_salesitemsreturn` CHANGE `return_qty` `return_qty` DOUBLE(10,2) NULL");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_customer_payments` ADD COLUMN `salespayment_id` INT(5) NULL AFTER `id`, ADD FOREIGN KEY (`salespayment_id`) REFERENCES `db_salespayments`(`id`) ON UPDATE CASCADE ON DELETE CASCADE");if(!$q1){ echo "failed"; exit();}
			
			$q1 = record_customer_payment();if(!$q1){ echo "failed"; exit();}


			$q1 = $this->db->query("CREATE TABLE `db_supplier_payments` ( `id` INT(5) NOT NULL AUTO_INCREMENT, `purchasepayment_id` INT(5) DEFAULT NULL, `supplier_id` INT(5) DEFAULT NULL, `payment_date` DATE DEFAULT NULL, `payment_type` VARCHAR(50) DEFAULT NULL, `payment` DOUBLE(10,2) DEFAULT NULL, `payment_note` TEXT DEFAULT NULL, `system_ip` VARCHAR(50) DEFAULT NULL, `system_name` VARCHAR(50) DEFAULT NULL, `created_time` VARCHAR(50) DEFAULT NULL, `created_date` VARCHAR(50) DEFAULT NULL, `created_by` VARCHAR(50) DEFAULT NULL, `status` INT(1) DEFAULT NULL, PRIMARY KEY (`id`), KEY `supplier_id` (`supplier_id`), KEY `purchasepayment_id` (`purchasepayment_id`), CONSTRAINT `db_supplier_payments_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `db_suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE, CONSTRAINT `db_supplier_payments_ibfk_2` FOREIGN KEY (`purchasepayment_id`) REFERENCES `db_purchasepayments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE ) ENGINE=INNODB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8mb4");if(!$q1){ echo "failed"; exit();}
			
			$q1 = record_supplier_payment();if(!$q1){ echo "failed"; exit();}
			

			$q1 = $this->db->query("CREATE TABLE IF NOT EXISTS `ci_sessions` ( `id` VARCHAR(128) NOT NULL, `ip_address` VARCHAR(45) NOT NULL, `timestamp` INT(10) UNSIGNED DEFAULT 0 NOT NULL, `data` BLOB NOT NULL, KEY `ci_sessions_timestamp` (`timestamp`) )");if(!$q1){ echo "failed"; exit();}

			$q1 = $this->db->query("ALTER TABLE db_smsapi CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_smstemplates CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE db_stockentry CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_smsapi` ENGINE=INNODB");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_smstemplates` ENGINE=INNODB");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("INSERT INTO `db_languages` (`language`, `status`) VALUES ('Khmer', '1')");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `machine_id` = '".appinfo()."' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			
		
		}//End 1.6.5
		if($this->get_current_version_of_app_db()=='1.6.5'){
			//Provide 1.6.6 updates 
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.6.6' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_salesitems` ADD COLUMN `tax_type` VARCHAR(50) NULL AFTER `price_per_unit`");if(!$q1){ echo "failed"; exit();}
			
			
			$q1=$this->update_tax_type_in_db_salesitems();
			if(!$q1){ echo "failed"; exit();}

			$q1 = $this->db->query("ALTER TABLE `db_purchaseitems` ADD COLUMN `tax_type` VARCHAR(50) NULL AFTER `tax_amt`");if(!$q1){ echo "failed"; exit();}
			$q1=$this->update_tax_type_in_db_purchaseitems();
			if(!$q1){ echo "failed"; exit();}

			$q1 = $this->db->query("ALTER TABLE `db_company` ADD COLUMN `sales_terms_and_conditions` TEXT NULL AFTER `sms_status`");if(!$q1){ echo "failed"; exit();}

			$q1 = $this->db->query("ALTER TABLE `db_company` ADD COLUMN `upi_code` TEXT NULL AFTER `logo`");if(!$q1){ echo "failed"; exit();}

			$q1 = $this->db->query("ALTER TABLE `db_company` ADD COLUMN `upi_id` VARCHAR(50) NULL AFTER `logo`");if(!$q1){ echo "failed"; exit();}

		}//End 1.6.6
		if($this->get_current_version_of_app_db()=='1.6.6'){
			//Provide 1.7 updates  17-05-2020
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.7' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			
			$q1 = $this->db->query("ALTER TABLE `db_items` ADD COLUMN `description` TEXT NULL AFTER `item_name`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_salesitems` ADD COLUMN `description` TEXT NULL AFTER `item_id`");if(!$q1){ echo "failed"; exit();}

			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `machine_id` = '".appinfo()."' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}

			$q1 = $this->db->query("ALTER TABLE `db_sitesettings` ADD COLUMN `domain` TEXT NULL AFTER `machine_id` ");if(!$q1){ echo "failed"; exit();}
			
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `domain` = '".get_domain()."' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
		}//End 1.7
		if($this->get_current_version_of_app_db()=='1.7'){
			//Provide 1.7.1 updates  01-07-2020
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.7.1' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_sitesettings` ADD COLUMN `show_upi_code` INT(1) DEFAULT 0 NULL AFTER `domain`");if(!$q1){ echo "failed"; exit();}
		}//End 1.7

		if($this->get_current_version_of_app_db()=='1.7.1'){
			//Provide 1.7.2 updates  xx-xx-2020
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.7.2' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("UPDATE db_sitesettings SET DATE_FORMAT='dd-mm-yyyy'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_purchaseitemsreturn` ADD COLUMN `tax_type` VARCHAR(50) NULL AFTER `tax_amt`;");if(!$q1){ echo "failed"; exit();}
			$q1=$this->update_tax_type_in_db_purchaseitemsreturn();
			if(!$q1){ echo "failed"; exit();}

			$q1 = $this->db->query("ALTER TABLE `db_salesitemsreturn` ADD COLUMN `description` TEXT NULL AFTER `item_id`, ADD COLUMN `tax_type` VARCHAR(50) NULL AFTER `tax_amt`");if(!$q1){ echo "failed"; exit();}

			$q1=$this->update_tax_type_in_db_salesitemsreturn();
			if(!$q1){ echo "failed"; exit();}

			$q1 = $this->db->query("ALTER TABLE `db_salesitems` ADD COLUMN `discount_type` VARCHAR(50) NULL AFTER `tax_amt`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("UPDATE `db_salesitems` SET `discount_type`='Percentage'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_salesitems` CHANGE `unit_discount_per` `discount_input` DOUBLE(10,2) NULL; ");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("ALTER TABLE `db_salesitemsreturn` CHANGE `unit_discount_per` `discount_input` DOUBLE(10,2) NULL, ADD COLUMN `discount_type` VARCHAR(50) NULL AFTER `discount_amt`; ");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("UPDATE `db_salesitemsreturn` SET `discount_type`='Percentage'");if(!$q1){ echo "failed"; exit();}

			// Changes Made in sidebar
			// PAy All Btn ADded
			// Colors for tables
			// Profit and Loss Date Selector change
			// Removed dd/mm/yyyy format
			// Added Tax Selection in Purchase Return
			// Added Fixed and Percentage Discount in POS, Sales, Sales Return

		}//End 1.7
		if($this->get_current_version_of_app_db()=='1.7.2'){
			//Provide 1.7.2 updates  xx-xx-2020
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.7.3' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			//$q1 = $this->db->query("INSERT INTO `db_roles` (`role_name`, `description`, `status`) VALUES('Sub-Admin','Almost all permissions added','1')");if(!$q1){ echo "failed"; exit();}
			

			// OTP Email Settings
			// Fixed Admin Role
			// Default Language setting


		}//End 1.7

		if($this->get_current_version_of_app_db()=='1.7.3'){
			//Provide 1.7.4 updates  01-10-2020
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.7.4' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			// show Note on Invoices - DONE
			// Database backup must be in .sql format, and foreignKeyCheck=0; - DONE
			// Full group by - DONE
			// Enable allow_url_fopen() in cpanel php selector->options. which is for get_file_contents() else create .ini file -DONE
			// Add HSN input box, (Exist in import) - DONE


		}//End 1.7

		if($this->get_current_version_of_app_db()=='1.7.4'){
			//Provide 1.7.5 updates  01-11-2020
			$q1 = $this->db->query("UPDATE `db_sitesettings` SET `version` = '1.7.5' WHERE `id` = '1'");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("DROP TABLE `temp_holdinvoice`");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("CREATE TABLE `db_hold` (
								  `id` int(5) NOT NULL AUTO_INCREMENT,
								  `reference_id` varchar(50) DEFAULT NULL,
								  `reference_no` varchar(50) DEFAULT NULL,
								  `sales_date` date DEFAULT NULL,
								  `sales_status` varchar(50) DEFAULT NULL,
								  `customer_id` int(5) DEFAULT NULL,
								  `other_charges_input` double(10,2) DEFAULT NULL,
								  `other_charges_tax_id` int(5) DEFAULT NULL,
								  `other_charges_amt` double(10,2) DEFAULT NULL,
								  `discount_to_all_input` double(10,2) DEFAULT NULL,
								  `discount_to_all_type` varchar(50) DEFAULT NULL,
								  `tot_discount_to_all_amt` double(10,2) DEFAULT NULL,
								  `subtotal` double(10,2) DEFAULT NULL,
								  `round_off` double(10,2) DEFAULT NULL,
								  `grand_total` double(10,2) DEFAULT NULL,
								  `sales_note` text DEFAULT NULL,
								  `pos` int(1) DEFAULT NULL COMMENT '1=yes 0=no',
								  PRIMARY KEY (`id`),
								  KEY `customer_id` (`customer_id`),
								  CONSTRAINT `db_hold_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `db_customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
								) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4
								");if(!$q1){ echo "failed"; exit();}
			$q1 = $this->db->query("CREATE TABLE `db_holditems` (
								  `id` int(5) NOT NULL AUTO_INCREMENT,
								  `hold_id` int(5) DEFAULT NULL,
								  `item_id` int(5) DEFAULT NULL,
								  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
								  `sales_qty` double(10,2) DEFAULT NULL,
								  `price_per_unit` double(10,4) DEFAULT NULL,
								  `tax_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
								  `tax_id` int(5) DEFAULT NULL,
								  `tax_amt` double(10,4) DEFAULT NULL,
								  `discount_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
								  `discount_input` double(10,4) DEFAULT NULL,
								  `discount_amt` double(10,4) DEFAULT NULL,
								  `unit_total_cost` double(10,4) DEFAULT NULL,
								  `total_cost` double(10,4) DEFAULT NULL,
								  PRIMARY KEY (`id`),
								  KEY `sales_id` (`hold_id`),
								  KEY `item_id` (`item_id`),
								  CONSTRAINT `db_holditems_ibfk_2` FOREIGN KEY (`hold_id`) REFERENCES `db_hold` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
								  CONSTRAINT `db_holditems_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `db_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
								) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
								");if(!$q1){ echo "failed"; exit();}
		

		}//End 1.7.5 end


		

		$this->db->trans_commit();
		redirect(base_url('login'),'refresh');
		//echo "success";


	}

	
	public function update_tax_type_in_db_salesitems(){
		$q1=$this->db->select("*")->get("db_salesitems");
		if($q1->num_rows()>0){
			foreach ($q1->result() as $res1) {
				$tax_type=$this->db->select("tax_type")->where("id",$res1->item_id)->get("db_items")->row()->tax_type;

				$q2=$this->db->set("tax_type",$tax_type)->where("id",$res1->id)->update("db_salesitems");
				if(!$q2){
					return false;
				}
			}
		}
		return true;
	}

	public function update_tax_type_in_db_purchaseitems(){
		$q1=$this->db->select("*")->get("db_purchaseitems");
		if($q1->num_rows()>0){
			foreach ($q1->result() as $res1) {
				$tax_type=$this->db->select("tax_type")->where("id",$res1->item_id)->get("db_items")->row()->tax_type;

				$q2=$this->db->set("tax_type",$tax_type)->where("id",$res1->id)->update("db_purchaseitems");
				if(!$q2){
					return false;
				}
			}
		}
		return true;
	}
	public function update_tax_type_in_db_purchaseitemsreturn(){
		$q1=$this->db->select("*")->get("db_purchaseitemsreturn");
		if($q1->num_rows()>0){
			foreach ($q1->result() as $res1) {
				$tax_type=$this->db->select("tax_type")->where("id",$res1->item_id)->get("db_items")->row()->tax_type;

				$q2=$this->db->set("tax_type",$tax_type)->where("id",$res1->id)->update("db_purchaseitemsreturn");
				if(!$q2){
					return false;
				}
			}
		}
		return true;
	}

	public function update_tax_type_in_db_salesitemsreturn(){
		$q1=$this->db->select("*")->get("db_salesitemsreturn");
		if($q1->num_rows()>0){
			foreach ($q1->result() as $res1) {
				$tax_type=$this->db->select("tax_type")->where("id",$res1->item_id)->get("db_items")->row()->tax_type;

				$q2=$this->db->set("tax_type",$tax_type)->where("id",$res1->id)->update("db_salesitemsreturn");
				if(!$q2){
					return false;
				}
			}
		}
		return true;
	}

	

}

/* End of file Updates.php */
/* Location: ./application/controllers/Updates.php */