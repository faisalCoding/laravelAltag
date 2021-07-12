<div>

    @if (session()->has('edit-successful'))
        <div class="bg-green-50 h-28 w-64  text-green-500 fixed bottom-8 right-8 shadow-lg cursor-pointer rounded-xl"
            onclick="this.style.display = 'none'">
            <div class="content-center justify-center flex items-center  w-full h-full">
                <h1> تم التعديل بنجاح</h1>
            </div>
        </div>
    @endif

    @if (session()->has('delete-successful'))
        <div class="bg-yellow-50 h-28 w-64 text-yellow-500 fixed bottom-8 right-8 shadow-lg cursor-pointer rounded-xl"
            onclick="this.style.display = 'none'">
            <div class="content-center justify-center flex items-center  w-full h-full">
                <h1> تم الحذف</h1>
            </div>
        </div>
    @endif


    <div class="title w-full bg-gray-100 h-16 flex justify-between items-center px-5 select-none ">
        <div class="title-icon flex ">
            <span class="material-icons  text-center text-3xl text-blue-500">subtitles</span>
            <h1 class="text-2xl mr-2 ">تسميع الطلاب</h1>
        </div>
        <div class="title-icon"> <span class="material-icons  text-center" do-drowing-js>keyboard_arrow_up</span></div>
    </div>

    <div drower-content-js class="mx-2">

        <div dir="rtl">
            <div class="w-1/1">
                <div class="p-2 w-1/1 bg-white mx-auto mt-8 rounded-xl duration-500 overflow-hidden">

                    <h1>معلومات تسميع الطالب</h1>

                    <div class="w-1/1  bg-gray grid grid-rows-4 grid-flow-col gap-4">

                        <div class="--bg-blue-100 grid grid-row-3 gap-1">
                            <div>الطالب</div>
                            <input type="text" class="row-span-2 bg-gray-100 border-none text-gray-700 rounded-lg"
                                wire:model="studentState.user_id">
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
                                style="background-color:  @if ($studentState['hasFire']) darkturquoise @else gray @endif "><span class=" material-icons
                                text-lg text-white">star</span></div>
                            <input id="sticker_input" type="checkbox" class="hidden" wire:model="studentState.hasFire">

                        </div>

                        <div class="--bg-blue-100 grid grid-row-3 gap-1">
                            <div>نجوم</div>
                            <div class="row-span-2 flex items-center justify-between w-3/4 mx-auto py-2 select-none">

                                <div><span class="material-icons cursor-pointer text-gray-400 text-6xl @if ($studentState['starsCount']>= '1') text-indigo-700 @endif" id="e-staring-1" >star</span>
                                </div>
                                <input id="e-star-1" value="1" type="radio" name="star" class="hidden"
                                    wire:model="studentState.starsCount">

                                <div><span class="material-icons cursor-pointer text-gray-400 text-6xl @if ($studentState['starsCount']>= '2') text-indigo-700 @endif" id="e-staring-2" >star</span>
                                </div>
                                <input id="e-star-2" value="2" type="radio" name="star" class="hidden"
                                    wire:model="studentState.starsCount">

                                <div><span class="material-icons cursor-pointer text-gray-400 text-6xl @if ($studentState['starsCount']=='3' ) text-indigo-700 @endif" id="e-staring-3">star</span>
                                </div>
                                <input id="e-star-3" value="3" type="radio" name="star" class="hidden"
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

                        <button wire:click.prevent="update()"
                            class="h-70 px-10 bg-green-400 col-span-2 rounded-lg text-white text-2xl ">تحديث</button>

                        <div class="--bg-blue-100 grid grid-row-3 gap-1 row-span-2">

                            <script src="{{ asset('/js/formStudentState.js') }}"></script>
                            <div>امتيازات</div>
                            <div id="e_list_container" class="row-span-2 grid grid-row-3 gap-2 select-none">
                                <div class="grid grid-cols-1 grap-2 w-1/1 chk_js">

                                    <div class="grid grid-cols-4 gap-1 cursor-pointer">

                                        <span class="material-icons  text-center">
                                            @if ($studentState['list'][0])
                                                check_circle
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
                                            @if ($studentState['list'][1])
                                                check_circle
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
                                            @if ($studentState['list'][2])
                                                check_circle
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
                    <ul class="">

                        @foreach ($studentStates as $key => $student)

                            <li class="studentStates-li flex justify-between mb-2 p-2 rounded-xl"
                                onclick="@this.select({{ $key }})">
                                <div class="w-1/2">

                                    <h1>{{ $student['user_id'] }}</h1>

                                    @foreach ($days as $k => $day)
                                        @if ($day->id == $student['day_id'])
                                            {{ $day->date }}
                                        @endif
                                    @endforeach

                                    </select>

                                </div>
                                <div class="w-1/2 flex justify-between">

                                    <button wire:click.prevent="deleteStudentState('{{ $student['id'] }}')"
                                        class="w-24 h-10 text-red-500  rounded-xl bg-red-50">حذف</button>
                                </div>
                            </li>

                        @endforeach
                    </ul>

                </div>
            </div>

        </div>
        <script src="{{ asset('/js/formStudentState.js') }}"></script>

    </div>

</div>
