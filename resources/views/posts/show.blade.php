<x-layout>
<section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{$post->created_at->diffForHumans()}}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                        <h5 class="font-bold">
                                 <a href="/posts?author={{$post->author->username}}">{{$post->author->name}}</a>
                                </h5>
                            <h6>Mascot at Laracasts</h6>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="{{route('posts')}}"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>
                        <div class="space-x-2">
                            <x-cat-button :cat="$post->cat" />
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{$post->title}}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {{$post->body}}
                    </div>

                </div>
                <section class=" col-span-8 col-start-5  mt-10 space-y-10">
                    @auth 
                    <!-- یوزر تا زمانی که لاگین نباشه نمیتونه نظری رو درج کنه از auth استفاده کردم و در غیر این صورت براش لینک لاگین گذاشتم -->
                    <x-penal >
                     <form method="POST" action="/posts/{{$post->slug}}/comment" >
                        @csrf
                        <header calss="flex item-center">
                        <img src="https://i.pravatar.cc/40?u{{auth()->id()}}" width="40px" hight="40px" class="rounded-full">
                    
                            <h2 class="ml-4">
                                  want to participate?
                            </h2>
                        </header>
                            <div class="mt-8">
                                <textarea name="body" class="w-full text-sm" rows="5" placeholder="write in hear"></textarea>
                            </div>
                            <div class="flex justify-end mt10 border-t">
                                <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-xl hover:bg-blue-600">
                                    post
                                </button>
                            </div>
                        </form>
                        </x-penal>
                        @else
                        <div class="flex">
                        <p>
                            <a href="/login" class="px-3 py-1 border bg-purple-600 border-purple-300 rounded-full text-white text-xs uppercase font-semibold">please sign in to laracast</a>
                        </p>

                        <p class="ml-6">
                            <a href="/register" class="px-3 py-1 border bg-green-600 border-green-300 rounded-full text-white text-xs uppercase font-semibold">please sign up to laracast</a>
                        </p>
                        </div>
                        
                        @endauth

                       <!-- این پسی که باید بدی از سمت کامپوننت خیلی مهمه و همیشه باید مراقب باشی هست یا نه  -->
                           @foreach($post->comments as $comment)
                              <x-comment :comment="$comment"/>
                           @endforeach

                    </section>

</div>
            </article>
        </main>
    </section>
</x-layout>