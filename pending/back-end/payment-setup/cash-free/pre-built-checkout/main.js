$("#customer_form").submit(function(e){
    e.preventDefault();
    $("#submit_btn").val("Please Wait");
    var formData = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "fetchtoken.php",
        data: formData,
        success: function(data){
            try {
                let response = JSON.parse(data);
                if(response.payment_session_id!==""){
                    paymentSessionId = response.payment_session_id;
                    $("#pay-btn").trigger("click");
                    $("#customer_form")[0].reset();
                    $("#submit_btn").val("Redirecting...");
                    setTimeout(function(){
                        $("#customer_form").fadeOut();
                        const cashfree = new Cashfree(response.payment_session_id);
                        cashfree.redirect();
                    },3000);
                }
            }catch(err){
                $("#submit_btn").val("Submit");
                console.warn("Error "+err);
                $(".noti_msg").html(`<div class="col-md-12 text-center">\
                        <div class="alert alert-danger">Server Side Something Wrong, Please try again later!</div>\
                    </div>`);
            }
        }
    });
});