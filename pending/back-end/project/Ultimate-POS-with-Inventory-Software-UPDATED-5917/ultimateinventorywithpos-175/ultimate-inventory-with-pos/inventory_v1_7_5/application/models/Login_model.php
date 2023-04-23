<?php

/**
 * Author: Askarali Makanadar
 * Date: 05-11-2018
 */
class Login_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function verify_credentials($username,$password)
	{
		//Filtering XSS and html escape from user inputs 
		$username=$this->security->xss_clean(html_escape($username));
		$password=$this->security->xss_clean(html_escape($password));
				
		$query=$this->db->query("select a.id,a.username,a.role_id,b.role_name from db_users a, db_roles b where b.id=a.role_id and  a.username='$username' and a.password='".md5($password)."' and a.status=1");
		if($query->num_rows()==1){

			$logdata = array('inv_username'  => $query->row()->username,
				        	 'inv_userid'  => $query->row()->id,
				        	 'logged_in' => TRUE,
				        	 'role_id' => $query->row()->role_id,
				        	 'role_name' => trim($query->row()->role_name),
				        	);
			$this->session->set_userdata($logdata);
			$this->session->set_flashdata('success', 'Welcome '.ucfirst($query->row()->username)." !");
			return true;
		}
		else{
			return false;
		}		
	}
	/*public function verify_email_send_otp($email)
	{
		$q1=$this->db->query("select email,company_name from db_company where email<>''");
		if($q1->num_rows()==0){
			$this->session->set_flashdata('failed', 'Failed to send OTP! Contact admin :(');
			return false;
			exit();
		}
		//Filtering XSS and html escape from user inputs 
		$email_id=$this->security->xss_clean(html_escape($email));
				
		$query=$this->db->query("select * from db_users where email='$email' and status=1");
		if($query->num_rows()==1){
			$otp=rand(1000,9999);

			$server_subject = "OTP for Password Change | OTP: ".$otp;
			$ready_message="---------------------------------------------------------
Hello User,

You are requested for Password Change,
Please enter ".$otp." as a OTP.

Note: Don't share this OTP with anyone.
Thank you
---------------------------------------------------------
		";
		
			$this->load->library('email');
			$this->email->from($q1->row()->email, $q1->row()->company_name);
			$this->email->to($email_id);
			$this->email->subject($server_subject);
			$this->email->message($ready_message);

			if($this->email->send()){
				//redirect('contact/success');
				$this->session->set_flashdata('success', 'OTP has been sent to your email ID!');
				$otpdata = array('email'  => $email,'otp'  => $otp );
				$this->session->set_userdata($otpdata);
				//echo "Email Sent";
				return true;
			}
			else{
				//echo "Failed to Send Message.Try again!";
				return false;
			}
		}
		else{
			return false;
		}		
	}*/

	public function verify_email_send_otp($email)
	{
		
		//Filtering XSS and html escape from user inputs 
		$email_id=$this->security->xss_clean(html_escape($email));
				
		$query=$this->db->query("select * from db_users where email='$email' and status=1");
		if($query->num_rows()==1){
			

			$q1=$this->db->query("select email,store_name from db_company where id=1");
			
			$otp=rand(1000,9999);

			$server_subject = "OTP for Password Change | OTP: ".$otp;
			$ready_message="---------------------------------------------------------
Hello User,

You are requested for Password Change,
Please enter ".$otp." as a OTP.

Note: Don't share this OTP with anyone.
Thank you
---------------------------------------------------------
		";
		
			/*$this->load->library('email');
			$this->email->from($q1->row()->email, $q1->row()->store_name);
			$this->email->to($email_id);
			$this->email->subject($server_subject);
			$this->email->message($ready_message);*/
			
			//if($this->email->send()){
			if(mail($email_id, $server_subject, $ready_message)){
				//redirect('contact/success');
				$this->session->set_flashdata('success', 'OTP has been sent to your email ID! (Check Inbox/Spam Box)');
				$otpdata = array('email'  => $email_id,'otp'  => $otp );
				$this->session->set_userdata($otpdata);
				//echo "Email Sent";
				return true;
			}
			else{
				//echo "Failed to Send Message.Try again!";
				$this->session->set_flashdata('failed', 'Failed to Send Message.Try again!');
				return false;
			}
		}
		else{
			$this->session->set_flashdata('failed', 'This Email ID not Exist in Our Records!');
			return false;
		}		
	}

	public function verify_otp($otp)
	{
		//Filtering XSS and html escape from user inputs 
		$otp=$this->security->xss_clean(html_escape($otp));
		$email=$this->security->xss_clean(html_escape($email));
		if($this->session->userdata('email')==$email){ redirect(base_url().'logout','refresh');	}
				
		$query=$this->db->query("select * from db_users where username='$username' and password='".md5($password)."' and status=1");
		if($query->num_rows()==1){

			$logdata = array('inv_username'  => $query->row()->username,
				        	 'inv_userid'  => $query->row()->id,
				        	 'logged_in' => TRUE 
				        	);
			$this->session->set_userdata($logdata);
			return true;
		}
		else{
			return false;
		}		
	}
	public function change_password($password,$email){
			$query=$this->db->query("select * from db_users where email='$email' and status=1");
			if($query->num_rows()==1){
				/*if($query->row()->username == 'admin'){
					echo "Restricted Admin Password Change";exit();
				}*/
				$password=md5($password);
				$query1="update db_users set password='$password' where email='$email'";
				if ($this->db->simple_query($query1)){

				        return true;
				}
				else{
				        return false;
				}
			}
			else{
				return false;
				}

		}
}