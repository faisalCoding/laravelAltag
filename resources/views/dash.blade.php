@extends('layouts.app')

@section('content')
    <div class="mb-72">
        @livewire('form-student-state')
        <div class="flex flex-wrap justify-end w-5/6 mx-auto items-start justify-items-start">

            <div dir="rtl" class=" bg-white  w-5/6 max-w-lg min-w-min rounded-xl duration-500 overflow-hidden my-5 ml-5 "
                drower-js>
                @livewire('edit-students')
            </div>

            <div dir="rtl" class=" bg-white  w-5/6 max-w-3xl min-w-min rounded-xl duration-500 overflow-hidden my-5 ml-5 "
                drower-js>
                @livewire('add-day-to-week')
            </div>

            <div dir="rtl" class=" bg-white  w-5/6 max-w-3xl min-w-min rounded-xl duration-500 overflow-hidden my-5 ml-5 "
                drower-js>
                @livewire('edit-student-state')
            </div>
            <div dir="rtl" class=" bg-white  w-5/6 max-w-lg min-w-min rounded-xl duration-500 overflow-hidden my-5 ml-5 "
                drower-js>
                @livewire('edit-weeks')
            </div>
        </div>
    </div>

@endsection
