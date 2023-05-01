<x-layout>
	<section class="px-6 py-8 ">
		<x-penal class="max-w-sm mx-auto">
			<form method="Post" action="/admin/posts" enctype="multipart/form-data">
				@csrf
{{-- I make a form for admin and in this place admin can create a post its has a diffrent fild and we have a these fild in our db --}}
				<x-form.input name="title" />
				<x-form.input name="slug" />
				<x-form.input name="img" type="file" />


				<x-form.texterea name="excerpt"/>
				<x-form.texterea name="body"/>


				
				<x-form.filed>			
					<x-form.labale name="cat"/>

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

				</x-form.filed>
				<x-form.error name="cat"/>

				<div class=" float-right mt-10">
					<button class="bg-purple-500 text-white rounded-xl py-2 px-4 hover:bg-blue-700">
						submit
					</button>
				</div>

				

				

			</form>
		</x-penal>
	</section>		
</x-layout>