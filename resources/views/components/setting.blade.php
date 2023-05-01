@props(['heading'])
<section class="max-w-6xl mx-auto py-8 ">
<div>
	<h1 class="font-semibold mb-6 pb-6 text-xl border-b">
		{{ $heading }}
	
	</h1>
</div>

<div class="flex">
<aside class="with-48">
	<h4 class="font-semibold mb-4">
		Links
	</h4>
	<ul>


		<li>
			<a href="/admin/posts" class="{{ request()->is('/admin/posts') ? 'text-blue-500' : ''}}">
					All Posts
			</a>
		</li>

		<li>
			<a href="/admin/posts/create" class="{{ request()->is('/admin/posts/create') ? 'text-blue-500' : ''}}">
					Create new Post
			</a>
		</li>
	</ul>

</aside>
</div>
<main>

<x-penal class="mx-auto">
	{{ $slot }}
</x-penal>

</section>
