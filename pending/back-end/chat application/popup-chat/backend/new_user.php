<?php
require_once "config.php";
try {

    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST) && is_array($_POST)){
            $data = $_POST['userData'];
            $user_data = array_map("trim", $data);
            $isUserExists = $db->table('users')->where("email",$user_data['email'])->first();
            $user_id = null;
            $chat_id = null;
            if(!$isUserExists){
                unset($user_data['purpose']);
                $user_id = $db->table('users')->insertGetId($user_data);
                $chat_id = uniqid('chat_session_');

                $chat_session['user_id'] = $user_id;
                $chat_session['chat_id'] = $chat_id;
                $chat_session['purpose'] = trim($data['purpose']);
                $db->table('chat_session')->insert($chat_session);
                setcookie('chat_session', $chat_id, time()+60*60*24*30);
                echo json_encode(array('status'=>200, "msg"=>"New User Saved Successfully"));
            }else {

                $user_id = $isUserExists->id;
                $chat_session = $db->table('chat_session')->where("user_id",$user_id)->first();
                $chat_id = $chat_session->chat_id;
                setcookie('chat_session', $chat_id, time()+60*60*24*30);
                echo json_encode(array('status'=>200, "chat_session"=>$chat_id, "msg"=>"User Already Exists"));
            }
        }else {
            echo json_encode(array('status'=>200, "msg"=>"ALl Fields are empty"));
        }
    }else {
        echo json_encode(array('status'=>200, "msg"=>"Invalid Requested Method"));
    }
    /*to remove an cookies*/
    //setcookie("chat_session", "", time() - 3600);

}catch (Exception $e){
    echo json_encode(array('status'=>500, "msg"=>"Error ".$e->getMessage()));
}

