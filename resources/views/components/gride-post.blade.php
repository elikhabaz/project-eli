@props(['posts'])

<x-single :post="$posts[0]" />

    <div class="lg:grid lg:grid-cols-6">
   
        @foreach($posts->skip(1) as $post)  <!--fetch all of the posts from phpmyadmin posts table-->

        <x-poststyle :post="$post" class="{{$loop->iteration<3 ? 'col-span-3':'col-span-2'}}"/>

        @endforeach

    </div>


