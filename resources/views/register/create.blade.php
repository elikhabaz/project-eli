<x-layout>
	<section class="px-6 py-8">
		<main class="max-w-lg mx-auto bg-gray-300 p-6 rounded-xl">
			<h1 class="text-center font-bold text-xl">Register</h1>
			<form method="Post" action="/register">
				@csrf
			<div class="mb-6">
				<lable class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-10" for="name">
					name
			</lable>
			
			<input class="border border-gray-400 p-2 w-full"
			type="text"
			name="name"
			id="name"
			required
			>
			</div>

			<div class="mb-6">
				<lable class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-10" for="username">
					username
			</lable>
			<input class="border border-gray-400 p-2 w-full"
			type="text"
			name="username"
			id="username"
			required
			>
			</div>

			<div class="mb-6">
				<lable class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-10" for="email">
					email
			</lable>
			<input class="border border-gray-400 p-2 w-full"
			type="email"
			name="email"
			id="email"
			required
			>
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
			</div>

				<div class="mb-6">
					<button class="bg-blue-500 text-white rounded-xl py-2 px-4 hover:bg-blue-700">
						submit
					</button>
				</div>
			</form>
		</main>
	</section>
</x-layout>