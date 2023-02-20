<?php
require_once "config.php";
try {
//    setcookie("chat_session", "chat_session_63d607461da0e", time()+60*60*24*30);
//    exit;

    if(isset($_GET['action'])){
        $isAdmin = false;
        if(isset($_SESSION['isLogged'])){
            $isAdmin = true;
        }
        if($_GET['action']=="chat_data" || $_GET['action']=="real_time_data"){

                if(isset($_SESSION['isLogged'])){
                    $chat_session_id = $_GET['chat_id'];
                }else if(isset($_COOKIE['chat_session'])) {
                    $chat_session_id = $_COOKIE['chat_session'];
                }else {
                    echo json_encode(array('status'=>400, "msg"=>"Could not get chat session id", "isAdmin"=>$isAdmin));
                    exit;
                }
                if($_GET['action']=="real_time_data"){
                    $chat_data = $db->table('chat_message')
                        ->select('chat_message.id as chat_message_id', 'chat_message.message as message', 'users.name as user_name', 'chat_message.sender as sender', 'chat_session.chat_id as chat_session_id')
                        ->join('chat_session', 'chat_session.id', '=', 'chat_message.chat_session_id', "left")
                        ->join('users', 'users.id', '=', 'chat_session.user_id', "left")
                        ->where('chat_session.chat_id', $chat_session_id)
                        ->where('chat_message.sender', $_GET['sender'])
                        ->where('chat_message.created_at', '>=', date("Y-m-d H:i:s", strtotime("-1 seconds")))
                        ->get();
                }else {
                    $chat_data = $db->table('chat_message')
                        ->select('chat_message.id as chat_message_id', 'chat_message.message as message', 'users.name as user_name', 'chat_message.sender as sender', 'chat_session.chat_id as chat_session_id')
                        ->join('chat_session', 'chat_session.id', '=', 'chat_message.chat_session_id', "left")
                        ->join('users', 'users.id', '=', 'chat_session.user_id', "left")
                        ->where('chat_session.chat_id', $chat_session_id)
                        ->get();
                }
                if($chat_data){
                    echo json_encode(array('status'=>200, "isAdmin"=>$isAdmin, "data"=>$chat_data));
                }else {
                    echo json_encode(array('status'=>400,   "msg"=>"Chat session not found", "isAdmin"=>$isAdmin));
                }

        }else if($_GET['action']=="remove_session"){
            setcookie("chat_session", "", time() - 3600);
            unset($_COOKIE['chat_session']);
            echo json_encode(array('status'=>200, "msg"=>"Chat session has been removed", "isAdmin"=>$isAdmin));
        }else {
            echo json_encode(array('status'=>500, "msg"=>"Invalid action method", "isAdmin"=>$isAdmin));
        }
    }else {
        echo json_encode(array('status'=>500, "msg"=>"Invalid requested method"));
    }
}catch (Exception $e){
    echo json_encode(array('status'=>500, "msg"=>"Error ".$e->getMessage()));
}

