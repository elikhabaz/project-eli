@props(['name','type'=>'text'])

<x-form.filed>

	<x-form.labale name="{{ $name }}"/>

	<input class="border border-gray-400 "
		type="{{ $type }}"
		name="{{ $name }}"
		id="{{ $name }}"
		value=""
		required>

		<x-form.error name="{{ $name }}"/>

	</x-form.filed>