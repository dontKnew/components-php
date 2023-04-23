<?php
require_once "config.php";
try {
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST) && is_array($_POST)){

            $data =  array_map("trim",$_POST);
            $chat_session = $db->table('chat_session')->where("chat_id",$_COOKIE['chat_session'])->first();

            if(isset($chat_session->user_id)){
                $chat_message['chat_id'] = $chat_session->chat_id;
                $chat_message['user_id'] = $chat_session->user_id;
                $chat_message['receiver_id'] = $data['receiver_id'];
                $chat_message['message'] = $data['message'];
                $db->table('chat_message')->insert($chat_message);
                echo json_encode(array('status'=>200, "msg"=>"Chat Saved Successfully!"));
            }
        }else {
            echo json_encode(array('status'=>300, "msg"=>"ALl Fields are empty"));
        }
    }else {
        echo json_encode(array('status'=>300, "msg"=>"Invalid Requested Method"));
    }
    /*to remove an cookies*/
    //setcookie("chat_session", "", time() - 3600);

}catch (Exception $e){
    echo json_encode(array('status'=>500, "msg"=>"Error ".$e->getMessage()));
}

