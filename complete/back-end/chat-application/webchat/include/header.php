<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> <?php echo TITLE;  ?> </title>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.css" rel="stylesheet" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script type="text/javascript" src="../assets/js/custom.js"></script>
  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- <link rel="stylesheet" href="public/css/font-awesome.min.css"> -->
</head>
<style>
  html,
  body {
    height: auto;
    width: 100%;
    margin: 0;
  }
</style>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <!-- Container wrapper -->
    <div class="container">
      <!-- Navbar brand -->
      <a class="navbar-brand " href="./">
        <img src="../assets/image/chat-logo.jpg" height="50" alt="MDB Logo" loading="lazy" style="margin-top: -1px;" />
      </a>

      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarButtonsExample">
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2">
          <li class="nav-item">
            <a class="nav-link" href="../login/">Global Chat</a>
          </li>
        </ul>
        <!-- Left links -->
        <!-- <img src="./public/image/avtar.webp" class="mx-3" alt="profile" width="50", height="100%"/> -->
        <!-- <a class="btn btn-success px-3" href="profile.php" role="button"> Setting  </i></a> -->
        <div class="d-flex align-items-center">
          <?php if (isset($_SESSION["isLogged"])) {
            echo '<button type="button" class="btn btn-success-secondary"> Welcome ' . $_SESSION['user_data']['user_name'] . ' DEAR </button>';
            echo '
  <div class="btn-group mx-2 pb-1">
  <img src="' . $_SESSION['user_data']['user_profile'] . '" class="rounded-circle img-fluid mx-3 mt-1" alt="profile" width="50", height="100%"/>
  <button
    type="button"
    class="btn btn-light btn-sm dropdown-toggle  dropdown-toggle-split"
    data-mdb-toggle="dropdown"
    aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="../profile/">Proifle</a></li>
    <li><a class="dropdown-item" href="../manage-pass/">Password Manager</a></li>
    <li><hr class="dropdown-divider" /></li>
    <li><a class="dropdown-item" href="../logout/">Logout</a></li>
  </ul>
</div>
';
          } else {
            echo '<button type="button" class="btn btn-link px-3 me-2">
              <a href="../login/"> Login</a>
            </button>
            <a href="../registration/"> <button type="button" class="btn btn-outline-success me-3">
                Sign up for free
              </button> </a>
              <a class="btn btn-dark px-3" href="https://github.com/dontKnew" role="button"><i class="fab fa-github"></i></a>';
          }
          ?>
        </div>
      </div>
      <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->