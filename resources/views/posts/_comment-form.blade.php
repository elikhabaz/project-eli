
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
                                <textarea name="body" class="w-full text-sm" rows="5" placeholder="write in hear" required></textarea>
                                @error('body')
                                    {{$message}}
                                @enderror
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