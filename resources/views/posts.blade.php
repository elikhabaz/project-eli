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
    

@foreach($posts as $post) 
    <article>
        <h1><a href="/posts/{{$post->slug}} ">            
       {!!$post->title!!} 
    </a>
</h1>
    <p> 
        <a href="#"> {{$post->cat->name}} </a>
    </p>
        <p>
           {!!$post->body!!} 
        </p>
    </article>
@endforeach 
</body>
</html>