<center><h1>Please do not refresh this page...</h1></center>
<form method="post" action="<?=cn("add_funds/paytmqr/complete")?>" name="f1">
  <table border="1">
    <tbody>
    <input type="hidden" name="uid" value="<?php echo $uid?>">
    
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
    </tbody>
  </table>
  <script type="text/javascript">
    document.f1.submit();
  </script>
</form>