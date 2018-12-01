<?php
require "vendor/wixel/gump/gump.class.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $validator = new GUMP('ru');

    $rules = array(
        'login' => 'required|alpha_numeric|max_len,100|min_len,6',
        'mail' => 'required|valid_email',
        'password' => 'required|max_len,100|min_len,6'
    );

    $validated = $validator -> validate($_POST, $rules);

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form action="index.php" method="post">
        <div class="form-group">
            <label for="exampleInputLogin">Login</label>
            <input name = "login" type="text" class="form-control" id="exampleInputLogin" aria-describedby="loginHelp" placeholder="Enter login">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input name = "mail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
    <div>
        <?php
    if ($validated === TRUE) {
    echo $_POST['login'] .' зарегистрирован';

    exit;
    } else {

       echo $validator->get_readable_errors(true);
    }
    ?>
    </div>
</body>
</html>