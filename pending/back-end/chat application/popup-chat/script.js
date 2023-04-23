$(function(){

    $('.floating-chat').click(function(){ $(this).closest('.chatbox').toggleClass('chatbox-min');});
    $('.chatbox-holder').hide();
    $('.floating-chat').click(function(){
        $(this).fadeOut(-500);
        $('.chatbox-holder').fadeIn();
    });
    $('.fa-minus').click(function(){
        $(".floating-chat").fadeIn();
        $('.chatbox-holder').fadeOut(-500);
    });
    $('.floating-chat').click();
    chat_session();

    setInterval(function (){
        getData();
    },2000);

});
let isChatSessionExists = false;
let isAdmin = false;
$(document).keypress(function(event) {
    if(event.which == 13) {
        console.warn(isAdmin);
        if(isChatSessionExists || isAdmin){
            send_message();
        }else {
            save_user();
        }
    }
});
let userData = {};

$("#send_message").click(function(){
    if(isChatSessionExists || isAdmin){
        send_message();
    }else {
        save_user();
    }
});

function send_message(){
    let message = $("#message").val();
    $("#message").val("");
    userMessage(message);

    let requestData  = {"message":message, "action":"user_message"};
    if(isAdmin){
        requestData  = {"message":message, "action":"admin_message", "chat_id":getUrlVar('chat_id')};
    }
    $.ajax({
        url: "http://localhost:1111/backend/chat_message.php",
        type: "post",
        xhrFields: {
            withCredentials: true
        },
        data:requestData,
        success: function(response) {
            let data = JSON.parse(response);
            console.warn(`click button sent response ` + response);
        },
        error:function(err){
            console.warn(err);
            adminMessage("frontend Request could not sent");
        }
    });
}

function save_user(){
    let message = $("#message").val();
    if(message !==''){
        if(Object.keys(userData).length == 0){
            userMessage(message);
            if(isNameValid(message)){
                userData["name"] = message;
                adminMessage("Enter Phone Number : ");
            }else {
                adminMessage("Please enter valid name ");
            }
        }else if(Object.keys(userData).length == 1){
            userMessage(message);
            if(isPhoneNumberValid(message)){
                userData["phone_no"] = message;
                adminMessage("Enter Email Address : ");
            }else {
                adminMessage("Please enter 10 digit valid phone number ");
            }
        }else if(Object.keys(userData).length == 2){
            userMessage(message);
            if(isEmailValid(message)){
                userData["email"] = message;
                adminMessage(`What is the purpose of this chat ? `);
            }else {
                adminMessage(`Please enter valid email address ? `);
            }
        }else if(Object.keys(userData).length == 3){
            userData["purpose"] = message;
            userMessage(message);
            adminMessage(`Thank you <b> ${userData['name']} </b> for connecting us, Our Agent will connect within 1-5mints. Please stay active`);
        }else {
            userMessage(message);
            adminMessage(`Thank you so much <strong> ${userData['name']} </strong> for your patience  :), <br> Please wait...`);
        }
        $("#message").val("");
    }
    if(Object.keys(userData).length == 4){
        $.ajax({
            url: "http://localhost:1111/backend/new_user.php",
            type: "post",
            xhrFields: {
                withCredentials: true
            },
            data:{userData},
            success: function(response) {
                let data = JSON.parse(response);
                if(data.status==200){
                    userData = {};
                    isChatSessionExists = true;
                }else {
                    console.warn("server response !==200 "+response);
                }
            },
            error:function(err){
                console.warn(err);
                adminMessage("frontend Request could not sent");
            }
        });
    }else {
        console.warn("not complete yet user data");
    }

}
function chat_session(){
    $.ajax({
        url: "http://localhost:1111/backend/chat_session.php?action=chat_data&chat_id="+getUrlVar("chat_id"),
        type: "get",
        xhrFields: {
            withCredentials: true
        },
        success: function(response) {
            let data = JSON.parse(response);
            if(data.status==200 ){
                if(!data.isAdmin){
                    $(".chat-messages").html("")
                }else {
                    isAdmin = data.isAdmin;
                }
                isChatSessionExists = true;

                /*display old data & chat data*/
                for(let i=0; i < data['data'].length; i++){

                    if(!data.isAdmin){
                        if(data['data'][i]['sender']==="user"){
                            userMessage(data['data'][i]['message'], false);
                        }else {
                            adminMessage(data['data'][i]['message'], false);
                        }
                    }else {
                        if(data['data'][i]['sender']==="user"){
                            adminMessage(data['data'][i]['message'], false, data['data'][i]['user_name']);
                        }else {
                            userMessage(data['data'][i]['message'], false);
                        }
                    }
                }
                $(".chat-messages").scrollTop($(".chat-messages")[0].scrollHeight);
            }else {
                console.warn("server response !==200 "+response);
                if(!data.isAdmin){
                    $(".fa-trash").hide();
                    adminMessage("I need some information about you, before continue chat with our agent!");
                    let clearWritten = setInterval(function(){
                        if(isWritten){
                            adminMessage("Enter Your Name : ");
                            clearInterval(clearWritten);
                        }
                    },200);
                }else {
                    isAdmin = data.isAdmin;
                }
            }
        }
    });
}
function getData(){
    let sender = "admin";
    if(isAdmin){
        sender = "user";
    }
    if(getCookie("chat_session")!==undefined || getUrlVar("chat_id")!==""){
        $.ajax({
            url: "http://localhost:1111/backend/chat_session.php?action=real_time_data&sender="+sender+"&chat_id="+getUrlVar("chat_id"),
            type: "get",
            xhrFields: {
                withCredentials: true
            },
            success: function(response) {
                let data = JSON.parse(response);
                console.warn(data['data'].length);
                if(data.status==200){
                    for(let i=0; i < data['data'].length; i++){
                        if(sender=="user"){
                            console.warn("fetched user msg to send admin chat box");
                            adminMessage(data['data'][i]['message'], true, data['data'][i]['user_name']);
                        }else {
                            console.warn("fetched admin msg to send user chat box");
                            adminMessage(data['data'][i]['message'], true);
                        }
                    }
                }else {
                    console.warn("server response !==200 "+response);
                    adminMessage("Something is wrong, Please try again later");
                }
            }
        });
    }else {
        // adminMessage("Your session is not started yet!");
    }
}

