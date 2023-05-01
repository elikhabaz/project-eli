<x-layout>
	<x-setting heading="Manage Post">
		<x-penal>

	@foreach ($posts as $post )
		<ul role="list" class="divide-y divide-gray-100">
			<li class="flex justify-between gap-x-6 py-5">
			  <div class="flex gap-x-4">
				<div class="min-w-0 flex-auto">
					<a href="/posts/{{ $post->slug }}">
						{{ $post->title }}
					</a>
				  
				  
				</div>
			  </div>
			  <div class="hidden sm:flex sm:flex-col sm:items-end">
				<a href="/admin/posts/{{ $post->slug }}/edit" class="text-sm leading-6 text-gray-900">Edit</a>
			  </div>
			  <div class="hidden sm:flex sm:flex-col sm:items-end">
				<form method="POST" action="/admin/posts/{{ $post->slug }}">
					@csrf
					@method('DELETE')
					<button>
						Delete
					</button>
				</form>
			  </div>
			</li>
		  </ul>
	@endforeach

		</x-penal>
	</x-setting>

</x-layout>