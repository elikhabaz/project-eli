                    
@props(['comment'])
                    
                    <article class="flex  p-6 bg-purple-100 rounded-xl space-x-4">
                        <div class="flex-shrink-0">
                            <img src="https://i.pravatar.cc/70" width="70px" hight="70px" class="rounded-xl">
                        </div>

                        <div >
                            <header class="mb-4">
                                <h3 class="font-bold">{{$comment->author->username}}</h3>
                                <p class="text-xs">
                                    posts
                                <time>{{$comment->created_at}}</time>
                                </p>
                            </header>
                            <p>
                            {{$comment->body}}
                        </p>
                        </div>
                    </article>