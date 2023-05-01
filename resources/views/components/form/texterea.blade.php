@props(['name'])

<x-form.filed>

	<x-form.labale name="{{ $name }}" />


	<textarea name="{{ $name }}" class=" text-sm border border-gray-300 p-6 ronded-xl py-3" rows="5" placeholder="write in hear" required>
	</textarea>

	<x-form.error name="{{ $name }}" />
	
</x-form.filed>