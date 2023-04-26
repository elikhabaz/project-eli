<x-layout>
	<section class="px-6 py-8">
		<main class="max-w-lg mx-auto bg-purple-100 p-6 rounded-xl">
			<h1 class="text-center font-bold text-3xl">login</h1>
			<form method="Post" action="/login">
				@csrf

			<div class="mb-6">
				<lable class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-10" for="email">
					email
			</lable>
			<input class="border border-gray-400 p-2 w-full"
			type="email"
			name="email"
			id="email"
			value="{{old('email')}}"
			required
			>
			@error('email')
				<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
			@enderror
			</div>

			<div class="mb-6">
				<lable class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-10" for="password">
				password
			</lable>
			<input class="border border-gray-400 p-2 w-full"
			type="password"
			name="password"
			id="password"
			required
			>
			@error('possword')
				<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
			@enderror
			</div>

				<div class="mb-6">
					<button class="bg-purple-500 text-white rounded-xl py-2 px-4 hover:bg-purple-700">
						Login
					</button>
				</div>


			</form>
		</main>
	</section>
</x-layout>