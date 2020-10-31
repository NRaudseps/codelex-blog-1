<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Article</title>
</head>
<body>
    <h1>Create Article</h1>
    <form action="/articles/store" method="post">
        <label for="title" style="display: block">Title</label>
        <textarea name="title" rows="1" cols="25"></textarea>
        <div style="height: 40px;"></div>
        <label for="content" style="display: block">Content</label>
        <textarea name="content" rows="5" cols="50"></textarea>
        <div style="height: 20px;"></div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>