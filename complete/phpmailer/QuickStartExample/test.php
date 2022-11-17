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