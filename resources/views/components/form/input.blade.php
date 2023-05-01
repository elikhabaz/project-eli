@props(['name','type'=>'text'])

<x-form.filed>

	<x-form.labale name="{{ $name }}"/>

	<input class="border border-gray-400 w-full"
		type="{{ $type }}"
		name="{{ $name }}"
		id="{{ $name }}"
		
		{{ $attributes (['value'=>old($name)])}}
		>

		<x-form.error name="{{ $name }}"/>

	</x-form.filed>