$(".fa-trash").click(function(){
    if(getCookie("chat_session")!==undefined){
        $.ajax({
            url: "http://localhost:1111/backend/chat_session.php?action=remove_session",
            type: "get",
            xhrFields: {
                withCredentials: true
            },
            success: function(response) {
                let data = JSON.parse(response);
                if(data.status==200){
                    $(".chat-messages").html("");
                    adminMessage("Conversation has been cleared");
                    setTimeout(function (){
                        window.location.reload();
                    },2000);
                }else {
                    console.warn("server response !==200 "+response);
                    adminMessage("Something is wrong, Please try again later");
                }
            }
        });
    }else {
        adminMessage("Your session is not started yet!");
    }
})
/*common function*/
    function userMessage(message, scrolling=true) {
        if(scrolling){
            let new_message = $(`\n
                            <div class="message-box-holder">\n
                                <div class="message-box">\n
                                    ${message}\n
                                </div>\n
                            </div>`);
            $(".chat-messages").append(new_message);
            new_message.hide();
            new_message.fadeIn();
            $(".chat-messages").animate({
                scrollTop: $(".chat-messages")[0].scrollHeight
            }, 'fast');
        }else{
            let new_message = $(`\n
                            <div class="message-box-holder">\n
                                <div class="message-box">\n
                                    ${message}\n
                                </div>\n
                            </div>`);
            $(".chat-messages").append(new_message);
        }
    };

    let isWritten = false;
    function adminMessage(message, scrolling=true, by="Admin"){
        if(scrolling){
            let new_message = $(`\n
                        <div class="message-box-holder">\n
                            <div class="message-sender">\n
                            ${by}\n
                            </div>\n
                            <div class="message-box message-partner">\n
                                \n
                            </div>\n
                        </div>`);
            $(".chat-messages").append(new_message);
                let typingText = message;
                let currentText = '';
                let i = 0;
                let intervalId = setInterval(function(){
                    if(i < typingText.length){
                        currentText += typingText[i];
                        new_message.find(".message-box.message-partner").html(`${currentText}`);
                        i++;
                    }else {
                        $("#send_message").removeAttr("disabled");
                        isWritten = true;
                        clearInterval(intervalId);
                    }
                }, 50);
            $(".chat-messages").animate({ scrollTop: $(".chat-messages")[0].scrollHeight }, 'fast');
        }else{
            let new_message = $(`\n
                        <div class="message-box-holder">\n
                            <div class="message-sender">\n
                            ${by}\n
                            </div>\n
                            <div class="message-box message-partner">\n
                               ${message} \n
                            </div>\n
                        </div>`);
            $(".chat-messages").append(new_message);
        }
    }

    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
    }
    function isNameValid(name) {
        var pattern = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
        return pattern.test(name);
    }
    function isPhoneNumberValid(phone) {
        var pattern = /^[0-9]{10}$/;
        return pattern.test(phone);
    }
    function isEmailValid(email) {
        var pattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
        return pattern.test(email);
    }
    function getUrlVar(key){
        var result = new RegExp(key + "=([^&]*)", "i").exec(window.location.search);
        return result && unescape(result[1]) || "";
    }

