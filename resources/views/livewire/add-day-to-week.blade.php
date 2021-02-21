<div dir="rtl" class=" bg-white  w-5/6  mx-auto mt-20 rounded-xl duration-500 overflow-hidden " drower-js>

    <script src="{{ asset('js/drowerWindows.js') }}"></script>

    <div class="title w-1/1 bg-gray-100 h-16 flex justify-between items-center px-5 select-none ">
        <div class="title-icon flex ">
            <span class="material-icons  text-center text-3xl text-blue-500">today</span>
            <h1 class="text-2xl mr-2 ">لايام</h1>
        </div>
        <div class="title-icon"> <span class="material-icons  text-center" do-drowing-js>keyboard_arrow_up</span></div>
    </div>

    <div drower-content-js class="mx-11">

        <ul class="row-span-2">

            @foreach ($days as $key => $day)

                <li class="days-li flex justify-between mb-2 p-2 rounded-xl">
                    <div class="w-1/2">

                        <input type="text" value="{{ $day['date'] }}" wire:model="days.{{ $key }}.date"
                            class="w-2/5 bg-gray-100 border-none text-gray-700 rounded-lg" >

                        <select class="w-2/5 bg-gray-100 border-none text-gray-700 rounded-lg "
                            wire:model="days.{{ $key }}.week_id" wire:change="handelChnge()">
                            @if ($day['week_id'] == null)
                                <option class="h-10 text-gray-800 text-xl " >غير مسجل</option>
                            @endif
                            @foreach ($weeks as $k => $week)
                                <option class="h-10 text-gray-800 text-xl " value="{{ $week['id'] }}">{{ $week['name'] }}</option>
                            @endforeach

                        </select>

                    </div>
                    <div class="w-1/2 flex justify-between">

                        <button class="w-64 ml-10 h-10 text-white bg-blue-400 rounded-xl"
                            wire:click.prevent="updateDayToWeek('{{ $day['id'] }}') ">تحديث</button>
                        <button class="w-32 h-10 text-red-500  rounded-xl bg-red-50"
                            wire:click.prevent="deleteDay('{{ $day['id'] }}')">حذف</button>
                    </div>
                </li>

            @endforeach
        </ul>
    </div>

</div>
