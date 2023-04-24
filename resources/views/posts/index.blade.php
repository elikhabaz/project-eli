
<x-layout>
@include('posts._header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())    <!--if we have posts show that else we haven't any posts show <p>  -->       
        <x-gride-post :posts="$posts" />
        @endif
        {{$posts->Links()}}

    </main>

</x-layout>