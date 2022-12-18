<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Gallary extends CI_Controller

{

	 function __construct()
	 {

        parent::__construct();

        $this->load->database();



        $x=$this->session->userdata('iletsadmin');

        if($x['role']!=1)

        {

            return redirect('welcome', 'refresh');

        }

    }



    public function index()

    {

        $page =(isset($_GET['page'])) ? $_GET['page'] : 0;
        $domain = $this->session->sessionDomain;
        $this->db->where("domain", strtolower($domain));

        $query=$this->db->select('gallary.*')->from('gallary')->order_by('id','desc')->limit(20,($page))->get();

        $num_rows=$this->db->order_by('id', 'desc')->get('gallary')->num_rows();

        $data['gallary']=$query->result_array();

        $data['links']=$this->pagi->pagination1('admin/gallary',$num_rows,20);

        $this->load->view('admin/gallary/index',$data);

    }



    public function add()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST')
        {
         $this->load->helper(array('form'));
         $this->load->library('form_validation');
         $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE)
             {
                 $this->load->view('admin/gallary/add');
             }else{
               if($_FILES['image']['name']!='')
                {

                    $ext=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);

                     $journalName = str_replace(' ', '_', $_FILES['image']['name']);

                     $jname=preg_replace('/[^A-Za-z0-9\-]/', '', $journalName);

                $config['file_name'] = time() . $jname.'.'.$ext;

                $config['upload_path'] = './uploads/gallary/';

                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg|mp4';

                $this->upload->initialize($config);

                $this->upload->do_upload('image');

                $_POST['image'] = $config['file_name'];

                }




                if($this->db->insert('gallary',$_POST))

                {

                    $this->session->set_flashdata('msg', 'gallary Successfully Added');

                    return redirect(base_url('admin/gallary'),'refresh');

                }

                else

                {

                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');

                    return redirect(base_url('admin/gallary/add'),'refresh');

                }

             }

        }

        else

        {
            $domain = $this->session->sessionDomain;
            $query = $this->db->select('gallery_type.name,gallery_type.name')->from('gallery_type')->where("domain", $domain)->order_by('id', 'desc')->get();
            $data['gallery_type'] = $query->result_array();
            $this->load->view('admin/gallary/add', $data);

        }

    }



    public function edit($id='')

    {

        if ($this->input->server('REQUEST_METHOD') == 'POST')

        {

                 $cat=$this->db->where('id',$id)->get('gallary')->row_array();
        $this->load->helper(array('form'));

         $this->load->library('form_validation');

         $this->form_validation->set_rules('status', 'Status', 'required');




            if ($this->form_validation->run() == FALSE)

             {

                 $data['gallary']=$this->db->where('id',$id)->get('gallary')->row_array();

                 $this->load->view('admin/gallary/edit',$data);

             }

             else

             {


                if($_FILES['image']['name']!='')

                {

                    $ext=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);

                     $journalName = str_replace(' ', '_', $_FILES['image']['name']);

                     $jname=preg_replace('/[^A-Za-z0-9\-]/', '', $journalName);

                $config['file_name'] = time() . $jname.'.'.$ext;

                $config['upload_path'] = './uploads/gallary/';

                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg|mp4';

                $this->upload->initialize($config);

                $this->upload->do_upload('image');

                $_POST['image'] = $config['file_name'];

                }


                if($this->db->where('id',$id)->update('gallary',$_POST))

                {

                    $this->session->set_flashdata('msg', 'gallary Successfully Added');

                    return redirect(base_url('admin/gallary'),'refresh');

                }

                else

                {

                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');

                    return redirect(base_url('admin/gallary/edit/'.$id),'refresh');

                }

             }

        }

        else

        {

            $data['gallary']=$this->db->where('id',$id)->get('gallary')->row_array();

            $this->load->view('admin/gallary/edit',$data);

        }

    }



    public function view($id='')

    {

         $data['gallary']=$this->db->where('id',$id)->get('gallary')->row_array();

         $this->load->view('admin/gallary/view',$data);

    }



    public function delete($id='')

    {

        if($this->db->where('id',$id)->delete('gallary'))

        {

            $this->session->set_flashdata('msg', 'Success Deleted gallary');

        }

        else

        {

            $this->session->set_flashdata('err', 'Please try After Sometimes...');

        }

        return redirect(base_url('admin/gallary'),'refresh');

    }

