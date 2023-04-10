<!DOCTYPE html>
<htm l lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app.css">

       <!-- <script src="/app.js"></script> -->
        <title>my blog</title>
   
</head>
<body>

    <article>
       <h1>
         {!!$post->title!!} 
        </h1>
        <p> 
        <a href="/categoris/{{$post->cat->slug}}"> {{$post->cat->name}} </a>
    </p>
       <p> 
        {!!$post->body!!} 
    </p>
    </article>

<a href="/posts">GoBack</a>
</body>
</html>