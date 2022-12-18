<?php

class PDFChecker {
    
    public function isProtected($uploadedfilename, $path="upload/awd_kyc/"){
        try {
            $filename= $path. $uploadedfilename; 
            if(file_exists($filename)){
                $handle = fopen($filename, "r");
                $contents = fread($handle, filesize($filename));
                fclose($handle);
                if (stristr($contents, "/Encrypt"))
                      {
                            $_SESSION['failure'] = 'Please upload pdf file without password';
                            header('Location: add_awb.php?id='.$_GET['id'].'#kyc');
                            return false;
                            exit;
                          
                      }
                      {return true;}
            }else {
                $_SESSION['failure'] = 'Please upload pdf file without password';
                header('Location: add_awb.php?id='.$_GET['id'].'#kyc');
                return false;
                exit;
            }
        }catch(Exception $e){
            $error =  $e-getMessage();
            $_SESSION['failure'] = "Error ".$error;
            header('Location: add_awb.php?id='.$_GET['id'].'#kyc');
            return false;
            exit;
        }
        
    }

}
#Example : 
    
    // $pdf = new PDFChecker();
    // if($pdf->isProtected("1656669722_56_2_NK JHA PAN CARD.pdf")){   
    //     echo "FINE";
    // }else {
    //     echo "Not Fine";
    // }

?>