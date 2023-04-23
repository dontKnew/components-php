<?php
require_once "config.php";
try {

    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['action'])){
            if($_POST['action']=="user_message"){
                $data =  array_map("trim",$_POST);
                $chat_id = $_COOKIE['chat_session'];
                $chat_session = $db->table('chat_session')->where("chat_id",$_COOKIE['chat_session'])->first();
                $data['chat_session_id'] = $chat_session->id;
                unset($data['action']);
                $result = $db->table("chat_message")->insert($data);
                if($result){
                    echo json_encode(array('status'=>200, "msg"=>"Chat Saved Successfully!"));
                }else {
                    echo json_encode(array('status'=>500, "msg"=>"message could not saved"));
                }

            }else if($_POST['action']=="admin_message"){
                if(isset($_SESSION['isLogged'])){
                    $data = array_map("trim", $_POST);
                    $chat_session = $db->table('chat_session')->where("chat_id",$data['chat_id'])->first();

                    $db->table('chat_session')->where("chat_id",$data['chat_id'])
                        ->update(array("receiver_id"=>$_SESSION['id']));

                    $chat_message = array("chat_session_id"=>$chat_session->id, "message"=>$data['message'], "sender"=>"admin");
                    $result = $db->table("chat_message")->insert($chat_message);
                    if($result){
                        echo json_encode(array('status'=>200, "msg"=>"Chat Saved Successfully!"));
                    }else {
                        echo json_encode(array('status'=>500, "msg"=>"message could not saved"));
                    }
                }else {
                    echo json_encode(array('status'=>300, "msg"=>"Permission Denied"));
                }
            }
        }else {
            echo json_encode(array('status'=>300, "msg"=>"Action method not found"));
        }
    }else {
        echo json_encode(array('status'=>300, "msg"=>"Invalid Requested Method"));
    }
    /*to remove an cookies*/
    //setcookie("chat_session", "", time() - 3600);

}catch (Exception $e){
    echo json_encode(array('status'=>500, "msg"=>"Error ".$e->getMessage()));
}

