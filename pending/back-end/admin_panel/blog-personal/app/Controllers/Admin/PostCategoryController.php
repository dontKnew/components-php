<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PostCategory as Model;
use Exception;


class PostCategoryController extends BaseController
{
    protected Model $model;

    public function __construct(){
        $this->model = new Model();
    }

    public function index()
    {

        $data = $this->model->orderBy("id","desc")->findAll();
        $data = array(
            "postCategory"=>"active",
            "data"=>$data,
            'postCategoryCount'=>count($this->model->findAll())
        );

        return view("admin/post_category/index", $data);
    }

    public function add(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Routing\Redirector|string|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\CodeIgniter\HTTP\RedirectResponse
    {
        if($this->request->getPostGet()){
            try {
                $data = $this->request->getVar();
                $data['admin_id'] = session()->get("id");
                $data['name'] = strtoupper($data['name']);
                if($this->model->save($data)){
                    return redirect()->to("admin/post-category")->with("msg", "Post Category added successfully");
                }else {
                    return redirect()->to("admin/post-category")->with("err", "Post Category could not add");
                }
            }catch (Exception $e){
                return redirect()->back()->withInput()->with("err","Error : ".$e->getMessage());

            }
        }
        $data = array(
            "postCategory"=>"active",
            'postCategoryCount'=>count($this->model->findAll())
        );
        return view("admin/post_category/add", $data);
    }
    public function edit($id){
        if($id!==null){
            $data = $this->model->find($id);
            $data = array(
                "postCategory"=>"active",
                "data"=>$data,
                "blogCategoryCount"=>count($this->model->findAll())
            );
            return view("admin/post_category/edit", $data);
        }else {
            redirect()->route("admin/post-category");
        }
    }

    public function update(){
        if($this->request->getPostGet()){
            try {
                $id = $this->request->getVar("id");
                $data = $this->request->getVar();
                $this->model->update($id, $data);
                return redirect()->route("admin/post-category")->with("msg","Post Category updated successfully");
            }catch (Exception $e){
                return redirect()->back()->with("err", "Error:".$e->getMessage());
            }
        }
    }

    public function delete($id)
    {
        try {
            $this->model->delete($id);
            return redirect()->back()->with("msg","Post Category delete successfully");
        }catch(Exception $e){
            return redirect()->back()->with("err", $e->getMessage());
        }
    }


}
