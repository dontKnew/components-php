<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tax extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
		$this->load->model('tax_model','tax');
	}
	
	public function index(){
		$this->permission_check('tax_view');
		$data=$this->data;
		$data['page_title']=$this->lang->line('tax_list');
		$this->load->view('tax-list', $data);
	}
	public function newtax(){
		$this->form_validation->set_rules('tax_name', 'Tax Name', 'trim|required');
		$this->form_validation->set_rules('tax', 'Tax Name', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$result=$this->tax->verify_and_save();
			echo $result;
		} else {
			echo "Please Enter Tax Name & Tax Percentage!";
		}
	}
	public function update($id){
		$this->permission_check('tax_edit');
		$result=$this->tax->get_details($id);
		$data=array_merge($this->data,$result);
		$data['page_title']=$this->lang->line('tax_update');
		$this->load->view('tax', $data);
	}
	public function update_tax(){
		$this->form_validation->set_rules('tax_name', 'Tax Name', 'trim|required');
		$this->form_validation->set_rules('tax', 'tax', 'trim|required');
		$this->form_validation->set_rules('q_id', '', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$result=$this->tax->update_tax();
			echo $result;
		} else {
			echo "Please Enter Tax Name & Tax Percentage!";
		}
	}
	public function add(){
		$this->permission_check('tax_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('new_tax');
		$this->load->view('tax', $data);
	}

	public function ajax_list()
	{
		$list = $this->tax->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $tax) {
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" name="checkbox[]" value='.$tax->id.' class="checkbox column_checkbox" >';
			$row[] = $tax->tax_name;
			$row[] = $tax->tax;
			

			 		if($tax->status==1){ 
			 			$str= "<span onclick='update_status(".$tax->id.",0)' id='span_".$tax->id."'  class='label label-success' style='cursor:pointer'>Active </span>";}
					else{ 
						$str = "<span onclick='update_status(".$tax->id.",1)' id='span_".$tax->id."'  class='label label-danger' style='cursor:pointer'> Inactive </span>";
					}
			$row[] = $str;			
			         $str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';

											if($this->permissions('tax_edit'))
											$str2.='<li>
												<a title="Edit Record ?" href="tax/update/'.$tax->id.'">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

											if($this->permissions('tax_delete'))
											$str2.='<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_tax('.$tax->id.')">
													<i class="fa fa-fw fa-trash text-red"></i>Delete
												</a>
											</li>
											
										</ul>
									</div>';		
			$row[] = $str2;
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->tax->count_all(),
						"recordsFiltered" => $this->tax->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function update_status(){
		$this->permission_check_with_msg('tax_edit');
		$id=$this->input->post('id');
		$status=$this->input->post('status');
		$result=$this->tax->update_status($id,$status);
		return $result;
	}
	
	public function delete_tax(){
		$this->permission_check_with_msg('tax_delete');
		$id=$this->input->post('q_id');
		return $this->tax->delete_tax_from_table($id);
	}
	public function multi_delete(){
		$this->permission_check_with_msg('tax_delete');
		$ids=implode (",",$_POST['checkbox']);
		return $this->tax->delete_tax_from_table($ids);
	}

}

