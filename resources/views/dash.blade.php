@extends('layouts.app')

@section('content')
    <div class="mb-72">
        @livewire('form-student-state')
        <div class="w-5/6 mx-auto flex justify-items-center" style="justify-content: center;">
             <div class="flex flex-col w-5/12" style="direction: rtl">
                <div dir="rtl"
                    class=" bg-white  w-5/6 max-w-lg min-w-min rounded-xl duration-500 overflow-hidden my-2 ml-2 "
                    drower-js>
                    @livewire('edit-weeks')
                </div>
                <div dir="rtl"
                    class=" bg-white  w-5/6 max-w-3xl min-w-min rounded-xl duration-500 overflow-hidden my-2 ml-2 "
                    drower-js>
                    @livewire('add-day-to-week')
                </div>

            </div>
            <div class="flex flex-col w-5/12">
                <div dir="rtl"
                    class=" bg-white  w-5/6 max-w-lg min-w-min rounded-xl duration-500 overflow-hidden my-2 ml-2 "
                    drower-js>
                    @livewire('edit-students')
                </div>


                <div dir="rtl"
                    class=" bg-white  w-5/6 max-w-3xl min-w-min rounded-xl duration-500 overflow-hidden my-2 ml-2 "
                    drower-js>
                    @livewire('edit-student-state')
                </div>
            </div>

        </div>
    </div>

@endsection
