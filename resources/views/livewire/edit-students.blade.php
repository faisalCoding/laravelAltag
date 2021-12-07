<div>


    {{-- <script src="{{ asset('js/drowerWindows.js') }}"></script> --}}

    <div class="title w-full bg-gray-100 h-16 flex justify-between items-center px-5 select-none ">
        <div class="title-icon flex ">
            <span class="material-icons  text-center text-3xl text-blue-500">people_alt</span>
            <h1 class="text-2xl mr-2 ">الطلاب</h1>
        </div>
        <div class="title-icon"> <span class="material-icons  text-center" do-drowing-js>keyboard_arrow_up</span></div>
    </div>

    <div drower-content-js class="mx-1">

        <ul class="row-span-2">

            @foreach ($students as $key => $student)

            <li class="students-li flex justify-between items-center mb-2 p-2 rounded-xl">
                <div class="w-4/12">
                    <input type="text" value="{{ $student['name'] }}" wire:model="students.{{ $key }}.name"
                        class=" bg-gray-100 border-none text-gray-700 rounded-lg w-64 ml-1">
                </div>
                <div class="w-2/12">
                    <input type="text" value="{{ $student['scores'] }}" wire:model="students.{{ $key }}.scores"
                        class=" bg-gray-100 border-none text-gray-700 rounded-lg w-24 ml-1">
                </div>
                <div class="w-2/12">
                    <input type="text" value="{{ $student['school_level'] }}"
                        wire:model="students.{{ $key }}.school_level"
                        class=" bg-gray-100 border-none text-gray-700 rounded-lg w-24 ml-1 ">
                </div>
                <div class="w-1/12">
                    <input type="checkbox" value="{{ $student['have_table'] }}"
                        wire:model="students.{{ $key }}.have_table"
                        class=" bg-gray-100 border-none text-gray-700 rounded-lg mx-1 w-6 h-6">
                </div>

                <div class="w-4/12 flex justify-between">

                    <button class="w-52 ml-2 h-10 text-white bg-blue-400 rounded-xl"
                        wire:click.prevent="editStudent() ">تحديث</button>
                    <button class="w-32 h-10 text-red-500  rounded-xl bg-red-50"
                        wire:click.prevent="deleteStudent('{{ $student['id'] }}')">حذف</button>
                </div>
            </li>

            @endforeach
        </ul>
    </div>

</div>