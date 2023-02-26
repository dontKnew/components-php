<?php 
	/**
	 * Author: Askarali
	 * Date: 06-11-2018
	 */
	class Users extends MY_Controller{
		public function __construct(){
			parent::__construct();
			$this->load_global();

			$this->load->model('state_model','state');
		}
		public function index(){
			$this->permission_check('users_add');
			$data=$this->data;//My_Controller constructor data accessed here
			$data['page_title']=$this->lang->line('create_users');
			$this->load->view('users',$data);
		}
		public function save_or_update(){
			//print_r($_POST);exit();
			$data=$this->data;//My_Controller constructor data accessed here
			
			$this->form_validation->set_rules('mobile', 'Mobile', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			
			//echo $this->input->post('command');exit();
			if($this->input->post('command')=='save'){
				$this->form_validation->set_rules('pass', 'Password', 'required|trim|min_length[5]|max_length[12]');
				$this->form_validation->set_rules('new_user', 'Usenname', 'required|trim|min_length[5]|max_length[12]');
				$this->form_validation->set_rules('role_id', 'Role', 'required|trim');
			}

			if ($this->form_validation->run() == TRUE) {
				$this->load->model('users_model');
				//$username=$this->input->post('new_user');
				//$mobile=$this->input->post('mobile');
				//$email=$this->input->post('email');
				//$role_id=$this->input->post('role_id');
				//$data['username']=$username;
				//$data['mobile']=$mobile;
				//$data['email']=$email;
				//$data['role_id']=$role_id;
				if($this->input->post('command')!='update'){
					//$password=md5($this->input->post('pass'));//Encrypted in MD5
					//$data['password']=$password;
					$result=$this->users_model->verify_and_save();
				}
				else{
					$q_id=$this->input->post('q_id');
					$data['q_id']=$q_id;
					$result=$this->users_model->verify_and_update($data);
				}
				
				echo $result;
			} 
			else {
				echo validation_errors();
				//echo  "Username & Password must have 5 to 15 Characters!";
			}
		
		}
		public function view(){
			$this->permission_check('users_view');
			$data=$this->data;//My_Controller constructor data accessed here
			$data['page_title']=$this->lang->line('users_list');
			$this->load->view('users-view',$data);
		}
		public function status_update(){
			$this->permission_check_with_msg('users_edit');
			$userid=$this->input->post('id');
			$status=$this->input->post('status');

			$this->load->model('users_model');
			$result=$this->users_model->status_update($userid,$status);
			return $result;

		}
		public function password_reset(){
			$data=$this->data;//My_Controller constructor data accessed here
			$data['page_title']=$this->lang->line('change_password');
			$this->load->view('change-pass',$data);
		}
		public function password_update(){
			if($this->session->userdata('inv_username')=='admin' && demo_app()){
	        	echo "Restricted Admin Password Change";exit();
	        }
			$data=$this->data;//My_Controller constructor data accessed here
			$currentpass=$this->input->post('currentpass');
			$newpass=$this->input->post('newpass');

			$this->load->model('users_model');
			$result=$this->users_model->password_update(md5($currentpass),md5($newpass),$data);
			echo $result;

		}
		public function dbbackup(){
			$this->permission_check_with_msg('database_backup');
			if(demo_app()){
				echo "Restricted in Demo";exit();
			}
	        
			// Load the DB utility class
			$this->load->dbutil();
			$prefs = array( 'newline' => "\n",
				'format' => 'zip',
				'filename' => 'database_backup.sql',
				'foreign_key_checks' => FALSE,
				);


			// Backup your entire database and assign it to a variable
			$backup = $this->dbutil->backup($prefs);

			// Load the file helper and write the file to your server
			$this->load->helper('file');
			write_file('dbbackup'.date('d-m-Y-h-m-s').'.gz', $backup);

			// Load the download helper and send the file to your desktop
			$this->load->helper('download');
			force_download('dbbackup'.date('d-m-Y-h-m-s').'.gz', $backup);

		}
		public function edit($id){
			$this->permission_check('users_edit');
			$this->load->model('users_model');
			$data=$this->users_model->get_details($id);
			//print_r($data);exit();
			$data['page_title']=$this->lang->line('edit_user');
			$this->load->view('users', $data);
		}
		public function delete_user(){
			$this->permission_check_with_msg('users_delete');
			$this->load->model('users_model');
			$id=$this->input->post('q_id');
			$result=$this->users_model->delete_user($id);
			return $result;
		}
	}

	

?>
