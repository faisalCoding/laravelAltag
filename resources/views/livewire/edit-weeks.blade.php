
    {{-- <script src="{{ asset('js/drowerWindows.js') }}"></script> --}}

    <div class="title w-full bg-gray-100 h-16 flex justify-between items-center px-5 select-none ">
        <div class="title-icon flex ">
            <span class="material-icons  text-center text-3xl text-blue-500">view_week</span>
            <h1 class="text-2xl mr-2 ">الاسابيع</h1>
        </div>
        <div class="title-icon"> <span class="material-icons  text-center" do-drowing-js>keyboard_arrow_up</span></div>
    </div>

    <div drower-content-js class="mx-2">

        <ul class="row-span-2">

            @foreach ($weeks as $key => $week)

                <li class="weeks-li flex justify-between mb-2 p-2 rounded-xl">
                    <div class="w-1/2">
                        <input type="text" value="{{ $week['name'] }}" wire:model="weeks.{{ $key }}.name"
                            class=" bg-gray-100 border-none text-gray-700 rounded-lg" >
                    </div>
                    <div class="w-1/2 flex justify-between">

                        <button class="w-64 ml-2 h-10 text-white bg-blue-400 rounded-xl"
                            wire:click.prevent="editWeek() ">تحديث</button>
                        <button class="w-32 h-10 text-red-500  rounded-xl bg-red-50"
                            wire:click.prevent="deleteWeek('{{ $week['id'] }}')">حذف</button>
                    </div>
                </li>

            @endforeach
        </ul>
    </div>


