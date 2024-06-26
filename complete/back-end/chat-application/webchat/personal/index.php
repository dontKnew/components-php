<?php
require_once('../database/UserClass.php');
require_once('../database/SecureChatClass.php');
require_once('../database/converter.php');
define('TITLE', 'Personal Chat');
if (!isset($_SESSION['isLogged'])) {
  header('location:../login/');
}

$user_object = new User;
$user_object->setUserId(trim($_GET['to_user_id']));
$user_data1 = $user_object->get_user_data_by_id_limit();

if(isset($_GET['to_user_id'])){
       if($_GET['to_user_id']==$_SESSION['user_data']['user_id']){
           header('location:../login/');
       }
}else {
  header('location:../group/');
}

$user_object = new User;
$user_data = $user_object->get_user_all_data();

$chat_object = new SecureChat;
$chat_object->setToUserId(trim($_GET['to_user_id']));
$chat_object->setFromUserId($_SESSION['user_data']['user_id']);
$chat_data = $chat_object->get_all_chat_data1();

$converter = new Converter();

?>
<?php include('../include/header.php'); ?>
<section style="background-color: #000;">
  <div class="container py-2">
    <div class="row d-flex justify-content-center">
    <!-- col start -->
      <div class="col-md-8 col-sm-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center p-3">
          <h5 class="mb-0"><?php echo $user_data1['user_name'] ?>'s chat </h5>
            <button type="button" class="btn btn-dark btn-sm" data-mdb-ripple-color="dark">
            <?php  /*if($user_data1['user_status']=="online"){
                    echo 'online <i class="fas fa-check-circle text-success"></i>';
                  }else {
                    echo 'offline <i class="fas fa-times-circle text-danger"></i>';
                  };*/?>
                <span class="user_status">
                    online <i class="fas fa-check-circle text-success"></i>
                </span>

            </button>
          </div>
          <div class="chat-body1 w-100 my-1" style="overflow-y:auto; height:450px; width:auto">
          <?php
            if (!empty($chat_data)) {
              foreach ($chat_data as $chat) {
              if ($chat['from_user_id']==$_SESSION['user_data']['user_id']) {
                $row_class = 'd-flex flex-row justify-content-end';
                $background_class = 'small p-2 me-2 mb-1 d-flex justify-content-end text-light rounded-3 bg-success';
                echo '<div class="' . $row_class . '">
                      <div>
                        <p class="' . $background_class . '">' . $chat['chat_msg'] . ' </p>
                        <p class="small me-2 mb-3 rounded-3 text-muted d-flex justify-content-end text-sm"><i> '.$converter->timeAgo($chat['timestamp']).'</i></p>
                      </div>
                      <img src="'. $chat['from_user_profile'].'"  class="rounded-circle mx-1" alt="avatar 1" style="width: 45px; height: 100%;">
                    </div>';
              } else  {
                $row_class = 'd-flex flex-row justify-content-start';
                $background_class = 'small p-2  me-2 mb-1 rounded-3 bg-danger text-light';
                echo '<div class="' . $row_class . '">
                        <img src="' . $chat['from_user_profile'] . '" alt="avatar 1" class="mx-1 rounded-circle" style="width: 45px; height: 100%;">
                      <div>
                        <p class="' . $background_class . '">' . $chat['chat_msg'] . ' </p>
                        <p class="small me-2 rounded-3 text-muted"> <i> '.$converter->timeAgo($chat['timestamp']).' </i></p>
                      </div>
                    </div>';
              }
              }
            } else {
              echo '
              <div class=" text-center mt-4 no-message1">
                    <h5 class="text-muted mt-4"> <i>Start Your Chat Now..</i> </h5>
                    <h6 class="text-secondary m-2"> Your`s messages will secured. <h6>
                </div>';
            }
            ?>
            <div id="chatBody1">
            </div>
          </div>
        </div>
        <div class="card-footer text-muted row">
          <div class=" col-12 d-flex justify-content-start align-items-center">
            <img src="<?php echo $_SESSION['user_data']['user_profile']; ?>" alt="avatar 3" style="width: 40px; height: 100%;">
            <input type="text" class="form-control form-control-lg message" id="exampleFormControlInput1" placeholder="Type message" required>
            <!-- <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a> -->
            <div class="attachment-file1 mx-2">
              <label class="attachment-file-label1" style="cursor: pointer;" for="attachmentFileInput1"><i class="fas fa-paperclip"></i></label>            
              <input type="file" class="attachment-file-input1 d-none"id="attachmentFileInput1" aria-describedby="attachmentFileInput1">
            </div>
            <span class="ms-3 text-muted"  id="toggle-emoji1" style="cursor: pointer;"><i class="fas fa-smile"></i></span>
            <span class="ms-3" id="send" style="cursor: pointer;"><i class="fas fa-paper-plane"></i></span>
          </div>
          <div class="col-12 p-3 pointer" id="emoji-picker1">
              <span class="mx-2" click="emojiValue(this)"  style="cursor: pointer;" data-emoji-id="128580" id="emojiValue"> &#128580; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="128579" id="emojiValue"> &#128579; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="128578" id="emojiValue"> &#128578; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="128577" id="emojiValue"> &#128577; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="128566" id="emojiValue"> &#128566; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="128564" id="emojiValue"> &#128564; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="128563" id="emojiValue"> &#128563; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="128561" id="emojiValue"> &#128561; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="128560" id="emojiValue"> &#128560; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="128558" id="emojiValue"> &#128558; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="129488" id="emojiValue"> &#129488; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="129497" id="emojiValue"> &#129497; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="129320" id="emojiValue"> &#129320; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="129312" id="emojiValue"> &#129312; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="129313" id="emojiValue"> &#129313; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="129296" id="emojiValue"> &#129296; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="129303" id="emojiValue"> &#129303; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="129301" id="emojiValue"> &#129301; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="129301" id="emojiValue"> &#129301; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="128586" id="emojiValue"> &#128586; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="128585" id="emojiValue"> &#128585; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="128584" id="emojiValue"> &#128584; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="128582" id="emojiValue"> &#128582; </span>
              <span class="mx-2" click="emojiValue(this)" style="cursor: pointer;" data-emoji-id="128581" id="emojiValue"> &#128581; </span>
          </div>
        </div>
      </div>
      <!-- col end  -->
      <!-- col start -->
    <div class="col-md-4 col-sm-12" style="overflow-y:auto; height:600px; width:auto">
        <h3 class="btn btn-secondary my-2 w-100">User List </h3>
        <?php foreach ($user_data as $user) { ?>
        <div class="card" style="border-radius: 15px;">
          <div class="card-body p-2">
            <div class="d-flex flex-column text-black">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <img src="<?php echo $user['user_profile'] ?>" alt="user-profile" class="img-fluid" style="width:100px; border-radius: 10px;">
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5 class="mb-1"><?php echo $user['user_name'] ?> </h5>
                  <?php  if($user['user_status']=="online"){
                    echo '<p class="small mb-1 text-success"> <strong> online <i class="fas fa-check-circle text-success"></i> </strong></p>';
                  }else {
                    echo '<p class="small mb-1 text-danger"> <strong> offline <i class="fas fa-times-circle"></i> </strong></p>';
                  };?>
                  <div class="d-flex justify-content-start rounded-3 p-1 mb-1" style="background-color: #efefef;">
                    <div>
                      <p class="small mb-1">Email : <span class='text-secondary'> <?php echo substr($user['user_email'], 0, 3); ?>******@gmail.com </span></p>
                      <p class="small mb-1">Phone : <span class='text-danger'> Not Available </span> </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex">
                 <?php if($user['user_id']==$_SESSION['user_data']['user_id']){
                    echo '<a href="#" class="btn btn-warning me-1 flex-grow-1"> You </a>';
                 }else { 
                  if(strtoupper($user['user_activation'])=="ENABLE"){
                    echo '<a href="../personal/?to_user_id='.$user['user_id'].'" target="blank" class="btn btn-outline-primary me-1 flex-grow-1"> Chat</a>';
                  }
                } 
                  if (strtoupper($user['user_activation']) == "ENABLE") {
                    echo '<a href="../user-profile/?id='.$user['user_id'].'" class="btn btn-primary flex-grow-1"> View-Profile </a>';
                        } else {
                          echo '<button type="button" class="btn btn-danger flex-grow-1"> Disabled </button>';
                        } ?>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>

      </div>  
    <!-- col end -->
    </div>

  </div>
  </div>
</section>
<script>
  $("document").ready(function() {
    var conn = new WebSocket('ws://localhost:8080?to_user_id=<?=$_GET['to_user_id']?>');
    conn.onopen = function(e) {
      console.log("Connection established!");
    };

    /*get client message*/
      conn.onmessage = function(e) {
      console.warn(e.data);
      var getData = jQuery.parseJSON(e.data);
      var html = '\
       <div class="d-flex flex-row justify-content-start">\
         <img src="' + getData.profile + '"\
           alt="avatar 1" style="width: 45px; height: 100%;" class="rounded-circle mx-1">\
         <div>\
         <p class="small p-2  me-2 mb-1 rounded-3 bg-danger text-light">' + getData.msg + '\
                </p>\
           <p class="small me-2 rounded-3 text-muted"><i> just now </i> </p>\
         </div>';
      jQuery('#chatBody1').append(html);
      $('.chat-body1').scrollTop($('.chat-body1')[0].scrollHeight);
    };
    /*end get client message*/

      /*insert ur message in DOM*/
        $('#send').click(function() {
          var msg = jQuery('.message').val();
          if(msg!==''){
            var content = {
              msg: msg,
              profile:"<?php echo $_SESSION['user_data']['user_profile'] ?>",
              from_user_id: "<?php echo $_SESSION['user_data']['user_id'] ?>",
              to_user_id: <?php echo trim($_GET['to_user_id']); ?>,
              chatType: "secure",
            };
            conn.send(JSON.stringify(content));
            var html = '<div class="d-flex flex-row justify-content-end new-message" >\
                    <div>\
                      <p class="small p-2 me-2 mb-1 text-white rounded-3 bg-success">' + msg + '\
                      </p>\
                      <p class="small me-2 mb-3 rounded-3 text-muted d-flex justify-content-end"><i> just now </i></p>\
                    </div>\
                    <img src="<?php echo $_SESSION['user_data']['user_profile'] ?>" class="rounded-circle mx-1"\
                      alt="avatar 1" style="width: 45px; height: 100%;">\
                  </div>';
            jQuery('#chatBody1').append(html);
            $('.message').val('');
            $('.chat-body1').scrollTop($('.chat-body1')[0].scrollHeight);
            $('.no-message1').remove();
          }
        });
        $('.chat-body1').scrollTop($('.chat-body1')[0].scrollHeight);
        $(document).keypress(function(event) {
          if (event.which == 13) {
              var msg = jQuery('.message').val();
              if(msg!==''){
                  var content = {
                      msg: msg,
                      profile:"<?php echo $_SESSION['user_data']['user_profile'] ?>",
                      from_user_id: "<?php echo $_SESSION['user_data']['user_id'] ?>",
                      to_user_id: <?php echo trim($_GET['to_user_id']); ?>,
                      chatType: "secure",
                  };
                  conn.send(JSON.stringify(content));
                  var html = '<div class="d-flex flex-row justify-content-end new-message" >\
                <div>\
                  <p class="small p-2 me-2 mb-1 text-white rounded-3 bg-success">' + msg + '\
                  </p>\
                  <p class="small me-2 mb-3 rounded-3 text-muted d-flex justify-content-end"><i> just now </i></p>\
                </div>\
                <img src="<?php echo $_SESSION['user_data']['user_profile'] ?>" class="rounded-circle mx-1"\
                  alt="avatar 1" style="width: 45px; height: 100%;">\
              </div>';
                  jQuery('#chatBody1').append(html);
                  $('.message').val('');
                  $('.chat-body1').scrollTop($('.chat-body1')[0].scrollHeight);
                  $('.no-message1').remove();
              }
          }
      });
      /*END insert ur message in DOM*/
  })
</script>
<?php include('../include/footer.php') ?>