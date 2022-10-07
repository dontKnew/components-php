<?php
    require_once('../PHPMailer/mailer.php');

    if(isset($_REQUEST['submit'])){
        $mail = new Mailer();
        $mail-> smtp = "smtp.gmail.com";
        $mail->fromEmail = "neelam.globalheight@gmail.com";
        $mail->fromPassword = "kwcrhhijbidwpeds";
        $mail->fromName = $_POST['name'];
        $mail->toEmail = $_POST['email'];

        $mail->subject = $_POST['subject'];
        $mail->bodyHTML = $_POST['htmlmessage'];
        $mail->bodyText = $_POST['htmlmessage'];
        try {
            if($mail->sendMail()){
                $msg = "<div role='alert' class='alert alert-success mt-4 text-center'> Mail sent sccuessfully to ". $_POST['name']. " </div>";
            }else {
                $msg = "<div role='alert' class='alert alert-danger mt-4 text-center'>  Mail could not successfully </div>";
            }
        }catch (Exception $e){
            echo $e->getMessage();
            exit;
        }

    }
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>

<body class="m-5">
    <div class="container">
        <h1 class="text-danger text-center"> <u>-Send Mail-</u></h1>
        <?php if(isset($msg)){ echo $msg; }?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
             <div class="mb-4">
                <lable for="subject">HTML Message</lable>
                <textarea class="form-control" name="htmlmessage" aria-describedby="emailHelp" required></textarea>
                <div id="emailHelp" class="form-text">You can use also <span class="text-warning"> inline-style css </span> with html</div>
            </div>
            <div class="mb-3">
                <lable for="subject">Subject</lable>
                <input type="text" class="form-control"  name="subject" required>
            </div>
            <div class="mb-3">
                <lable for="name">Customer Name</lable>
                <input type="text" class="form-control"  name="name" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <lable for="name">Customer Email</lable>
                <input type="email" class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
