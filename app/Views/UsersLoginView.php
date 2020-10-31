<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<form action="/login_check" method="post">
    <label for="email" style="display: block">Enter Your Email</label>
    <input type="email" name="email">
    <label for="password" style="display: block">Enter Your Password</label>
    <input type="password" name="password" minlength="3">
    <div style="display: block"></div>
    <button name="submit" type="submit">Submit</button>
</form>
</body>
</html>