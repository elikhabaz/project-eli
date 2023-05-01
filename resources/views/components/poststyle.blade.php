@props(['post'])
<!-- $attributes ویژگی های تعریف شده را با هم میکس میکند (این یک شی است) -->
<article
    {{$attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl'])}}>
    <div class="py-6 px-5">
        <div>
                            <img src="{{ asset('storage/'.$post->img) }}" alt="Blog Post illustration" class="rounded-xl">
                        </div>

                        <div class="mt-8 flex flex-col justify-between">
                            <header>
                                <div class="space-x-2">
                                <x-cat-button :cat="$post->cat" />

                                    <a href="#"
                                       class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold"
                                       style="font-size: 10px">Updates</a>
                                </div>

                                <div class="mt-4">
                                    <h1 class="text-3xl">
                                    <a href="/posts/{{$post->slug}}">{{ $post->title }}</a>

                                    </h1>

                                    <span class="mt-2 block text-gray-400 text-xs">
                                        Published <time>{{$post->created_at->diffForHumans()}}</time><!--برای تعریف زمان از این استفاده میشود(آخرین تغییرات را تایمش را بر میگرداند) -->
                                    </span>
                                </div>
                            </header>

                            <div class="text-sm mt-4">
                                {{ $post->excerpt }}

                                <p class="mt-4">
                                    {{$post->body}}
                            </p>
                            </div>

                            <footer class="flex justify-between items-center mt-8">
                                <div class="flex items-center text-sm">
                                    <img src="./images/lary-avatar.svg" alt="Lary avatar">
                                    <div class="ml-3">
                                        <h5 class="font-bold">
                                            <a href="/?author={{$post->author->username}}">{{$post->author->name}}</a></h5>
                                        
                                    </div>
                                </div>

                                <div>
                                    <a href="/posts/{{$post->slug}}"
                                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                                    >Read More2</a>
                                </div>
                            </footer>
                        </div>
                    </div>
                </article>
