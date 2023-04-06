<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app.css">
    <!-- <script src="/app.js"></script> -->
    <title>my blog</title>

</head>
<body>
<?php foreach($posts as $post) : ?>
    <article>
        <h1><a href="/posts/{{$post->id}} ">            
       {{$post->title}} 
    </a>
</h1>
        <p>
           {{$post->body}} 
        </p>
    </article>
<?php endforeach ?>
</body>
</html>