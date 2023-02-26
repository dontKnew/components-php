/*Email validation code*/
function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}
/*Email validation code end*/
/* customers modal start*/
$(".add_customer").click(function(e){
	var base_url=$("#base_url").val().trim();
    //Initially flag set true
    var flag=true;
    function check_field(id){
	  if(!$("#"+id).val().trim() ) //Also check Others????
	    {

	        $('#'+id+'_msg').fadeIn(200).show().html('Required Field').addClass('required');
	        $('#'+id).css({'background-color' : '#E8E2E9'});
	        flag= false;
	    }
	    else
	    {
	         $('#'+id+'_msg').fadeOut(200).hide();
	         $('#'+id).css({'background-color' : '#FFFFFF'});    //White color
	    }
	}
    //Validate Input box or selection box should not be blank or empty
	check_field("customer_name");
	//check_field("state");
	
	
    if(flag==false)
    {
		toastr["warning"]("You have Missed Something to Fillup!");
		return;
    }
    var email=$("#email").val().trim();
    if (email!='' && !validateEmail(email)) {
            $("#email_msg").html("Invalid Email!").show();
             //flag=false;
             toastr["warning"]("Please Enter valid Email ID.")
			return;
        }
        else{
        	$("#email_msg").html("Invalid Email!").hide();
        }
    var this_id=this.id;

    

			if(confirm("Are you Sure ?")){
				e.preventDefault();
				data = new FormData($('#customer-form')[0]);//form name
				/*Check XSS Code*/
				if(!xss_validation(data)){ return false; }
				
				$(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
				$("#"+this_id).attr('disabled',true);  //Enable Save or Update button
				$.ajax({
				type: 'POST',
				url: base_url+'pos/newcustomer',
				data: data,
				cache: false,
				contentType: false,
				processData: false,
				success: function(result){
      				//alert(result);//return;
      				var data = jQuery.parseJSON(result);
					if(data.result=="success")
					{   
						$('#customer-modal').modal('toggle');
					   	var newOption = '<option value='+data.id+' selected>'+data.customer_name+'</option>';
					    $('#customer_id').append(newOption).trigger('change');
					    //$("#amount").val(data.advance);
					     $('#customer-form')[0].reset();
					     toastr["success"]("New Customer Added!!");
					    success.currentTime = 0;
						success.play();
					}
					else if(data.result=="failed")
					{
					   toastr["error"]("Sorry! Failed to save Record.Try again!");
					   failed.currentTime = 0;
						failed.play();
					}
					else
					{
					   toastr["error"](data.result);
					   failed.currentTime = 0;
						failed.play();
					}
					$("#"+this_id).attr('disabled',false);  //Enable Save or Update button
					$(".overlay").remove();

			   }
			   });
		} //confirmation sure
		

		//e.preventDefault
});
/* customers modal end */

/* Suppliers modals start*/
$(".add_supplier").click(function(e){
	var base_url=$("#base_url").val().trim();
    //Initially flag set true
    var flag=true;
    function check_field(id){
	  if(!$("#"+id).val().trim() ) //Also check Others????
	    {

	        $('#'+id+'_msg').fadeIn(200).show().html('Required Field').addClass('required');
	        $('#'+id).css({'background-color' : '#E8E2E9'});
	        flag= false;
	    }
	    else
	    {
	         $('#'+id+'_msg').fadeOut(200).hide();
	         $('#'+id).css({'background-color' : '#FFFFFF'});    //White color
	    }
	}
    //Validate Input box or selection box should not be blank or empty
	check_field("supplier_name");
	//check_field("state");
	
	
    if(flag==false)
    {
		toastr["warning"]("You have Missed Something to Fillup!");
		return;
    }
    var email=$("#email").val().trim();
    if (email!='' && !validateEmail(email)) {
            $("#email_msg").html("Invalid Email!").show();
             //flag=false;
             toastr["warning"]("Please Enter valid Email ID.")
			return;
        }
        else{
        	$("#email_msg").html("Invalid Email!").hide();
        }
    var this_id=this.id;

    

			if(confirm("Are you Sure ?")){
				
				e.preventDefault();
				data = new FormData($('#supplier-form')[0]);//form name
				/*Check XSS Code*/
				if(!xss_validation(data)){ return false; }
				
				$(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
				$("#"+this_id).attr('disabled',true);  //Enable Save or Update button
				$.ajax({
				type: 'POST',
				url: base_url+'purchase/newsupplier',
				data: data,
				cache: false,
				contentType: false,
				processData: false,
				success: function(result){
      				//alert(result);//return;
      				var data = jQuery.parseJSON(result);
					if(data.result=="success")
					{   
						$('#supplier-modal').modal('toggle');
					   	var newOption = '<option value='+data.id+' selected>'+data.supplier_name+'</option>';
					    $('#supplier_id').append(newOption).trigger('change');
					    //$("#amount").val(data.advance);
					     $('#supplier-form')[0].reset();
					     toastr["success"]("New supplier Added!!");
					    success.currentTime = 0;
						success.play();
					}
					else if(data.result=="failed")
					{
					   toastr["error"]("Sorry! Failed to save Record.Try again!");
					   failed.currentTime = 0;
						failed.play();
					}
					else
					{
					   toastr["error"](data.result);
					   failed.currentTime = 0;
						failed.play();
					}
					$("#"+this_id).attr('disabled',false);  //Enable Save or Update button
					$(".overlay").remove();

			   }
			   });
		} //confirmation sure
		

		//e.preventDefault
});
/* Suppliers modal end*/