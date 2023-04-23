<x-dropdown >

    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm  font-semibold bg-gray-100 lg:w-32 text-left flex lg:inline-flex w-full rounded-xl" >
            {{isset($currentcat) ? $currentcat->name : 'categoris'}}
            <!-- I try to make component for this icon from button and that name is icon.blade -->                                
                <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"></x-icon>                                        
        </button>
    </x-slot>

            <!-- I try to make one component for drop down style button that name is dropdown.style.blade  -->
    <x-dropdown-style 
        href="/posts">All</x-dropdown-style>
            
    @foreach($categoris as $cat)  
        <x-dropdown-style href="/categoris/{{$cat->slug}}" >{{$cat->name}}</x-dropdown-style>
    @endforeach

</x-dropdown>