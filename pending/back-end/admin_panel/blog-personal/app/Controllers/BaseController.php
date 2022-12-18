<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;


use CodeIgniter\Cookie\Cookie;
use DateTime;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ["text", "cookie", 'inflector', 'url','html'];
    protected  $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
          $this->session = session();

    }

    protected function updateImage(string $input_name, $old_image_name, $path){
        if($_FILES[$input_name]['name']!==""){
            /*check image is valid or not*/
            $validationRule = [
                $input_name => [
                    'rules' => 'uploaded['.$input_name.']'
                        . '|is_image['.$input_name.']'
                        . '|mime_in['.$input_name.',image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                ],
            ];
            if (!$this->validate($validationRule)) {
                return redirect()->back()->withInput()->with("Please upload valid image");
            }else {
                $realName = pathinfo($_FILES[$input_name]['name'], PATHINFO_FILENAME);
                $file = $this->request->getFile($input_name);
                $randomName = $file->getRandomName();
                $name = $realName."_".$randomName;

                /*compress image*/
                $image = \Config\Services::image()
                    ->withFile($file)
                    ->withResource();
                $image->save($path.'/low/' .$name,40);
                $image->save($path.'/medium/' .$name,60);
                $image->save($path.'/high/' .$name,75);
                $image->save($path.'/original/' .$name,100);

                if($old_image_name !==null){
                    if(file_exists($path."/".$old_image_name)){
                        unlink($path."/low/".$old_image_name);
                        unlink($path."/high/".$old_image_name);
                        unlink($path."/medium/".$old_image_name);
                        unlink($path."/original/".$old_image_name);
                    }
                }
                return  $name;
            }
        }else {
            return  $old_image_name;
        }
    }
}
