<?php
$name_error = $email_error = $phone_error = $message_err =   "";
$phone = $name = $email= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $name_error = "please enter your name";
    } else {
        $name = $_POST["name"];
        echo $name;
        if(!preg_match("/^[a-zA-Z ]*$/", $name)){
            $name_error ="only letter and space allowed";
        }
    }

    echo "<br>";
    if (empty($_POST["email"])) {
        $email_error = "please enter your email";
    }else {
       $email = $_POST["email"];
        echo $email;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL )){
           $email_error ="invalid email formate";
        }
    }

    echo "<br>";
    if (empty($_POST["phone"])) {
        $phone_error = "please enter your phone number";
    } else {
        $phone = $_POST["phone"];
        echo $phone;
        $pret="/^[0-9]*$/";
        if (!preg_match($pret, $phone)) {
            $phone_error = "only digit are allowd";
        }
    }

    echo "<br>";

    if (empty($_POST["message"])) {
        $message_err = "please enter your message deta";
    }


    $target = "image/";
    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

    $folder = "image/";
    $path = $folder . $_FILES["profile_img"]["name"];
    $temp = $_FILES["profile_img"]["tmp_name"];


    if ($_FILES["profile_img"]["size"] < 1024000) {
        move_uploaded_file($temp, $path);
    } else {
        echo "<h2>file size should be less than 1MB</h2>";
    }
}


?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>form </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <div class="container">
           
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
            </div>
            <span class="text-danger"> <?php echo $name_error   ?> </span>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <span class="text-danger"> <?php echo $email_error   ?> </span>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="phone" class="form-control" name="phone" id="phone">
            </div>
            <span class="text-danger"> <?php echo $phone_error   ?> </span>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
            </div>
            <span class="text-danger"> <?php echo $message_err   ?> </span>
            <div class="mb-3">
                <label for="profile_img" class="form-label">Ressume</label>
                <input type="file" class="form-control" name="profile_img" id="profile_img">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>