<div dir="rtl">

    <header class="w-5/6 mx-auto">
        <div class="w-1/1">
            <div class="p-2 w-1/1 bg-white mx-auto mt-5 rounded-xl duration-500  flex justify-between">
                <div class="">
                    <div class="">
                        <h1>اضف طالب جديد</h1>
                        <input type="text" class=" bg-gray-100 border-none text-gray-700 rounded-lg"
                            wire:model="newStudentName">
                        <button wire:click.prevent="newStudent"
                            class=" px-10 bg-blue-400 rounded-lg text-white h-10">اضف</button>
                    </div>
                    <h1>اختر طالب للتسميع</h1>
                    <div x-data="selectStudent($wire.names)" class=" relative"  @click.away="open = false">
                        <input wire:model="studentSlected_name" @keyup.enter="$wire.selectChang()" type="text" x-model="inp_name" @input="open = true" class=" border-none rounded-md bg-gray-100"
                           >
                        <div class=" absolute bg-white shadow-md rounded-lg " x-show="open" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-90">
                            <template x-for="name in selectInp()">
                                <div x-text="name.name" x-on:click="inp_name = name.name;$wire.studentSlected_name = name.name;$wire.selectChang();open = false" class=" select-none py-4 px-3 cursor-pointer hover:bg-gray-100 transition-all duration-200"></div>
                            </template>
                        </div>
                    </div>
                
                </div>

                <div class="">
                    <h1>اضف يوم جديد</h1>
                    <input type="text" class=" bg-gray-100 border-none text-gray-700 rounded-lg" wire:model="newDayName"
                        onfocus="this.value=`${dateOb.months_num}/${dateOb.day}  ${dateOb.months}`">
                    <button wire:click.prevent="newDay"
                        class=" px-10 bg-blue-400 rounded-lg text-white h-10">اضف</button>
                </div>
                <div class="">
                    <h1>اضف اسبوع جديد</h1>
                    <input type="text" class=" bg-gray-100 border-none text-gray-700 rounded-lg"
                        wire:model="newWeekName">
                    <button wire:click.prevent="newWeek"
                        class=" px-10 bg-blue-400 rounded-lg text-white h-10">اضف</button>
                </div>

            </div>
            <div class="p-2 w-1/1 bg-white mx-auto mt-8 rounded-xl duration-500 overflow-hidden">

                <h1>معلومات تسميع الطالب</h1>

                <div class="w-1/1  bg-gray grid grid-rows-4 grid-flow-col gap-4 grid-cols-3">

                    <div class="--bg-blue-100 grid grid-row-3 gap-1">
                        <div>الطالب</div>
                        <input type="text" class="row-span-2 bg-gray-100 border-none text-gray-700 rounded-lg"
                            wire:model="studentState.name">
                    </div>

                    <div class="--bg-blue-100 grid grid-row-3 gap-1">
                        <div>الحفظ من</div>
                        <input type="text" class="row-span-2 bg-gray-100 border-none text-gray-700 rounded-lg"
                            wire:model="studentState.hfrom">
                    </div>

                    <div class="--bg-blue-100 grid grid-row-3 gap-1">
                        <div>الحفظ الى</div>
                        <div class="row-span-2 grid grid-cols-4 gap-1">
                            <input type="text" class=" col-span-3 bg-gray-100 border-none text-gray-700 rounded-lg"
                                wire:model="studentState.hto">
                            <input type="text" class=" col-span-1 bg-gray-100 border-none text-gray-700 rounded-lg "
                                wire:model="studentState.hcount">

                        </div>
                    </div>

                    <div class="--bg-blue-100 grid grid-row-3 gap-1">
                        <div>وسام</div>

                        <div id="sticker"
                            class="flex items-center w-10 h-10 text-center justify-center rounded-lg cursor-pointer select-none"
                            style="background-color:  @if ($studentState['hasFire']) darkturquoise @else gray @endif ">
                            <span class=" material-icons
                            text-lg text-white">star</span>
                        </div>
                        <input id="sticker_input" type="checkbox" class="hidden" wire:model="studentState.hasFire">

                    </div>

                    <div class="--bg-blue-100 grid grid-row-3 gap-1">
                        <div>نجوم</div>
                        <div class="row-span-2 flex items-center justify-between w-3/4 mx-auto py-2 select-none">

                            <div><span
                                    class="material-icons cursor-pointer text-gray-400 text-6xl @if ($studentState['starsCount']>= '1') text-indigo-700 @endif"
                                    id="staring-1">star</span></div>
                            <input id="star-1" value="1" type="radio" name="star" class="hidden"
                                wire:model="studentState.starsCount">

                            <div><span
                                    class="material-icons cursor-pointer text-gray-400 text-6xl @if ($studentState['starsCount']>= '2') text-indigo-700 @endif"
                                    id="staring-2">star</span></div>
                            <input id="star-2" value="2" type="radio" name="star" class="hidden"
                                wire:model="studentState.starsCount">

                            <div><span
                                    class="material-icons cursor-pointer text-gray-400 text-6xl @if ($studentState['starsCount']=='3' ) text-indigo-700 @endif"
                                    id="staring-3">star</span></div>
                            <input id="star-3" value="3" type="radio" name="star" class="hidden"
                                wire:model="studentState.starsCount">

                        </div>
                    </div>

                    <div class="--bg-blue-100 grid grid-row-3 gap-1">
                        <div>المراجعة من</div>
                        <input type="text" class="row-span-2 bg-gray-100 border-none text-gray-700 rounded-lg"
                            wire:model="studentState.mfrom">
                    </div>

                    <div class="--bg-blue-100 grid grid-row-3 gap-1">
                        <div>المراجعة الى</div>

                        <div class="row-span-2 grid grid-cols-4 gap-1">
                            <input type="text" class=" col-span-3 bg-gray-100 border-none text-gray-700 rounded-lg"
                                wire:model="studentState.mto">
                            <input type="text" class=" col-span-1 bg-gray-100 border-none text-gray-700 rounded-lg"
                                wire:model="studentState.mcount">
                        </div>
                    </div>

                    <button wire:click.prevent="createUser"
                        class="h-70 px-10 bg-blue-400 col-span-2 rounded-lg text-white text-2xl ">تسجيل</button>

                    <div class="--bg-blue-100 grid grid-row-3 gap-1 row-span-2">

                        <script src="{{ asset('/js/formStudentState.js') }}"></script>
                        <div>امتيازات</div>
                        <div id="list_container" class="row-span-2 grid grid-row-3 gap-2 select-none">
                            <div class="grid grid-cols-1 grap-2 w-1/1 chk_js">

                                <div class="grid grid-cols-4 gap-1 cursor-pointer">

                                    <span class="material-icons  text-center">
                                        @if ($studentState['list'][0]) check_circle
                                        @else radio_button_unchecked @endif
                                    </span>
                                    <h1 class="inline-block col-span-3">اول طالب يسمع</h1>

                                </div>

                                <input id="list-1" type="checkbox" style="display:none" class=""
                                    wire:model="studentState.list.0">

                            </div>
                            <div class="grid grid-cols-1 grap-2 w-1/1 chk_js ">

                                <div class="grid grid-cols-4 gap-1 cursor-pointer">

                                    <span class="material-icons  text-center">
                                        @if ($studentState['list'][1]) check_circle
                                        @else radio_button_unchecked @endif
                                    </span>
                                    <h1 class="inline-block col-span-3">تسميع بلا اخطاء</h1>

                                </div>

                                <input id="list-2" type="checkbox" style="display:none" class=""
                                    wire:model="studentState.list.1">
                            </div>
                            <div class="grid grid-cols-1 grap-2 w-1/1 chk_js">

                                <div class="grid grid-cols-4 gap-1 cursor-pointer">

                                    <span class="material-icons  text-center">
                                        @if ($studentState['list'][2]) check_circle
                                        @else radio_button_unchecked @endif
                                    </span>
                                    <h1 class="inline-block col-span-3">تكرار الحفظ 20 مرة</h1>

                                </div>

                                <input id="list-3" type="checkbox" style="display:none" class=""
                                    wire:model="studentState.list.2">
                            </div>
                        </div>
                    </div>

                    <div class="--bg-blue-100 grid grid-row-3 gap-1">
                        <div>تاريخ</div>

                        <select class="row-span-2" wire:model="studentState.day_id">
                            @foreach ($days as $day)
                            <option value="{{ $day->id }}">{{ $day->date }} </option>

                            @endforeach
                        </select>

                    </div>

                </div>

            </div>
        </div>

    </header>


    <script>
        function selectStudent(names){
    return{
         names:names, 
         inp_name:'',
         open:false,
         selectInp(){
             return this.names.filter(e => e.name.includes(this.inp_name))
         }

        }
}
    </script>
</div>