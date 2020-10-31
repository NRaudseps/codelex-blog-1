<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <form action="/store" method="post">
        <input type="hidden" id="r" name="r" value="<?php echo $_GET['r']?>">
        <label for="name" style="display: block">Enter Name</label>
        <input type="text" name="name">
        <label for="email" style="display: block">Enter Your Email</label>
        <input type="email" name="email">
        <label for="password" style="display: block">Enter Your Password</label>
        <input type="password" name="password" minlength="3">
        <label for="passwordCheck" style="display: block">Enter Your Password Again</label>
        <input type="password" name="passwordCheck" minlength="3">
        <div style="display: block"></div>
        <button name="submit" type="submit">Submit</button>
    </form>
</body>
</html>