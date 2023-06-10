<?php
    // include here config.php
require_once('config.php');

// Create login URl
$instURL = "https://api.instagram.com/oauth/authorize/?client_id=" . INSTAGRAM_CLIENT_ID . "&redirect_uri=" . urlencode(INSTAGRAM_REDIRECT_URI) . "&response_type=code&scope=basic";
?>
<html>
<head>
  <title>Login with Instagram</title>
</head>

<body>
	<a href="<?php echo $instURL; ?>">Login with Instagram</a>
</body>

</html>      
