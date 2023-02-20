let paymentSessionId = "";
const paymentDom = document.getElementById("payment-form");
const success = function(data) {
    if (data.order && data.order.status == "PAID") {
        $.ajax({
            url: "checkstatus.php?order_id=" + data.order.orderId,
            success: function(result) {
                if (result.order_status == "PAID") {
                    alert("Order PAID");
                }
            },
        });
    } else {
        alert("Order is ACTIVE")
    }
}
let failure = function(data) {
    alert(`Error : ${data.order.errorText}`)
}
document.getElementById("pay-btn").addEventListener("click", () => {
    const dropConfig = {
        "components": [
            "order-details",
            "card",
            "upi"
            "netbanking",
            "app",
        ],
        "onSuccess": success,
        "onFailure": failure,
        "style": {
            "backgroundColor": "#ffffff",
            "color": "#11385b",
            "fontFamily": "Arial",
            "fontSize": "15px",
            "errorColor": "#ff0000",
            "theme": "light", //(or dark)
        }
    }
    if (paymentSessionId == "") {
        $.ajax({
            url: "fetchtoken.php",
            success: function(result) {
                paymentSessionId = result["payment_session_id"];
                const cashfree = new Cashfree(paymentSessionId);
                cashfree.drop(paymentDom, dropConfig);
            },
        });
    } else {
        const cashfree = new Cashfree(paymentSessionId);
        cashfree.drop(paymentDom, dropConfig);
    }

})

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