<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Models\AdminModel as Admin;
use App\Models\RememberToken as Remember;
use CodeIgniter\I18n\Time;
use Exception;
use ReflectionException;

/*when you use cookie and redirecting to somewhere its very important redirect()->withCookie()*/

class AuthController extends BaseController
{
    private Admin $adminModel;
    private Remember $rememberModel;

    public function __construct()
    {
        $this->adminModel = new Admin();
        $this->rememberModel = new Remember();

    }

    public function index()
    {
        if(get_cookie("remember_token")!==null){
            $id = $this->rememberModel->select("admin_id")->where("token", get_cookie("remember_token"))->first();
            $serverData = $this->adminModel->asArray()->find($id['admin_id']);
            $serverData['logged_in'] = TRUE;
            if($this->setSessionData($serverData)){
                log_message("error", "user Logged through remember token");
                return redirect()->to('admin/dashboard');
            }
        }
        if(session()->get('logged_in')){
            return redirect()->to('admin/dashboard');
        }
        return view('admin/login');
    }

    public function register(){
        try {
            $data = [
                "name"=>"Admin",
                "email"=>"test@gmail.com",
                "password"=>"admin123",
                "password_confirm"=>"admin123",
                "profile"=>"test.jpg"
            ];
            if(!$this->adminModel->insert($data)){
                print_r($this->adminModel->errors());
            }else {
                return "Admin has been registered success";
            }
        }catch (Exception|\ReflectionException $e){
            return $e->getMessage();
        }
    }

    public function login(): \CodeIgniter\HTTP\RedirectResponse
    {
        try {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $serverData = $this->adminModel->where('email', $email)->first();
            if($serverData !==null){
                $pass = $serverData->password;
                if(password_verify($password, $pass)){
                    /*check remember checked or not*/
                    if($this->request->getVar("remember_admin")){
                        $token = random_string('crypto', 30);
                        set_cookie("remember_token", $token, 640800);
                        $data =  [
                            "admin_id"=>$serverData->id,
                            "token"=>$token,
                            "expiry_date"=> Time::parse('+1 week')->format('d-M-Y'),
                            "expiry_time"=> Time::parse('+1 week')->format('H:i:s'),
                        ];
                        if(!$this->rememberModel->insert($data)){
                            return redirect()->to('admin/login')->withInput()->with('err', $this->rememberModel->errors());
                        }
                    }
                    $ses_data = [
                        'id'=>$serverData->id,
                        'name'     => $serverData->name,
                        'email'    => $serverData->email,
                        'profile'    => $serverData->profile,
                        'logged_in'     => TRUE
                    ];
                    $this->session->set($ses_data);
                    log_message("notice", "user logged with email ".$email." and password");
                    return redirect()->to('admin/dashboard')->withCookies();
                }else{
                    log_message("warning", "admin login attempt failed with Email : ".$email);
                    return redirect()->to('admin/login')->withInput()->with('err', 'Please enter the correct Password');
                }
            }else{
                log_message("warning", "admin login attempt failed with Email : ".$email);
                return redirect()->to('admin/login')->withInput()->with('err', 'Email address is not registered with us');;
            }
        } catch (ReflectionException|Exception $e) {
            log_message("error", "Login Error :  ".$e->getMessage());
            return redirect()->to('admin/login')->withInput()->with('err', 'Error'.$e->getMessage());
        }

    }

    public function changePassword(){
        if($this->request->getMethod()=="post"){
            $id = $this->session->get('id');
            $password = $this->request->getVar('password');
            $cpassword = $this->request->getVar('cpassword');

            if($password == $cpassword){
                $password = password_hash($password, PASSWORD_DEFAULT);

                try {
                    if($this->adminModel->update($id, array("password"=>$password))){
                        $this->session->setFlashdata('msg', 'Password has been changed');
                    }else {
                        $this->session->setFlashdata('err', 'Password could not change');
                    }
                    return redirect()->to('admin/change-password');
                }catch(Exception $e){
                    $this->session->setFlashdata('err', 'Error :'.$e->getMessage());
                    return redirect()->to('admin/change-password');
                }

            }else {
                $this->session->setFlashdata('err', 'Please enter same password');
                return redirect()->to('admin/change-password');
            }

        }
        return view("admin/profile/change_password", ["change_password"=>"active"]);
    }

    public function profile(): string
    {

        return view("admin/profile/profile", ["profile"=>"active"]);
    }

    public function updateProfile(){
        if($this->request->getMethod()=="post"){
            $session = session();
            $id = $this->request->getVar("id");
            $oldData  = $this->adminModel->find($id);
            try {
                $image = $this->updateImage("profile", $oldData->profile, "admin/image/admin_profile" );
                $data = $this->request->getVar();
                $data['profile'] = $image;
                /*not working together so updating separately...*/
                $this->adminModel->update($id, ["profile"=>$image]);
                $this->adminModel->update($id, ["name"=>$data['name']]);
                $this->adminModel->update($id, ["email"=>$data['email']]);
                $this->setSessionData($data);

                $session->setFlashdata('msg', 'Your profile is updated');
                return redirect()->back();
            }catch(\ReflectionException | Exception $e){
                $session->setFlashdata('err', 'Error :'.$e->getMessage());
                return redirect()->back();
            }
        }
    }
    public function logout()
    {
        try {
            $this->rememberModel->where("token", get_cookie("remember_token"))->delete();
            delete_cookie("remember_token");
            $this->session->destroy();
            log_message("notice", "user logout session with email -".session("email"));
            return redirect()->to('admin/login')->withCookies();
        }catch(Exception $e){
            log_message("error", "Logout Error -".$e->getMessage());
            return $e->getMessage();
        }
    }

/*AUTH HELPER FUNCTION */
    /*
     * set session data as object
     */
    protected function setSessionData($ses_data): bool
    {
        if($this->session->set($ses_data)){
            return true;
        }
        return false;
    }

}