private function set_upload_options() {

        //upload an image options

        $config = array();

        $config['upload_path'] = './uploads/gallary/';

        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';

        $config['max_size'] = '0';

        $config['overwrite'] = FALSE;

        return $config;

    }


    public function getGalleryData()
    {
        try {
            $data = $this->db->where("domain", strtolower($this->session->sessionDomain))->get("gallery_customize");
            if ($data) {
                $this->load->view('admin/gallary/customize',array("data"=>$data->result()));
            } else {
                $this->session->set_flashdata('err', 'could not fetch data from database');
                return redirect(base_url()."admin/gallary/customize");
            }
        }catch (\Exception $e){
            $this->session->set_flashdata('err', $e->getMessage());
            return redirect(base_url()."admin/gallary/customize");
        }
    }

    public function updateGalleryData()
    {

        if($this->input->server('REQUEST_METHOD') == 'POST') {
            if($_FILES['gallery_photo']['name']!='')
            {
                $journalName = str_replace(' ', '_', $_FILES['gallery_photo']['name']);
                $config['file_name'] = time()."_".$journalName;
                $config['upload_path'] = './uploads/gallary/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';
                $this->upload->initialize($config);
                try {
                    $this->upload->do_upload('gallery_photo');
                    $_POST['gallery_photo'] = $config['file_name'];
                }catch(Exception $e){
                    echo "Error ".$e->getMessage();
                }
            }else {
                $db = $this->db->where("domain", strtolower($this->session->sessionDomain))->get("gallery_customize");
                $result = $db->result();
                $_POST['gallery_photo'] = $result[0]->gallery_photo;
            }
            try {
                $db = $this->db->where("domain", strtolower($this->session->sessionDomain))->update("gallery_customize", $_POST);
                if($db) {
                    $this->session->set_flashdata('err', ' Gallery Data successfully updated');
                } else {
                    $this->session->set_flashdata('err', 'Gallery : Please try Again After SomeTimes');
                }
            }catch (\Exception $e){
                $this->session->set_flashdata('err', $e->getMessage());
            }
            redirect(base_url()."admin/gallary/customize");
        } else {
            $this->session->set_flashdata('err', 'http verbs method is invalid');
            redirect(base_url()."admin/gallary/customize");
        }
    }


//GALLERY TYPES
    public function GalleryType()
    {
        try {
            $domain = strtolower($this->session->sessionDomain);
            $query = $this->db->select('gallery_type.*')->from('gallery_type')->where("domain",$domain)->order_by('id', 'desc')->get();
            $data['gallery_type'] = $query->result_array();
            $this->load->view('admin/gallary/gallery-type/index', $data);
        }catch (Exception $e){
            echo 'Error : '. $e->getMessage();
            exit;
        }
    }

    public function addGalleryType()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            try {
                $this->load->helper(array('form'));
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name', 'Name', 'required');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/gallary/gallery-type/add');
                } else {
                    if ($this->db->insert('gallery_type', $_POST)) {
                        $this->session->set_flashdata('msg', 'Gallery type Successfully Added');
                        return redirect(base_url('admin/gallery-type'), 'refresh');
                    } else {
                        $this->session->set_flashdata('err', 'Please try Again After SomeTimes');
                        return redirect(base_url('admin/gallery-type/add'), 'refresh');
                    }
                }
            }catch (Exception $e){
                $this->session->set_flashdata('err', 'Error : '. $e->getMessage());
                return redirect(base_url('admin/gallery-type/add'), 'refresh');
            }
        } else {
            try {

                $this->load->view('admin/gallary/gallery-type/add');
            }catch (Exception $e){
                echo 'Error : '. $e->getMessage();
                exit;
            }
        }
    }
    public function deleteGalleryType($id = '')
    {
        try {
            if ($this->db->where('id', $id)->delete('gallery_type')) {
                $this->session->set_flashdata('msg', 'Success Deleted Gallery');
            } else {
                $this->session->set_flashdata('err', 'Please try After Sometimes...');
            }
            return redirect(base_url('admin/gallery-type'), 'refresh');
        }catch (Exception $e){
            echo 'Error : '. $e->getMessage();
            exit;
        }
    }
// END GALLERY TYPE

}
