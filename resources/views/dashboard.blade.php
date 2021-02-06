<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
 @section('content')
 <div class="w-3/5 mx-auto h-60 my-28  bg-gray grid grid-rows-4 grid-flow-col gap-4" >
                 
    
    <button  onclick="location.href='{{ route('dash') }}'" wire:click.prevent="createUser" class="h-70 px-10 bg-green-300 col-span-2 rounded-lg text-white text-2xl text-lg">سجل الطلاب</button>
    

    </div>

 @endsection
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
                   
                  </div>
            </div>
        </div>
    </div>
</x-app-layout>
