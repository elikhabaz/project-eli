
<x-layout>
   
    @include('_indexheader')
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        
            <x-single :post="$posts" />
               
            <!-- <div class="lg:grid lg:grid-cols-2">
            <x-poststyle/>
            <x-poststyle />
              
            </div>

            <div class="lg:grid lg:grid-cols-3">
                <x-poststyle />
                <x-poststyle />
                <x-poststyle/>

            </div> -->
        </main>
</x-layout>