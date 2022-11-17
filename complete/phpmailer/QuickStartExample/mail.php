<!--SEDN CONTACT FORM REQEUST-->
	<script>
	   // Send AJAX POST request with JavaScript (Insert new record)
        function sendEmail() {  
        
          var name = document.getElementById('name').value;
          var email = document.getElementById('email').value;
          var phone = document.getElementById('phone').value;
          var message = document.getElementById('message').value;
          var sendBtn = document.getElementById('sendBtn');
          sendBtn.innerHTML = "Sending...";
        
          if(name != '' && email !='' && phone != '' && message != ''){
        
             var data = {name: name, email: email, phone: phone, message: message};
             var xhttp = new XMLHttpRequest();
             // Set POST method and ajax file path
             xhttp.open("POST", "include/sendmail.php", true);
             
             // call on request changes state
             xhttp.onreadystatechange = function() {
                 
               if (this.readyState == 4 && this.status == 200) {
                 
                 var response = this.responseText;
                 var response = JSON.parse(this.responseText);
                 sendBtn.innerHTML = "Sent";
                 
                 if(response.status == 200){
                     document.getElementById('server_response').innerHTML += '<span class="alert alert-warning ">Thanks for Information, We`ll contact you soon as possible!</span>';
                 }else if(response.status == 404) {
                     document.getElementById('server_response').innerHTML = '<span class="alert alert-danger ">Error - ' + response.message + ' </span>';
                     console.warn("Something Wrong " + response);
                 }else {
                     document.getElementById('server_response').innerHTML = '<span class="alert alert-danger ">Something is Wrong, Please try again later!</span>';
                     console.warn(this.responseText);
                 }
                  setTimeout(function(){
                      document.getElementById('server_response').innerHTML = '';
                      sendBtn.innerHTML ="Send";
                  },3000)
               }
             };
        
             // Content-type
             xhttp.setRequestHeader("Content-Type", "application/json");
             // Send request with data
             xhttp.send(JSON.stringify(data));
          }else {
              document.getElementById('server_response').innerHTML = '<span class="alert alert-danger ">All fields are requried</span>';
              setTimeout(function(){
                      document.getElementById('server_response').innerHTML = '';
                      sendBtn.innerHTML ="Send";
                  },3000)
          }
        }
	</script>

<?php
require_once('library/PHPMailer/mailer.php');
try {
     $data = json_decode(file_get_contents("php://input"));
     
     $_POST['name'] =  $data->name;
     $_POST['message'] =  $data->message;
     $_POST['email'] =  $data->email;
     $_POST['phone'] =  $data->phone;
    
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) && isset($_POST['phone'])){
        $_POST = array_map("trim", $_POST);
        $messageBody = '<table style="width:55%;margin:0 auto;text-align:left;border-collapse:collapse">
                        <thead>
                        <tr>
                        <td colspan="2" style="background-color:#fd7e14;text-align:center;padding:10px;color:white;border:1px solid grey;font-weight:800;font-size:20px">Mauliuniform Enquiry Details </td>
                        </tr>
                        <tr style="padding:10px">
                            <th style="border:1px solid grey;padding:10px">NAME </th>
                            <td style="border:1px solid grey;padding:10px">'.ucwords(strtolower($_POST['name'])).'</td>
                        </tr>
                    
                        <tr style="padding:10px">
                            <th style="border:1px solid grey;padding:10px">EMAIL </th>
                            <td style="border:1px solid grey;padding:10px"><a href="mailto:'.strtolower($_POST['email']).'" target="_blank" title="click to send email">'.strtolower($_POST['email']).'</a></td>
                        </tr>
                    
                        <tr style="padding:10px">
                            <th style="border:1px solid grey;padding:10px"> PHONE NUMBER </th>
                            <td style="border:1px solid grey;padding:10px">'.$_POST['phone'].'</td>
                        </tr>
                        <tr style="padding:10px">
                            <th style="border:1px solid grey;padding:10px"> MESSAGE </th>
                            <td style="border:1px solid grey;padding:10px">'.$_POST['message'].'</td>
                        </tr>
                        </thead>
                    </table>';
        $mail = new Mailer();
        $mail-> smtp = "smtp.gmail.com";
        $mail->fromEmail = "sajid.globalheight@gmail.com";
        $mail->fromPassword = "hzbagjenqonfkvlb";
        $mail->fromName = "Do Not Reply";
        $mail->toEmail = "mauli27enterprises@gmail.com ";

        $mail->subject = "Mauliuniform Enquiry Information";
        $mail->bodyHTML  = $messageBody;
        $mail->bodyText =  $messageBody;
        $mail->debug = "false";
        try {
            if($mail->sendMail()){
                echo json_encode(array("status"=>200, "message"=>"Mail sent successfully"));
                exit;
            }else {
                echo json_encode(array("status"=>404, "message"=>"Mail could not sent, Please try again later!"));
                exit;
            }
        }catch (Exception $e){
            echo json_encode(array("status"=>404, "message"=>$e->getMessage()));
            exit;
        }

    }else {
        echo json_encode(array("status"=>404, "message"=>"All fields are required to send mail"));
    }   
}catch(Exception $e){
    echo json_encode(array("status"=>404, "message"=>$e->getMessage()));
    exit;
}
?>