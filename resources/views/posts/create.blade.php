<x-layout>
	<section class="px-6 py-8 ">
		<x-penal class="max-w-sm mx-auto">
			<form method="Post" action="/admin/posts" enctype="multipart/form-data">
				@csrf
{{-- I make a form for admin and in this place admin can create a post its has a diffrent fild and we have a these fild in our db --}}
				<div class="mb-6">
					<lable class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-5" for="title">
						title
					</lable>
					<input class="border border-gray-400 "
						type="text"
						name="title"
						id="title"
						value=""
						required>

					@error('title')
						<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
					@enderror
				</div>


				<div class="mb-6">
					<lable class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-5" for="slug">
						slug
					</lable>
					<input class="border border-gray-400 "
						type="text"
						name="slug"
						id="slug"
						value=""
						required>

					@error('slug')
						<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
					@enderror
				</div>


				<div class="mb-6">
					<lable class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-5" for="img">
						img
					</lable>
					<input class="border border-gray-400 "
						type="file"
						name="img"
						id="img"
						value=""
						required>

					@error('file')
						<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
					@enderror
				</div>





				<div class="mb-6">
					<lable class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-10" for="excerpt">
						excerpt
					</lable>
					<textarea name="excerpt" class=" text-sm border border-gray-300 p-6 ronded-xl py-3" rows="5" placeholder="write in hear" required></textarea>
					@error('excerpt')
						{{$message}}
					@enderror
				</div>

				<div class="mt-8">
					<lable class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-10" for="body">
						body
					</lable>
					<textarea name="body" class=" text-sm border border-gray-300 p-6 ronded-xl py-5" rows="5" placeholder="write in hear" required></textarea>
					@error('body')
						{{$message}}
					@enderror
				</div>

				<div class="mb-5">
					<lable class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-5" for="category">
						category
					</lable>
					<select name="cat_id" id="cat" class="mb-5 rounded-xl p-1">
						categories
						<option value="cat" id="cat">

							@php
								$categoris = App\Models\Cat::all();
							@endphp
						
						@foreach ($categoris as $cat)
							<option value="{{ $cat->id }}" >{{ $cat->name }}</option>
						@endforeach


						
					</select>

				<div class=" float-right mt-10">
					<button class="bg-purple-500 text-white rounded-xl py-2 px-4 hover:bg-blue-700">
						submit
					</button>
				</div>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach

				

			</form>
		</x-penal>
	</section>		
</x-layout>