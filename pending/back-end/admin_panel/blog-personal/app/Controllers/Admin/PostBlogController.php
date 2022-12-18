<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PostBlogModel as PostBlog;
use CodeIgniter\HTTP\RedirectResponse;
use Exception;


class PostBlogController extends BaseController
{
    protected PostBlog $model;

    public function __construct(){
        $this->model = new PostBlog();
    }

    public function index()
    {

        $data = $this->model->orderBy("id","desc")->findAll();

        $data = array(
            "postBlog"=>"active",
            "data"=>$data,
            'postBlogCount'=>count($this->model->findAll())
        );

        return view("admin/post_blog/index", $data);
    }

    public function add(){
        if($this->request->getPostGet()){
            try {
                $image = $this->updateImage("thumbnail", null, "admin/image/thumbnail/" );
                $data = $this->request->getVar();
                $data['thumbnail'] = $image;
                $data['admin_id'] = session()->get("id");
                $data['admin_id'] = session()->get("id");
//                dd($data);
                if($this->model->save($data)){
                    return redirect()->to("admin/post-blog")->with("msg", "Post added successfully");
                }else {
                    return redirect()->to("admin/post-blog")->with("msg", "Post could not add");
                }

            }catch (Exception $e){
                return redirect()->back()->withInput()->with("err","Error : ".$e->getMessage());

            }
        }
        $data = array(
            "postBlog"=>"active",
            'postblogCount'=>count($this->model->findAll())
        );
        return view("admin/post_blog/add", $data);
    }
    public function edit($id){
        if($id!==null){
            $data = $this->model->find($id);
            $data = array(
                "postBlog"=>"active",
                "data"=>$data,
                "copy"=>false,
                "blogPostCount"=>count($this->model->findAll())
            );
            return view("admin/post_blog/edit", $data);
        }
    }

    public function update(){
        if($this->request->getPostGet()){
            $id = $this->request->getVar("id");
            $oldData = $this->model->find($id);
            try {
                $data = $this->request->getVar();
                $image = $this->updateImage("thumbnail", $oldData['thumbnail'], "admin/image/thumbnail");
                $data['thumbnail'] = $image;

                $this->model->update($id, $data);
                return redirect()->route("admin/post-blog")->with("msg","Post updated successfully");
            }catch (Exception $e){
                return redirect()->back()->with("err", "Error:".$e->getMessage());
            }
        }
    }

    public function copy($id){
        if($id!==null){
            $data = $this->model->find($id);
            $data = array(
                "postBlog"=>"active",
                "data"=>$data,
                "copy"=>true,
                "blogPostCount"=>count($this->model->findAll())
            );
            return view("admin/post_blog/edit", $data);
        }
    }

    public function delete($id)
    {
        try {
            $this->model->delete($id);
            return redirect()->back()->with("msg","Post delete successfully");
        }catch(Exception $e){
            return redirect()->back()->with("err", $e->getMessage());
        }
    }

    public function viewStudent($id, $highlight_id)
    {

         $apartment = $this->model->find($id);
//        $model = new HighlightStudentModel();
//        $highlight_id = $model->where("service_apartment_id", $id)->find();

        $data = array(
            "student"=>"active",
            "data"=>$studentData,
            'studentCount'=>count($this->model->findAll()),
            "highlight_id"=>$highlight_id
        );
        return view("admin/post_blog/view", $data);
    }


}
